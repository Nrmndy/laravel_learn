<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\StaticPageController;
use Illuminate\Support\Facades\Route;

Route::get('/about', [StaticPageController::class, 'about']);
Route::get('/contacts', [StaticPageController::class, 'contacts']);

Route::get('/admin/feedback', [FeedbackController::class, 'index']);
Route::post('/feedback', [FeedbackController::class, 'store']);

Route::name('user.')->group(function () {
    Route::view('/dashboard', 'dashboard')->middleware(['auth'])->name('dashboard');
});

require __DIR__.'/auth.php';
require __DIR__.'/articles.php';
