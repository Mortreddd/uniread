<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


Route::middleware('auth')->group(function () {
    Route::get('/',[BookController::class, 'index']);
    Route::get('/books/{id}', [BookController::class, 'searchById'])->where(['id' => '[0-9]+']);
    Route::get('/books/{genre}', [BookController::class, 'searchByGenre'])->whereIn('genre', ['fantasy', 'mystery', 'thriller', 'teen-fiction', 'science-fiction']);
});

Route::middleware('guest')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'show')->name('login');
        Route::post('/login/process', 'process');
    });
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'show');
        Route::post('/register/process', 'store');  
    });
});