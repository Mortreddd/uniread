<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Archive;
use App\Models\Book;
use App\Models\Bookmark;
use App\Models\Chapter;
use App\Models\Comment;
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
        $trendingBooks = Book::with(['chapters', 'genre'])->limit(15)->get();
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
        $storePath = 'public/covers/'.$filename;
        $request->file('image')->storeAs($storePath);
        $book = Book::create([
            'title' => $title,
            'genreID' => $genreID,
            'description' => $description,
            'image' => $path,
            'mature' => $mature,
            'published' => false,
            'authorID' => $authorID,
            'copyright' => $copyright,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return to_route('author.stories');
    }

    public function show(Request $request)
    {
        // return Json::encode($request->validated());
        // Book::create($request->validated());
        $genres = Genre::all();
        return view('layouts.author.new-story', ['genres' => $genres]);
    }

    public function destroy(Request $request, $id)
    {
        if(Chapter::where('bookID', $id)->exists()) {   
            Chapter::where('bookID', $id)->delete();
        }
        if(Archive::where('bookID', $id)->exists()){
            Archive::where('bookID', $id)->delete();
        }
        if(Library::where('bookID', $id)->exists()){
            Library::where('bookID', $id)->delete();
        }
        if(Comment::where('bookID', $id)->exists()){
            Comment::where('bookID', $id)->delete();
        }
        Book::find($id)->delete();
        return back();
    }

}