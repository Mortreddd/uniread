<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Read\LibraryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthorMonitorController;
use App\Http\Controllers\Admin\BookMonitorController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Read\ChapterController;
use App\Http\Controllers\Read\BookmarkController;

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admins', [AuthorMonitorController::class, 'index'])->name('admin.authors');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/books', [BookMonitorController::class, 'index'])->name('admin.books');
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
        Route::get('/books/{id}', 'id')
            ->where(['id' => '[0-9]+']);
    });

    Route::controller(GenreController::class)->group( function () {
        Route::get('/books/genre/{genreID}', 'index')->name('genre.search');
    });

    Route::controller(ChapterController::class)->group( function () {
        Route::get('/books/{bookID}/read', 'index')->name('read.book');
        Route::get('/books/{bookID}/read/chapter/{chapterID}', 'read')->name('read.chapter');
    });
    Route::controller(BookmarkController::class)->group(function () {
        Route::get('/bookmarks/chapter/{chapterID}', 'index')->name('trace.chapter');
        Route::post('/books/bookmark-add', 'store')->name('bookmark.add');
    });

    // *---------------------------------
    // * Responsible for navigating another author
    // *---------------------------------
    Route::controller(AuthorController::class)->group(function () {
        Route::get('/user/profile/{id}', 'index');
    });
    // *---------------------------------
    // * Reponsible for making a search request through search bar
    // *---------------------------------
    Route::controller(SearchController::class)->group(function () {
        Route::get('/search', 'index');
    });
    // *---------------------------------
    // * Profile Routes *
    // * Handling Profile Routes *
    // *---------------------------------
    Route::controller(ProfileController::class)->group(function(){
        Route::get('/profile/{username}', 'index')->where(['username' => '[a-zA-Z0-9]+']);
        Route::post('/logout', 'logout');
    });

    // *---------------------------------
    // * Handling the routes for the authenticated user's library
    // *---------------------------------

    Route::controller(LibraryController::class)->group(function (){
        Route::get('/library', 'index');
        Route::put('/library/add', 'store')->name('library.add');
        Route::delete('/library/remove', 'destroy')->name('library.remove');
    });

    Route::controller(ArchiveController::class)->group(function (){
        Route::put('/archive/add', 'store')->name('archive.add');
        Route::delete('/archive/remove', 'destroy')->name('archive.remove');
    });
    // *---------------------------------
    // * Routes for for the footer only *
    // *---------------------------------
    Route::get('/about', function(){
        return view('layouts.author.about');
    });
    Route::get('/terms-and-agreement', function () {
        return view('layouts.author.terms');
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