<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    public function index(Request $request, $bookID)
    {
        $authorID = $request->user()->id;
        $chapters = Chapter::where('bookID', $bookID)->get();
        $book = Book::with('chapters')->where('authorID', $authorID)->where('id', $bookID)->get();
        // $chapters = $book->chapters;
        // return Json::encode($book->pluck('chapters'));
        return view('layouts.author.workspace', ['book' => $book, 'chapters' => $chapters]);
    }
}