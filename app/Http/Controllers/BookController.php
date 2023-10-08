<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('authors.index', ['books' => Book::all()]);
    }

    public function searchGenre($genre)
    {

        return view('authors.genre', ['books' => Book::where('genre', $genre)->get(), 
                                                'bestBook' => Book::all()->first()]);
    }

}