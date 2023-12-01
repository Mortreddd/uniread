<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Mail\MailVerficationForgotPasswordController;
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
use App\Http\Controllers\VotesController;
use App\Mail\MailVerificationForgotPassword;

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

Route::middleware(['auth.session', 'auth'])->group( function () {

    // *---------------------------------
    // * Handle the Books to be displayed *
    // * Navigating all about books are all here *
    // * This BookController is responsible for retrieving and displaying books *
    // *---------------------------------
    Route::controller(BookController::class)->group(function () {
        Route::get('/','index')->name('home');
        Route::get('/books/{bookID}', 'search')->name('book.description')->where(['bookID' => '[0-9]+']);
        Route::get('/books/new-story', 'show')->name('book.add');
        Route::post('/books/new-story/create', 'store')->name('book.create');
    });

    Route::controller(GenreController::class)->group( function () {
        Route::get('/books/genres/{genreID}', 'index')->name('genre.index');
    });

    Route::controller(ChapterController::class)->group( function () {
        Route::get('/books/{bookID}/read', 'index')->name('read.book');
        Route::get('/books/{bookID}/read/chapter/{chapterID}', 'read')->name('read.chapter');
    });
    Route::controller(BookmarkController::class)->group(function () {
        Route::get('/bookmarks/chapter/{chapterID}', 'index')->name('trace.chapter');
        Route::put('/books/bookmark-add', 'store')->name('bookmark.add');
        Route::delete('/books/bookmark-remove', 'destroy')->name('bookmark.remove');
    });

    
    Route::controller(VotesController::class)->group(function () {
        Route::put('/books/vote-add', 'store')->name('vote.add');
        Route::delete('/books/vote-remove', 'destroy')->name('vote.remove');
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

    // *---------------------------------
    // *  FORGOT PASSWORD ROUTES
    // *---------------------------------
    Route::controller(MailVerficationForgotPasswordController::class)->group( function () {
        Route::post('/profile/verify-email', 'send')->name('verify.email');
    });
    
    Route::controller(ResetPasswordController::class)->group(function () {
        Route::get('/profile/reset-password/{id}/{token}', 'show')->name('reset.password');
        Route::post('/profile/reset-password/process', 'reset')->name('reset.password.process');
    });
});