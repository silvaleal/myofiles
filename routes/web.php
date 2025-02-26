<?php

use App\Http\Controllers\PagesControllers;
use App\Http\Controllers\Payments\PaymentController;
use Illuminate\Support\Facades\Route;

require __DIR__."/middlewares/guest.php";
require __DIR__."/middlewares/auth.php";

Route::get('/', [PagesControllers::class, 'home'])->name('home');
Route::post('webhook', [PaymentController::class, 'intent'])->name('webhook');
