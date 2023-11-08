<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Str;

class BookController extends Controller
{
    
    public function index()
    {
        $books = Book::all(['id', 'title', 'genre', 'image']);
        $trendingBooks = $books->take(10);
        $groupedBooks = $books->groupBy('genre');
                    
        return view('layouts.author.index', ['trendingBooks' => $trendingBooks, 'groupedBooks' => $groupedBooks]);
    }

    public function id($id)
    {
        
        $book = Book::with(['author', 'chapters', 'ratings'])->find($id);
        $parts = $book->chapters->count();
        $ratings = $book->ratings->count();
        $recommendations = Book::where('genre', $book->genre)
            ->where('id', '!=', $id) // Exclude the current book
            ->get();

        // return Json::encode($parts);
        return view('layouts.author.description', [
            'book' => $book, 
            'recommendations' => $recommendations,
            
        ], compact(['parts', 'ratings']));
    }

    public function genre($genre)
    {
        $books = Book::where('genre', Str::headline($genre))->get(['id', 'title', 'genre', 'image']);
        $groupedBooks = $books->groupBy('genre');
                    
        return view('layouts.author.index', ['groupedBooks' => $groupedBooks]);
    }


    // public function test()
    // {
        
    //     $books = Book::all(['id', 'title', 'genre', 'image'])
    //                 ->groupBy(['genre']);
                    
    //     return $books;
    // }
}