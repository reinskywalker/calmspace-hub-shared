<?php

namespace App\Http\Controllers;

class ApprovalController extends Controller
{
    public function viewapproval()
    {
        return view(
            'users.approval',
        );
    }
}
