<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
    public function index()
    {
        $articles = Article::with('comments')->paginate(10);
        return view('discussion.forum-discussion', compact('articles'));
    }

    public function create()
    {
        return view('discussion.ask-question');
    }

    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $author = Auth::user()->name ?? $request->input('author');

        Discussion::create([
            'article_id' => $request->article_id,
            'author' => $author,
            'content' => $request->content,
        ]);

        return redirect()->route('discussion.forum-discussion')->with('success', 'Pertanyaan berhasil diajukan!');
    }
}
