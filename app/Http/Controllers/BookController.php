<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Support\Facades\DB;


class BookController extends Controller
{
    
    public function index()
    {
        
        $books = Book::all(['id', 'title', 'genre', 'image']);
        return view('layouts.index', ['books' => $books]);
    }

        // $book = DB::table('books')
        //             ->where('books.id', $id)
        //             ->join('authors','books.authorID', '=', 'authors.id')
        //             ->select('books.*', 'authors.*')
        //             ->first();
        


    public function searchById($id)
    {
        
        $book = Book::with('author')->find($id);
        $recommendations = Book::where('genre', $book->genre)
            ->where('id', '!=', $id) // Exclude the current book
            ->get();

        return view('layouts.description', ['book' => $book, 'recommendations' => $recommendations]);
    }

    public function searchGenre()
    {
        
    }
}