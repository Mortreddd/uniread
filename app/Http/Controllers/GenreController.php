<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(Request $request, $genreID)
    {
        $books = Book::with('genre')->where('genreID', $genreID)->get();
        $groupedBooks = $books->groupBy('genre');
        return Json::encode($books);         
        // return view('layouts.author.index', ['groupedBooks' => $groupedBooks]);
    }
}