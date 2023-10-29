<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Auth\ProfileController;


Route::group(['middleware' => ['admin', 'auth', 'preventBackHistory']], function() {

});



// *---------------------------------
// * All of the routes for the authors *
// * Handling Profile Routes *
// *---------------------------------

Route::group(['middleware' => ['auth', 'preventBackHistory']], function () {

    // *---------------------------------
    // * Handle the Books to be displayed *
    // *---------------------------------
    Route::controller(BookController::class)->group(function () {
        Route::get('/','index')->name('home');
        Route::get('/books/{id}', 'searchById')->where(['id' => '[0-9]+']);
        Route::get('/books/{genre}', 'searchByGenre')->whereIn('genre', ['mystery', 'thriller', 'teen-fiction', 'horror', 'romance']);
    });

    // *---------------------------------
    // * Profile Routes *
    // * Handling Profile Routes *
    // * @params only accepts the username
    // *---------------------------------
    Route::controller(ProfileController::class)->group(function(){

        Route::get('/profile/{username}', 'profile')->where(['username' => '[a-z0-9]+']);

        Route::post('/logout', 'logout');

    });
});

// *---------------------------------
// * Routes for guest only *
// * Handling Profile Routes *
// *---------------------------------
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