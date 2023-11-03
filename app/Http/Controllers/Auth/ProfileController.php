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

    public function profile($username)
    {
        $author = Author::where('username', $username)->get(['id']);
        $workCount = Book::where('authorID', $author->pluck('id'))->get(['id'])->count();
        $followerCount = Follower::where('followedAuthorID', $author->pluck('id'))->get(['followerAuthorID'])->count();
        $followedCount = Follower::where('followerAuthorID', $author->pluck('id'))->get(['followedAuthorID'])->count();
        
        $works = Book::where('authorID', $author->pluck('id'))->get(['id', 'title', 'genre', 'image']);
        return view('layouts.profile.author',['works' => $works], compact(['username', 'workCount', 'followerCount', 'followedCount']));
    }

    
}   