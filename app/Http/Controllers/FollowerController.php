<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(Request $request)
    {
        Follower::create([
            'followerAuthorID' => $request->input('followerAuthorID'),
            'followedAuthorID' => $request->input('followedAuthorID'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return back();
        
    }


    public function destroy(Request $request)
    {
        Follower::where('followerAuthorID', $request->input('followerAuthorID'))->where('followedAuthorID', $request->input('followedAuthorID'))->delete();
        return back();
    }
}