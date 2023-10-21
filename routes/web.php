<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


Route::get('/', [BookController::class, 'index']);

Route::get('/books/{id}', [BookController::class, 'searchById'])
->where(['id' => '[0-9]+']);

Route::get('/genre/{genre}', [BookController::class,'searchByGenre'])
->whereIn('genre', ['fantasy', 'mystery', 'thriller', 'teen-fiction', 'science-fiction']);