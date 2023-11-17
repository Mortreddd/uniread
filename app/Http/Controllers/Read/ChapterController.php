<?php

namespace App\Http\Controllers\Read;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Bookmark;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\Auth;

class ChapterController extends Controller
{
    public function index(Request $request, $bookID)
    {
        $chapters = Chapter::orderBy('chapterNumber', 'asc')->where('bookID', $bookID)->get();
        $comments = Comment::with('authors')->where('bookID', $bookID)->get();
        $inBookmarks = Bookmark::where('authorID', Auth::id())->whereIn('chapterID', $chapters->pluck('id'))->exists();
        // return Json::encode($chapters);
        if( $chapters->isEmpty())
        {
            return redirect()->back()->with('error', 'The book has no chapters yet');
        }
        $chapter = $chapters->first();
        return view('layouts.author.read', ['chapters' => $chapters, 'comments' => $comments], compact(['inBookmarks', 'chapter']));
    }

    public function read(Request $request, $bookID, $chapterID)
    {
        $chapters = Chapter::where('bookID', $bookID)->orderBy('chapterNumber', 'asc')->get();
        $comments = Comment::with('authors')->where('bookID', $chapterID)->get();
        $inBookmarks = Bookmark::where('authorID', Auth::id())->whereIn('chapterID', $chapters->pluck('id'))->exists();
        $chapter = Chapter::findOrFail($chapterID);
        
        // return Json::encode(Auth::id());
        // return to_route('read.chapter')
        return view('layouts.author.read', ['chapters' => $chapters, 'comments' => $comments], compact(['chapter', 'inBookmarks']));
    }

}