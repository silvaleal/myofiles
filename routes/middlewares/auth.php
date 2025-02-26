<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\Payments\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDetailsController;
use App\Http\Controllers\UserSecurityController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('account/logout', [UserController::class, 'logout'])->name('account.logout');

    Route::get('account/licenses', [UserController::class, 'licenses'])->name('account.licenses');
    Route::get('licenses/add/{user}/{license}', [LicenseController::class, 'store']);
    
    Route::get('account', [UserDetailsController::class, 'index'])->name('account.details');
    Route::post('account/name', [UserDetailsController::class,'name'])->name('account.name');
    Route::post('account/email', [UserDetailsController::class,'email'])->name('account.email');
    
    Route::get('account/security', [UserSecurityController::class, 'index'])->name('account.security');
    Route::post('account/security', [UserSecurityController::class, 'update']);
    
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
    Route::post('/payment', [PaymentController::class, 'payment'])->name('payment.create');
    Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');

    Route::resource('cart', CartController::class);
    Route::resource('product', ProductController::class);
});