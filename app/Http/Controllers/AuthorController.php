<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    
    

    public function index($id)
    {
        $author = Author::with(['books', 'followers', 'followed'])->findOrFail($id);
        $username = $author->username;
        $workCount = $author->books->count();
        $followerCount = $author->followers->count();
        $followedCount = $author->followed->count();
        $followers = $author->followers->toArray();
        $works = Book::where('authorID', $author->id)->get(['id', 'title', 'genre', 'image']);
        return view('layouts.profile.author',['works' => $works, 'followers' => $followers], compact(['username', 'workCount', 'followerCount', 'followedCount']));
        
    }
    

    // public function libraries()
    // {
    //     return view('layouts.profile.library');
    // }
}