<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    
    public function search(Request $request)
    {
        $search = $request->search;
        if($request->filled('search'))
        {
            $books = Book::where('title', 'LIKE', '%'. $search .'%')->get(['id', 'title', 'genre']);
            $authors = Author::where('username', 'LIKE', '%'. $search .'%')->get(['username', 'id']);
        
        
            return view('layouts.search');
        }
        
        return view('errors.search');
    }
}