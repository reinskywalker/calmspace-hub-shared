<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\QuizHeader;

class userController extends Controller
{
    public function beginTest()
    {
        return view('users.quiz');
    }

    public function home()
    {
        $activeUsers = User::count();
        return view(
            'users.home',
            compact(
                'activeUsers',
            )
        );
    }
}
