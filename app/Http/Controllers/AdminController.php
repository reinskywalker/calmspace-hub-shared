<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function     masterdata()
    {
        $userCount = User::count();
        $latestUsers = User::latest()->take(5)->get();
        return view('admins.masterdata', compact('latestUsers', 'userCount'));
    }
}
