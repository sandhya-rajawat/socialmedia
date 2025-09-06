<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('signup', [RegisterController::class, 'create'])->name('register.form');
Route::post('signup', [RegisterController::class, 'store'])->name('register.submit');

Route::get('signin', [LoginController::class, 'create'])->name('login.form');
Route::post('signin', [LoginController::class, 'store'])->name('login.submit');

Route::get('index', [IndexController::class, 'create'])->name('home');
