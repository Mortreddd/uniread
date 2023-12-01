<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Draft;
use App\Models\Genre;
use App\Models\Library;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookController extends Controller
{
    
    public function index()
    {
        // $trendingBooks = Chapter::with(['book.genre'])->orderByDesc('reads')->groupBy('bookID')->limit(15)->get();
        $trendingBooks = Book::with(['chapters', 'genre'])->take(15);
        // $trendingBooks = Chapter::with(['book.genre'])->sum('reads')->groupBy('bookID')->limit(15)->get();
        $genres = Genre::with('books')->take(100)->get(['id', 'name']);
        // return Json::encode($trendingBooks);         
        return view('layouts.author.index', ['trendingBooks' => $trendingBooks, 'genres' => $genres]);
    }

    public function search(Request $request, $bookID)
    {
        $book = Book::with(['genre', 'author', 'chapters', 'ratings', 'library'])->find($bookID);
        $belongsToLibrary = Library::where('authorID', Auth::id())->where('bookID', $bookID)->exists();
        $parts = $book->chapters->count();
        $ratings = $book->ratings->count();
        $recommendations = Book::where('genreID', $book->genreID)
            ->where('id', '!=', $bookID)
            ->get();

        // return Json::encode($belongsToLibrary);
        return view('layouts.author.description', [
            'book' => $book, 
            'recommendations' => $recommendations,
        ], compact(['parts', 'ratings', 'belongsToLibrary']));
        
    }

    public function store(StoreBookRequest $request)
    {
        $title = Str::title($request->title);
        $description = $request->input('description');
        $genreID = $request->input('genreID');
        $authorID = $request->user()->id;
        $mature = $request->input('mature') == null ? false : true;
        $copyright = $request->input('copyright');
        $filename = time().'_'.$request->file('image')->getClientOriginalName();
        $path = 'storage/covers/'.$filename;
        $request->file('image')->storeAs($path);
        
        // $book = Book::insert([
        //     'title' => $title,
        //     'genreID' => $genreID,
        //     'description' => $description,
        //     'image' => $path,
        //     'mature' => $mature,
        //     'authorID' => $authorID,
        //     'copyright' => $copyright,
        //     'create_at' => now(),
        //     'update_at' => now()
        // ]);

        // Draft::create([
        //     'authorID' => $authorID,
        //     'bookID' => $book->id,
        // ]);

        // dd($book);
        
        // return Json::encode($filename);
        return view('');
    }

    public function show(Request $request)
    {
        // return Json::encode($request->validated());
        // Book::create($request->validated());
        $genres = Genre::all();
        return view('layouts.author.new-story', ['genres' => $genres]);
    }

}