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

    public function searchById($id)
    {
        $books = DB::table('books')
                    ->where('books.id', $id)
                    ->join('authors','books.authorID', '=', 'authors.id')
                    ->select('books.*', 'authors.*')
                    ->limit(10)
                    ->get();
                    
        return view('layouts.description', ['books' => $books]);
    }
    public function searchGenre()
    {
        
    }
}