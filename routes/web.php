<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('index', function () {
    return view('index');
})->name('home');

Route::get('signin',[AuthController::class,'createSignIn']);
Route::post('signin',[AuthController::class,'loginUser']);
Route::get('signup',[AuthController::class,'createSignUp']);
Route::post('signup',[AuthController::class,'store']);