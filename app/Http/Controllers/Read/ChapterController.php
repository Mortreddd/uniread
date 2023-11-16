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
        $inBookmarks = Bookmark::where('authorID', Auth::id())->exists();
        // $inBookmarks = $request->user()->bookmarks()->where('authorID', Auth::id())->exists();
        return Json::encode($inBookmarks);
        // $chapter = $chapters->first();
        // return view('layouts.author.read', ['chapters' => $chapters, 'comments' => $comments], compact(['inBookmarks', 'chapter']));
    }
}