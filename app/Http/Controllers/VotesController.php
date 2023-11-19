<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Votes;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function store(Request $request)
    {
        Votes::create([
            'authorID' => $request->input('authorID'),
            'bookID' => $request->input('bookID')
        ]);

        Book::where('id', $request->input('bookID'))->increment('votes');

        return redirect()->back()->with('isVoted', true);
    }


    public function destroy(Request $request)

    {
        Votes::where('authorID', $request->input('authorID'))->where('bookID', $request->input('bookID'))->delete();
        return redirect()->back()->with('isVoted', false);
    }

    
}