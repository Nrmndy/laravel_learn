<?php

namespace App\Http\Controllers;

use App\Helpers\FormRequest;
use App\Models\Article;
use App\Services\TagsSynchronizer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index', ['articles' => Article::with('tags')->latest()->get()]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request, TagsSynchronizer $tagsSynchronizer)
    {
        $validatedData = FormRequest::validate($request);
        $article = Article::create($validatedData);

        $requestedTags = collect(explode(',', request('tags')))->keyBy(function ($item) { return $item; });
        $tagsSynchronizer->sync($requestedTags, $article);

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

    public function update(Request $request, TagsSynchronizer $tagsSynchronizer)
    {
        $validatedData = FormRequest::validate($request);
        $validatedData['slug'] = Str::slug($validatedData['title']);

        /** @var Model $article */
        $article = Article::whereSlug($request->get('slug_old'));
        $article->update($validatedData);

        $requestedTags = collect(explode(',', request('tags')))->keyBy(function ($item) { return $item; });

        $tagsSynchronizer->sync($requestedTags, $article);

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

        return redirect('/');
    }
}
