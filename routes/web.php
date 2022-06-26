<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\StaticPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index']);

Route::get('/about', [StaticPageController::class, 'about']);

Route::get('/contacts', [StaticPageController::class, 'contacts']);

Route::get('/articles/create', [ArticleController::class, 'create']);

Route::get('/articles/{slug}', [ArticleController::class, 'show']);

Route::get('/admin/feedback', [FeedbackController::class, 'index']);

Route::post('/articles', [ArticleController::class, 'store']);

Route::post('/feedback', [FeedbackController::class, 'store']);
