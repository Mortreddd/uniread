<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Support\Facades\DB;


class BookController extends Controller
{
    
    public function index()
    {
        
        $books = Book::all();
        return view('layouts.index', ['books' => $books]);
    }

    public function searchById($id)
    {
        // $book = DB::table('books')
        //             ->where('books.id', $id)
        //             ->join('authors','books.authorID', '=', 'authors.id')
        //             ->select('books.*', 'authors.*')
        //             ->first();
        
        $book = Book::find($id)->author();
        $recommendations = Book::where('genre', 'genre')->get();         
        return view('layouts.description', ['book' => $book, 'recommendations' => $recommendations]);
    }
    public function searchGenre()
    {
        
    }
}