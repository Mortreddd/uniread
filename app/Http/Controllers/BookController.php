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
                    ->select('books.*', 'authors.*')
                    ->limit(10)
                    ->get();

        return view('layouts.index', ['books' => $books]);
    }

    public function search($id)
    {
        $books = DB::table('books')
                    ->join('authors', 'books.authorID', '=', 'authors.id')
                    ->select('books.*', 'authors.*')
                    ->where('books.id', '=', $id)
                    ->limit(10)
                    ->get();

        return view('layouts.index', $books);
    }
}