<?php

use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Auth\UserRegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [UserLoginController::class, 'index'])->name('login');
    Route::get('register', [UserRegisterController::class, 'index'])->name('register');

    Route::post('login', [UserLoginController::class, 'login']);
    Route::post('register', [UserRegisterController::class, 'register']);
});