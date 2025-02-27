<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\Payments\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('account/logout', [UserController::class, 'logout'])->name('account.logout');
    Route::get('account/licenses', [UserController::class, 'licenses'])->name('account.licenses');
    
    Route::get('account', [UserController::class, 'details'])->name('account.details');
    Route::post('account/name', [UserController::class,'updateName'])->name('account.name');
    Route::post('account/email', [UserController::class,'updateEmail'])->name('account.email');
    
    Route::get('account/security', [UserController::class, 'security'])->name('account.security');
    Route::post('account/security', [UserController::class, 'updatePassword'])->name('account.password');
    
    Route::get('payment', [PaymentController::class, 'index'])->name('payment');
    Route::post('payment', [PaymentController::class, 'payment'])->name('payment.process');
    Route::get('payment/success', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');

    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::post('cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('cart/destroy/{cart}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('cart/clear', [CartController::class, 'clear'])->name('cart.clear');

    Route::get('licenses/add/{user}/{license}', [LicenseController::class, 'store']);

    Route::get('user/{user}', [UserController::class,'show'])->name('user.show');

    Route::resource('product', ProductController::class);
});