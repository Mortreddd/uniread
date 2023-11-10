<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Follower;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{


    // * Remove the Sessions and generate another token  
    // * Redirect to login page
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function index()
    {
        // $author = Author::find(Auth::id());
        // $workCount = Book::where('authorID', $author->pluck('id'))->get(['id'])->count();
        // $followerCount = Follower::where('followedAuthorID', $author->pluck('id'))->get(['followerAuthorID'])->count();
        // $followedCount = Follower::where('followerAuthorID', $author->pluck('id'))->get(['followedAuthorID'])->count();
        
        $author = Author::with(['books', 'followers', 'followed'])->findOrFail(Auth::id());
        $username = $author->username;
        $workCount = $author->books->count();
        $followerCount = $author->followers->count();
        $followedCount = $author->followed->count();
        $works = Book::where('authorID', $author->id)->get(['id', 'title', 'genre', 'image']);
        return view('layouts.profile.author',['works' => $works], compact(['username', 'workCount', 'followerCount', 'followedCount']));
        
    }
    
}   