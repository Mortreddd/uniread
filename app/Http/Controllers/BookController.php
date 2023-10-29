<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookController extends Controller
{
    
    public function index()
    {
        $books = Book::all(['id', 'title', 'genre', 'image']);
        $trendingBooks = $books->take(10);
        $groupedBooks = $books->groupBy('genre');
                    
        // return dd($books);
        return view('layouts.index', ['trendingBooks' => $trendingBooks, 'groupedBooks' => $groupedBooks]);
    }

    public function searchById($id)
    {
        
        $book = Book::with('author')->find($id);
        $recommendations = Book::where('genre', $book->genre)
            ->where('id', '!=', $id) // Exclude the current book
            ->get();

        return view('layouts.description', ['book' => $book, 'recommendations' => $recommendations]);
    }

    public function searchByGenre($genre)
    {
        $books = Book::where('genre', Str::headline($genre))->get(['id', 'title', 'genre', 'image']);
        $groupedBooks = $books->groupBy('genre');
                    
        return view('layouts.index', ['groupedBooks' => $groupedBooks]);
    }

    public function searchByTitle($title)
    {
        $books = Book::where('title', 'like', '%'.$title.'%')->get(['id', 'title', 'genre', 'image']);
        $groupedBooks = $books->groupBy('genre');
                    
        return view('layouts.index', ['groupedBooks' => $groupedBooks]);
    }
    // public function test()
    // {
        
    //     $books = Book::all(['id', 'title', 'genre', 'image'])
    //                 ->groupBy(['genre']);
                    
    //     return $books;
    // }
}