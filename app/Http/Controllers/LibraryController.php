<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Library;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LibraryController extends Controller
{
    public function index()
    {
        $library = Library::with(['author', 'books'])
                        ->where('authorID', Auth::id())
                        ->get()
                        ->flatMap(function ($items){
                            return $items->books;
                        });
        //return dd($library->pluck('books'));
        // return Json::encode($library);
        return view('layouts.author.library', [
            'library' => $library
        ]);
    }

}