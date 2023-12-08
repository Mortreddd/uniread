<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Bookmark;
use App\Models\Chapter;
use App\Models\ChapterComment;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{

    public function redirect(Request $request, $bookID)
    {
        $authorID = $request->user()->id;
        $book = Book::where('authorID', $authorID)->where('id', $bookID)->get();
        $chapters = Chapter::where('bookID', $bookID)->get();
        return redirect()->route('workspace', ['bookID' => $bookID, 'chapterID' => $chapters->first()->id ?? 0]);
    }
    public function index(Request $request, $bookID, $chapterID)
    {
        $authorID = $request->user()->id;
        $chapters = Chapter::where('bookID', $bookID)->get();
        $selectedChapter = Chapter::find($chapterID);
        $selectedBook = Book::find($bookID);
        $book = Book::with('chapters')->where('authorID', $authorID)->where('id', $bookID)->first();
        return view('layouts.author.workspace', ['book' => $book, 'chapters' => $chapters], compact('selectedChapter','selectedBook'));
        // return Json::encode($selectedChapter);
    }

    public function store(Request $request)
    {
        Chapter::create($request->validate([
            'chapter' => 'required',
            'title' => 'nullable',
            'content' => 'nullable',
            'bookID' => 'required'
        ]));
        return to_route('workspace.redirect', ['bookID' => $request->input('bookID')]);
    }

    public function track(Request $request, $bookID, $chapterID)
    {
        // return Json::encode($request);
        if($request->input('save') === 'Save')
        {
            Chapter::find($chapterID)
                ->update($request->validate([
                    'title' => 'nullable',
                    'content' => 'nullable',
                ]));
            Chapter::find($chapterID)
                ->update(['updated_at' => now()]);
        }
        else if($request->input('delete') === 'Delete')
        {
            Bookmark::where('chapterID', $chapterID)->delete();
            ChapterComment::where('chapterID', $chapterID)->delete();
            Chapter::find($chapterID)->delete();
        }
        else if($request->input('publish') === 'Publish')
        {
            Book::find($bookID)
                ->update(['published' => true]);
        }
        else if($request->input('unpublish') === "Unpublish")
        {
            Book::find($bookID)
                ->update(['published' => false]);
        }

        return to_route('workspace.redirect', ['bookID' => $bookID]);
    }

}