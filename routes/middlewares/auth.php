<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\Payments\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::prefix('account')->group(function () {
        Route::get('', [UserController::class, 'details'])->name('account.details');
        Route::get('logout', [UserController::class, 'logout'])->name('account.logout');
        Route::get('licenses', [UserController::class, 'licenses'])->name('account.licenses');
        Route::get('security', [UserController::class, 'security'])->name('account.security');
        
        Route::post('update/name', [UserController::class,'updateName'])->name('account.name');
        Route::post('update/email', [UserController::class,'updateEmail'])->name('account.email');
        Route::post('update/security', [UserController::class, 'updatePassword'])->name('account.password');
    });

    Route::prefix('cart')->group(function () {
        Route::get('', [CartController::class, 'index'])->name('cart');
        Route::post('add/{product}', [CartController::class, 'add'])->name('cart.add');
        Route::delete('destroy/{cart}', [CartController::class, 'remove'])->name('cart.remove');
        Route::delete('clear', [CartController::class, 'clear'])->name('cart.clear');
    });

    Route::prefix('payment')->group(function () {
        Route::get('', [PaymentController::class, 'index'])->name('payment');
        Route::post('', [PaymentController::class, 'payment'])->name('payment.process');
        Route::get('success', [PaymentController::class, 'success'])->name('payment.success');
        Route::get('cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
    });

    Route::get('download/{file}', [FileController::class, 'download'])->name('download.file');
    Route::get('licenses/add/{user}/{license}', [LicenseController::class, 'store']);
    Route::get('user/{user}', [UserController::class,'show'])->name('user.show');
    Route::resource('product', ProductController::class);
});