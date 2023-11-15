<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Comment;

class ChapterController extends Controller
{
    public function index(Request $request, $bookID)
    {
        $chapters = Chapter::orderBy('chapterNumber', 'asc')->where('bookID', $bookID)->get();
        $comments = Comment::with('authors')->where('bookID', $bookID)->get();
        // return Json::encode($comments);
        $chapter = $chapters->first();
        return view('layouts.author.read', ['chapters' => $chapters, 'comments' => $comments], compact(['chapter']));
    }
}