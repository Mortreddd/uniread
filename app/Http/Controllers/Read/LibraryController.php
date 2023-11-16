<?php

namespace App\Http\Controllers\Read;


use App\Http\Controllers\Controller;
use App\Http\Requests\LibraryRequest;
use App\Models\Archive;
use App\Models\Library;
use App\Models\Bookmark;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function index()
    {
        $library = Library::with(['books'])->where('authorID', Auth::id())->get();
        $archives = Archive::with(['books'])->where('authorID', Auth::id())->get();
        $bookmarks = Bookmark::with(['chapters'])->where('authorID', Auth::id())->get();

        return view('layouts.author.library', [
            'library' => $library->pluck('books')->collapse(),
            'archives' => $archives->pluck('books')->collapse(),
            'bookmarks' => $bookmarks->pluck('chapters')->collapse()
        ]);
        // return Json::encode($archives);
    }

    public function store(LibraryRequest $request)
    {
        Library::create([
            'authorID' => $request->input('authorID'),
            'bookID' => $request->input('bookID')
        ]);
        return redirect()->back()->with($request->messages());
    }

    public function destroy(LibraryRequest $request)
    {
        Library::where('authorID', Auth::id())->where('bookID', $request->input('bookID'))->delete();
        return redirect()->back()->with($request->messages());
    }
}