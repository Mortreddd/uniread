<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Follower;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    
    

    public function index(Request $request, $id)
    {
        $author = Author::with(['books', 'followers', 'followed'])->findOrFail($id);
        $username = $author->username;
        $workCount = $author->books->count();
        $followerCount = $author->followers->count();
        $followedCount = $author->followed->count();
        $followers = $author->followers->toArray();
        $isFollowing = Follower::where('followerAuthorID', Auth::id())->where('followedAuthorID', $author->id)->exists();
        $works = Book::with('genre')->where('authorID', $author->id)->get();

        // return Json::encode($isFollowing);
        return view('layouts.profile.author',['works' => $works, 'followers' => $followers, 'author' => $author], compact(['username', 'isFollowing', 'workCount', 'followerCount', 'followedCount']));
        
    }
    

    // public function libraries()
    // {
    //     return view('layouts.profile.library');
    // }
}