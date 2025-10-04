<?php
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\CommentLikeController;
Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store']);
Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
    Route::resource('posts.likes', PostLikeController::class)->only(['store']);
    Route::resource('posts.comments', PostCommentController::class)->only(['store']);
    Route::resource('comments.like', CommentLikeController::class)->only(['store']);
    // Optionally protect 'index' as well
    Route::get('index', [IndexController::class, 'create'])->name('home');
});
