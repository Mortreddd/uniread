<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Genre;
use App\Models\Library;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookController extends Controller
{
    
    public function index()
    {
        $trendingBooks = Book::with('genre')->orderBy('votes', 'desc')->limit(10)->get();
        $genres = Genre::with('books')->take(100)->get(['id', 'name']);
        // return Json::encode($trendingBooks);         
        return view('layouts.author.index', ['trendingBooks' => $trendingBooks, 'genres' => $genres]);
    }

    public function id($id)
    {
        $book = Book::with(['genre', 'author', 'chapters', 'ratings', 'library'])->find($id);
        $belongsToLibrary = Library::where('authorID', Auth::id())->where('bookID', $id)->exists();
        $parts = $book->chapters->count();
        $ratings = $book->ratings->count();
        $recommendations = Book::where('genreID', $book->genreID)
            ->where('id', '!=', $id)
            ->get();

        // return Json::encode($belongsToLibrary);
        return view('layouts.author.description', [
            'book' => $book, 
            'recommendations' => $recommendations,
        ], compact(['parts', 'ratings', 'belongsToLibrary']));

        
    }

    


}