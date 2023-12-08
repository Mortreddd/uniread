<?php

namespace App\Http\Controllers\Read;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Bookmark;
use App\Models\ChapterComment;
use App\Models\Comment;
use App\Models\Votes;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\Auth;

class ChapterController extends Controller
{
    public function index(Request $request, $bookID)
    {
        $chapters = Chapter::orderBy('chapter', 'asc')->where('bookID', $bookID)->get();
        $comments = Comment::with('authors')->where('bookID', $bookID)->get();
        $inBookmarks = Bookmark::where('authorID', Auth::id())->whereIn('chapterID', $chapters->pluck('id'))->exists();
        // return Json::encode($chapters);
        if( $chapters->isEmpty())
        {
            return redirect()->back()->with('error', 'The book has no chapters yet');
        }
        $chapter = $chapters->first();
        $isVoted = Votes::where('authorID', Auth::id())->where('chapterID', $chapter->id)->exists();
        // return Json::encode($isVoted);
        return view('layouts.author.read', ['chapters' => $chapters, 'comments' => $comments], compact(['inBookmarks', 'chapter', 'isVoted']));
    }

    public function read(Request $request, $bookID, $chapterID)
    {
        $chapters = Chapter::where('bookID', $bookID)->orderBy('chapter', 'asc')->get();
        $comments = ChapterComment::with('authors')->where('chapterID', $chapterID)->get();
        $inBookmarks = Bookmark::where('authorID', Auth::id())->where('chapterID', $chapterID)->exists();
        $chapter = Chapter::findOrFail($chapterID);
        $isVoted = Votes::where('authorID', Auth::id())->where('chapterID', $chapterID)->exists();
        Chapter::where('id', $chapterID)->increment('reads');
        // return Json::encode($isVoted);
        return view('layouts.author.read', [
            'chapters' => $chapters, 
            'comments' => $comments], 
            compact(['chapter', 'inBookmarks', 'isVoted']));
    }


}