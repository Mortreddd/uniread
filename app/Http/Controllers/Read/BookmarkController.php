<?php

namespace App\Http\Controllers\Read;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookmarkRequest;
use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Chapter;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\Auth;


class BookmarkController extends Controller
{
    public function index(Request $request, $chapterID)
    {
        $chapter = Chapter::find($chapterID);
        return to_route('read.chapter', ['bookID' => $chapter->bookID, 'chapterID' => $chapter->id]);
    }
    public function store(CreateBookmarkRequest $request)
    {
        $chapterID = $request->input('chapterID');
        Bookmark::create([
            'authorID' => Auth::id(),
            'chapterID' => $chapterID,
        ]);
        
        return redirect()->back()->withInput(['inBookmarks' => true]);
    }

    public function destroy(Request $request)
    {
        $chapterID = $request->input('chapterID');
        $authorID = $request->input('authorID');
        Bookmark::where('authorID', $authorID)->where('chapterID', $chapterID)->delete();
        return redirect()->back()->withInput(['inBookmarks' => false]);
    }
}