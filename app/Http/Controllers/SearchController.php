<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    
    public function index(Request $request)
    {
        $search = $request->search;
        
        if($request->filled('search'))
        {
            $books = Book::with(['author', 'ratings', 'chapters'])->where('title', 'LIKE', '%'. $search .'%')->get();
            $authors = Author::with(['books'])->where('username', 'LIKE', '%'. $search .'%')->get();
            // $authors = Author::with(['books', 'followers'])->where('username', 'LIKE', '%'. $search .'%')
            //                 ->orWhere('email', 'LIKE', '%'. $search .'%')->get();
        
            // return Json::encode($books->pluck('author'));
            return view('layouts.author.search', [
                'books' => $books,
                'authors' => $books->pluck('author') ?? $authors
            ]);
        }
        
        return view('errors.search');
    }
}