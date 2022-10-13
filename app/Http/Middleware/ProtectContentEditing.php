<?php

namespace App\Http\Middleware;

use App\Models\Article;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProtectContentEditing
{
    /**
     * Handle an incoming request.
     *
     * @param string $slug
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $slug = $request->route()->parameter('slug');

        $authorId = Article::whereSlug($slug)->getAuthorId();

        if ($authorId != Auth::id()) {
            return redirect()->back()->withErrors('Статью может редактировать только автор!');
        }

        return $response;
    }
}
