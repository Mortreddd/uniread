<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Profile\SettingsController;
use App\Http\Controllers\Read\LibraryController;
use App\Http\Controllers\Profile\PersonalStoriesController;
use App\Http\Controllers\Profile\WorkspaceController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Read\ChapterController;
use App\Http\Controllers\Read\BookmarkController;
use App\Http\Controllers\VotesController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ChapterCommentController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Profile\UpdateFullNameController;
use App\Http\Controllers\Profile\UpdatePasswordController;
use App\Http\Controllers\Profile\UpdateUsernameController;

// *---------------------------------
// * All of the routes for the authors *
// * Handling Profile Routes *
// *---------------------------------

Route::middleware(['auth.session', 'auth', 'role:author', 'verified'])->group( function () {

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
        Route::delete('/books/{id}/delete', 'destroy')->name('book.delete');
    });

    Route::controller(GenreController::class)->group( function () {
        Route::get('/books/genres/{genreID}', 'index')->name('genre.index');
    });

    Route::controller(MessageController::class)->group( function () {
        Route::get('/messages/inbox', 'index')->name('messages.inbox');
        Route::get('/messages/inbox/{username}', 'show')->name('messages.open.inbox');
        Route::post('/message/inbox/send', 'store')->name('messages.create');
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


    Route::controller(FollowerController::class)->group( function () {
        Route::post('/user/profile/add', 'store')->name('follow.add');
        Route::delete('/user/profile/delete', 'destroy')->name('follow.delete');
    });

    Route::controller(SettingsController::class)->group(function () {
        Route::get('/profile/settings', 'index')->name('profile.settings');
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
    // * Routes for personal stories of authenticated user
    // *---------------------------------

    Route::controller(PersonalStoriesController::class)->group( function () {
        Route::get('/works/my-stories', 'index')->name('author.stories');
    });

    Route::controller(WorkspaceController::class)->group( function () {
        Route::get('/works/workspace/{bookID}', 'redirect')->name('workspace.redirect');
        Route::get('/works/workspace/{bookID}/chapter/{chapterID}', 'index')->name('workspace');
        Route::post('/works/workspace/chapter/create', 'store')->name('chapter.create');
        Route::any('/works/workspace/{bookID}/chapter/{chapterID}/modify', 'track')->name('chapter.track');
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
    Route::controller(ChapterCommentController::class)->group(function (){
        Route::post('/comment/add/{chapterID}', 'store')->name('comment.add');

    });
    Route::put('/profile/update-fullname', [UpdateFullNameController::class, 'update'])->name('update.fullname');
    Route::put('/profile/update-username', [UpdateUsernameController::class, 'update'])->name('update.username');
    Route::put('/profile/update-password', [UpdatePasswordController::class, 'update'])->name('update.password');

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