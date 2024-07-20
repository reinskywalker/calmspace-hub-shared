<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function view()
    {
        $articles = Article::paginate(10);

        // Pass articles to the view
        return view('home', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('show', compact('article'));
    }
}
