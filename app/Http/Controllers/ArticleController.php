<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function view()
    {
        $articles = Article::paginate(10);

        return view('home', compact('articles'));
    }

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

    public function updateStatus(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->status = $request->input('status');
        $article->save();

        return redirect()->back()->with('success', 'Article status updated successfully.');
    }


    public function show($id)
    {
        $article = Article::with('comments')->findOrFail($id);
        return view('show', compact('article'));
    }



    public function create()
    {
        return view('articles.create');
    }

    public function index()
    {
        $articles = Article::where('status', '!=', 'published')->paginate(10);

        return view('articles.articles', compact('articles'));
    }
    public function adminAuth()
    {
        $articles = Article::paginate(10);
        return view('articles.mypost', compact('articles'));
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;

        while (Article::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $article = new Article([
            'id' => Str::uuid(),
            'title' => $validated['title'],
            'content' => $validated['content'],
            'user_id' => Auth::id(),
            'author' => Auth::user()->name,
            'slug' => $slug,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $article->save();

        return redirect()->route('forum-discussion')->with('success', 'Artikel berhasil dibuat!');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return response()->json(['message' => 'Article deleted successfully.']);
    }


    public function mypost()
    {
        $articles = Article::where('user_id', Auth::id())->paginate(10);
        return view('articles.mypost', compact('articles'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,published,revised',
        ]);

        $article = Article::findOrFail($id);
        $article->status = $request->input('status');
        $article->save();

        return redirect()->route('articles')->with('success', 'Article status updated successfully!');
    }
}
