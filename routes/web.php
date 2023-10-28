<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Auth\ProfileController;

Route::middleware(['auth', 'preventBackHistory'])->group(function () {
    Route::controller(BookController::class)->group(function () {
        Route::get('/','index')->name('home');
        Route::get('/books/{id}', 'searchById')->where(['id' => '[0-9]+']);
        Route::get('/books/{genre}', 'searchByGenre')->whereIn('genre', ['mystery', 'thriller', 'teen-fiction', 'horror', 'romance']);
    });
    Route::controller(ProfileController::class)->group(function(){
        Route::post('/logout', 'logout');
    });
});

Route::middleware(['guest', 'preventBackHistory'])->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'show')->name('login');
        Route::post('/login/process', 'process');
    });
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'show');
        Route::post('/register/process', 'store');  
    });
});