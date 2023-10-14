<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Support\Facades\DB;


class BookController extends Controller
{
    
    public function index()
    {
        
        $books = DB::table('books')
                    ->join('authors', 'books.authorID', '=', 'authors.id')
                    ->select('books.title', 'authors.username')
                    ->limit(5)
                    ->get();

        $bestBook = Book::findOrFail(1);
        return view('layouts.index', ['books' => $books, 'bestbook' => $bestBook]);
    }

    public function search($search)
    {
        $books = Book::where('title', 'like', '%', $search, '%')->get();
        return view('layouts.index', $books);
    }
}