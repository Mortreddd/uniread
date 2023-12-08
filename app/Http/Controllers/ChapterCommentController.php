<?php

namespace App\Http\Controllers;

use App\Models\ChapterComment;
use Illuminate\Http\Request;

class ChapterCommentController extends Controller
{
    public function store(Request $request, $chapterID)
    {
        
        ChapterComment::create(
            [
                'chapterID' => $chapterID,
                'authorID' => request()->user()->id,
                'content' => $request->content
            ]
        );
        
        return back();
    }

}