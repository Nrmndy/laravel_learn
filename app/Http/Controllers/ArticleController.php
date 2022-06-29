<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index', ['articles' => Article::latest()->get()]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'desc'  => 'required|string|max:255',
            'body'  => 'required|string',
            'published' => 'accepted',
        ]);

        Article::create([
            'title' => request('title'),
            'desc' => request('desc'),
            'body' => request('body'),
            'slug' => Str::slug(request('title')),
            'published' => request('published') === 'on' ? 1 : 0,
        ]);

        return redirect('/');
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();

        if ($article) {
            return view('articles.show', ['article' => $article]);
        }

        return abort(404);
    }

    public function edit()
    {

    }

    public function destroy()
    {

    }
}
