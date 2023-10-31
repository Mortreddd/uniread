<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterAuthorRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Follower;
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
        // Get the currently authenticated user's ID
        $userID = Auth::id();

        $workCount = Book::where('authorID', $userID)->get(['id'])->count();
        $followerCount = Follower::where('followedAuthorID', $userID)->get(['followerAuthorID'])->count();
        $followedCount = Follower::where('followerAuthorID', $userID)->get(['followedAuthorID'])->count();
        
        $works = Book::where('authorID', $userID)->get(['id', 'title', 'genre', 'image']);
        return view('layouts.profile.author',['works' => $works], compact(['workCount', 'followerCount', 'followedCount']));
    }

}   