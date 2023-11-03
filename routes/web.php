<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LibraryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\SearchController;

Route::group(['middleware' => ['admin', 'auth', 'preventBackHistory']], function() {

});



// *---------------------------------
// * All of the routes for the authors *
// * Handling Profile Routes *
// *---------------------------------

Route::group(['middleware' => ['auth', 'preventBackHistory']], function () {

    // *---------------------------------
    // * Handle the Books to be displayed *
    // * Navigating all about books are all here *
    // * This BookController is responsible for retrieving and displaying books *
    // *---------------------------------
    Route::controller(BookController::class)->group(function () {
        Route::get('/','index')->name('home');
        Route::get('/books/{id}', 'searchById')
            ->where(['id' => '[0-9]+']);
        Route::get('/books/{genre}', 'searchByGenre')
            ->whereIn('genre', ['mystery', 'thriller', 'teen-fiction', 'horror', 'romance']);
    });

    // *---------------------------------
    // * Reponsible for making a search request through search bar
    // *---------------------------------
    Route::controller(SearchController::class)->group(function () {
        Route::get('/search', 'search');
    });
    // *---------------------------------
    // * Profile Routes *
    // * Handling Profile Routes *
    // * @params only accepts the username
    // *---------------------------------
    Route::controller(ProfileController::class)->group(function(){

        Route::get('/profile/{username}', 'profile')->where(['username' => '[a-zA-Z0-9]+']);
        
        Route::post('/logout', 'logout');

    });


    Route::controller(LibraryController::class)->group(function (){
        Route::get('/library', 'library');
    });

    // *---------------------------------
    // * Routes for for the footer only *
    // *---------------------------------
    Route::get('/about', function(){
        return view('layouts.author.about');
    });
});

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
        Route::post('/register/process', 'store');  
    });
});