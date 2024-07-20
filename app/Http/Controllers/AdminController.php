<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function adminhome()
    {
        $userCount = User::count();
        $latestUsers = User::latest()->take(5)->get();
        return view('admins.adminhome', compact('latestUsers', 'userCount'));
    }
}
