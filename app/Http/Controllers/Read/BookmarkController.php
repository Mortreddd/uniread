<?php

namespace App\Http\Controllers\Read;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookmark;

class BookmarkController extends Controller
{
    public function store(Request $request, $chapterID)
    {
        $bookmarks = Bookmark::with(['chapters.book'])->where('chapterID', $chapterID)->get();
        
    }
}