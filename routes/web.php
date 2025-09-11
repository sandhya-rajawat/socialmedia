<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store']);

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);


Route::middleware(['auth'])->group(function () {
  Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
  Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

  // Optionally protect 'index' as well
  Route::get('index', [IndexController::class, 'create'])->name('home');
});
