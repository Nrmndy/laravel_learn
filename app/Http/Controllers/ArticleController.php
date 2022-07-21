<?php

namespace App\Http\Controllers;

use App\Helpers\FormRequest;
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
        $validatedData = FormRequest::validate($request);
        Article::create($validatedData);

        return redirect('/');
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();

        if ($article) {
            return view('articles.show', compact('article', 'slug'));
        }

        return abort(404);
    }

    public function update(Request $request)
    {
        $validatedData = FormRequest::validate($request);
        $validatedData['slug'] = Str::slug($validatedData['title']);

        Article::where('slug', $request->get('slug_old'))->update($validatedData);

        return redirect('/articles/' . $validatedData['slug']);
    }

    public function edit($slug)
    {
        $article = Article::where('slug', $slug)->first();

        if ($article) {
            return view('articles.edit', compact('article', 'slug'));
        }

        return redirect('/');
    }

    public function destroy($slug)
    {
        Article::where('slug', $slug)->first()->delete();
    }
}
