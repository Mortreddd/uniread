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
    /**
     * Display the author's profile page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request, $id)
    {
        $author = Author::with(['books'])->findOrFail($id);
        $username = $author->username;
        $workCount = $author->books->count();
        $followers = Follower::with('author')->where('followedAuthorID', $id)->get();
        $following = Follower::with('author')->where('followerAuthorID', $id)->get();
        $followerCount = $author->followers->count();
        $followedCount = $author->followed->count();
        $isFollowing = Follower::where('followerAuthorID', Auth::id())->where('followedAuthorID', $author->id)->exists();
        $works = Book::with('genre')->where('authorID', $author->id)->get();

        // return Json::encode($isFollowing);
        return view('layouts.profile.author',[
                    'works' => $works, 
                    'author' => $author,
                    'followers' => $followers,
                    'following' => $following
                ], 
                compact(
                    ['username', 'isFollowing', 'workCount', 'followerCount', 'followedCount']
                )
        );
        
    }
    

    // public function libraries()
    // {
    //     return view('layouts.profile.library');
    // }
}