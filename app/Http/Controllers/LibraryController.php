<?php

namespace App\Http\Controllers;

use App\Http\Requests\LibraryRequest;
use App\Models\Archive;
use App\Models\Library;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function index()
    {
        $library = Library::with(['books'])->where('authorID', Auth::id())->get();
        $archives = Archive::with(['books'])->where('authorID', Auth::id())->get();
        return view('layouts.author.library', [
            'library' => $library->pluck('books')->collapse(),
            'archives' => $archives->pluck('books')->collapse()
        ]);
        // return Json::encode($archive);
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