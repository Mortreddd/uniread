<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterAuthorRequest;
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
        $author = Author::where('username', $username)->get(['id', 'username']);
        // $workCount = Book::where('authorID', $author->id)->get(['id'])->count();
        // $followerCount = Follower::where('followedAuthorID', $author->id)->get(['followerAuthorID'])->count();
        // $followedCount = Follower::where('followerAuthorID', $author->id)->get(['followedAuthorID'])->count();
        
        // $works = Book::where('authorID', $author->id)->get(['id', 'title', 'genre', 'image']);
        return Json::encode([$author]);
        // return view('layouts.profile.author',['works' => $works], compact(['workCount', 'followerCount', 'followedCount']));
    }

}   