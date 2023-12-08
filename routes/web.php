<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mail\VerifyEmailController;
use App\Http\Controllers\Mail\VerifyResetPasswordController;
use App\Http\Controllers\Mail\VerifyTokenController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// *---------------------------------
// * Routes for guest only *
// * Handling login and registration *
// *---------------------------------

Route::middleware(['guest', 'preventBackHistory'])->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'show')->name('login');
        Route::post('/login/process', 'process');
    });
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'show');
        Route::match(['get', 'post'], '/register/verify', 'store')->name('register.verify');
        // Route::match(['get', 'post'], '/register/verified-email', 'verified')->name('verified.email');
    });

    // *---------------------------------
    // *  FORGOT PASSWORD ROUTES
    // *---------------------------------
    Route::match(['get', 'post'], '/verify-token/process', [VerifyEmailController::class, 'verify'])->name('verify.email.process');

    Route::match(['get', 'post'], '/reset-password/process', [VerifyTokenController::class, 'verify'])->name('verify.token.process');

    Route::match(['get', 'post'], '/update-password/process', [VerifyResetPasswordController::class, 'update'])->name('update.password.process');
});

require(__DIR__.'/admin.php');
require(__DIR__.'/auth.php');