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
    /**
     * Display the mood tracking form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $today = Carbon::today();

        // Check if today's mood has been submitted
        $alreadySubmitted = MoodTracking::where('user_id', $userId)
            ->whereDate('tracking_date', $today)
            ->exists();

        // Fetch moods from database
        $moods = MoodMaster::all();

        return view('moods.mood-tracking', compact('alreadySubmitted', 'moods'));
    }

    /**
     * Store the submitted mood.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mood_code' => 'required|exists:mood_master,code', // Validate mood_code exists in mood_master
        ]);

        $userId = Auth::id();
        dd($userId);
        $today = Carbon::today();

        // Check if user already submitted today's mood
        $alreadySubmitted = MoodTracking::where('user_id', $userId)
            ->whereDate('tracking_date', $today)
            ->exists();

        if ($alreadySubmitted) {
            return redirect()->route('mood.index')->with('message', "You already submitted today's mood!");
        }

        // Find mood by mood_code
        $mood = MoodMaster::where('code', $request->mood_code)->firstOrFail();

        // Create mood tracking entry
        MoodTracking::create([
            'id' => Str::uuid(),
            'user_id' => $userId,
            'mood_id' => $mood->id, // Store the ID of the mood found
            'tracking_date' => $today,
        ]);

        return redirect()->route('mood.index')->with('message', "Today's mood submitted successfully!");
    }
}
