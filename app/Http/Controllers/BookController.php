<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Library;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookController extends Controller
{
    
    public function index()
    {
        $books = Book::all(['id', 'title', 'genre', 'image'])->take(100);
        $trendingBooks = $books->take(10);
        $groupedBooks = $books->groupBy('genre');
                    
        return view('layouts.author.index', ['trendingBooks' => $trendingBooks, 'groupedBooks' => $groupedBooks]);
    }

    public function id($id)
    {
        
        $book = Book::with(['author', 'chapters', 'ratings', 'library'])->find($id);
        $belongsToLibrary = Library::where('authorID', Auth::id())->where('bookID', $id)->exists();
        $parts = $book->chapters->count();
        $ratings = $book->ratings->count();
        $recommendations = Book::where('genre', $book->genre)
            ->where('id', '!=', $id)
            ->get();

        // return Json::encode($belongsToLibrary);
        return view('layouts.author.description', [
            'book' => $book, 
            'recommendations' => $recommendations,
        ], compact(['parts', 'ratings', 'belongsToLibrary']));

        
    }

    public function search($genre)
    {
        $books = Book::where('genre', Str::headline($genre))->get(['id', 'title', 'genre', 'image']);
        $groupedBooks = $books->groupBy('genre');
                    
        return view('layouts.author.index', ['groupedBooks' => $groupedBooks]);
    }

    public function read($bookID)
    {
        $chapters = Chapter::orderBy('chapterNumber', 'asc')->where('bookID', $bookID)->get();
        $comments = Comment::with('authors')->where('bookID', $bookID)->get();
        // return Json::encode($comments);
        $chapter = $chapters->first();
        return view('layouts.author.read', ['chapters' => $chapters, 'comments' => $comments], compact(['chapter']));
    }

}