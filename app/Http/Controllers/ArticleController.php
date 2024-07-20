<?php

namespace App\Http\Controllers;

class ArticleController extends Controller
{
    public function view()
    {
        return view(
            'users.articles',
        );
    }
}
