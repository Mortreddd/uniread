<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Support\Facades\DB;


class BookController extends Controller
{
    
    public function index()
    {
        
        // $books = DB::table('books')
        //             ->join('authors','books.authorID', '=', 'authors.id')
        //             ->select('books.*', 'authors.*')
        //             ->limit(10)
        //             ->get();

        $books = Book::all();
        return view('layouts.index', ['books' => $books]);
    }

    public function search($id)
    {
        $books = DB::table('books')
                    ->join('authors', 'books.authorID', '=', 'authors.id')
                    ->select('books.*', 'authors.*')
                    ->where('books.id', '=', $id)
                    ->limit(1)
                    ->get();

        return view('layouts.description', ['books' => $books]);
    }
    public function find($id)
    {
        $book = DB::table('books')
                    ->join('authors', 'books.authorID', '=', 'authors.id')
                    ->select('books.*', 'authors.*')
                    ->where('books.id', '=', $id)
                    ->limit(1)
                    ->get();

        
        return response($book, 200);
    }
}