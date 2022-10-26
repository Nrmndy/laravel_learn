<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;

Route::get('/', [ArticleController::class, 'index']);
Route::get('/articles/create', [ArticleController::class, 'create'])->middleware('auth');

Route::middleware('owner')->group(function(){
    Route::get('/articles/{slug}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::delete('/articles/{slug}', [ArticleController::class, 'destroy'])->name('article.delete');
    Route::patch('/articles/{slug}', [ArticleController::class, 'update'])->name('article.update');
});

Route::get('/articles/{slug}', [ArticleController::class, 'show']);
Route::post('/articles', [ArticleController::class, 'store']);
Route::get('/articles/tags/{tag}', [TagController::class, 'index']);
