<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MoodMaster;
use App\Models\MoodTracking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class MoodTrackingController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $today = Carbon::today();

        $submittedMoods = MoodTracking::where('user_id', $userId)
            ->whereDate('tracking_date', $today)
            ->with('mood')
            ->get();

        $alreadySubmitted = $submittedMoods->isNotEmpty();

        $moods = MoodMaster::all();

        return view('moods.mood-tracking', compact('alreadySubmitted', 'moods', 'submittedMoods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mood_code' => 'required|exists:mood_master,id',
        ]);

        $userId = Auth::user()->id;

        if (!$userId) {
            return redirect()->route('login')->with('error', 'You need to login first.');
        }

        $checkUser = \App\Models\User::where('id', $userId)->exists();

        if (!$checkUser) {
            return redirect()->route('mood.index')->with('error', 'Invalid user.');
        }

        $today = Carbon::today();

        $mood = MoodMaster::where('id', $request->mood_code)->first();

        if (!$mood) {
            return redirect()->route('mood.index')->with('error', 'Invalid mood selection.');
        }

        // dd($userId, gettype($userId));
        // dd(Auth::id(), gettype(Auth::id()));

        MoodTracking::create([
            'id' => Str::uuid(),
            'user_id' => (string) $userId,
            'mood_id' => (string) $mood->id,
            'tracking_date' => $today,
        ]);

        return redirect()->route('mood.index')->with('message', "Today's mood submitted successfully!");
    }

    public function report()
    {
        $userId = Auth::id();
        $currentMonth = now()->format('Y-m');
        $today = now()->format('Y-m-d');

        $moodData = MoodTracking::where('user_id', $userId)
            ->where('tracking_date', 'like', "$currentMonth%")
            ->with('mood')
            ->get()
            ->groupBy('tracking_date');

        $moodScores = [];
        $moodLevels = [
            '😢 Sad' => 1,
            '😟 Nervous' => 2,
            '🤒 Sick' => 2,
            '😴 Tired' => 3,
            '💼 Productive' => 4,
            '😊 Happy' => 5,
        ];

        for ($i = 1; $i <= now()->daysInMonth; $i++) {
            $date = now()->format("Y-m-") . str_pad($i, 2, '0', STR_PAD_LEFT);
            if (isset($moodData[$date])) {
                $moods = $moodData[$date]->pluck('mood.name')->toArray();
                $avgMood = array_sum(array_map(fn($m) => $moodLevels[$m] ?? 3, $moods)) / count($moods);
                $moodScores[$date] = round($avgMood, 1);
            } else {
                $moodScores[$date] = null;
            }
        }

        return view('moods.mood-report', compact('moodData', 'today', 'moodScores'));
    }
}
