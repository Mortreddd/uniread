<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use App\Models\Votes;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function store(Request $request)
    {
        $authorID = $request->input('authorID');
        $chapterID = $request->input('chapterID');
        if(!Votes::where('authorID', $authorID)->where('chapterID', $chapterID)->exists())
        {
            Votes::create([
                'authorID' => $authorID,
                'chapterID' => $chapterID
            ]);
        }
        return redirect()->back()->with('isVoted', true);
    }


    public function destroy(Request $request)

    {
        $authorID = $request->input('authorID');
        $chapterID = $request->input('chapterID');
        if(Votes::where('authorID', $authorID)->where('chapterID', $chapterID)->exists())
        {
            Votes::where('authorID', $authorID)->where('chapterID', $chapterID)->delete();
        }
        return redirect()->back()->with('isVoted', false);
    }
    
}