<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Request;
use App\Models\Library;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function index()
    {
        $library = Library::with(['books'])->where('authorID', Auth::id())->get();
        return view('layouts.author.library', [
            'library' => $library
        ]);
    }

    public function store(Request $request)
    {
        Library::create($request->all());

        return redirect()->back();
    }

}