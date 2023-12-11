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
        
        Author::find(Auth::id())->update(['status' => 'inactive', 'last_login' => now() ]);
        // Author::find($request->user()->id)->update('status', 'inactive');
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
        
        $author = Author::with(['books'])->findOrFail(Auth::id());
        $username = $author->username;
        $workCount = $author->books->count();
        $followers = Follower::with('author')->where('followedAuthorID', Auth::id())->get();
        $following = Follower::with('author')->where('followerAuthorID', Auth::id())->get();
        $followerCount = $author->followers->count();
        $followedCount = $author->followed->count();
        $works = Book::with('genre')->where('authorID', $author->id)->get();
        // return Json::encode($followers);
        return view('layouts.profile.author',[
                    'works' => $works, 
                    'author' => $author,
                    'followers' => $followers,
                    'following' => $following
                ], compact(
                    ['username', 'workCount', 'followerCount', 'followedCount']
                )
            );
        
    }
    
}   