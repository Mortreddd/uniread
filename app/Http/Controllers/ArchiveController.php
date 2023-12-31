<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArchiveRequest;
use App\Models\Archive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Logging\TestDox\TestCreatedPartialMockObjectSubscriber;

class ArchiveController extends Controller
{
    public function store(CreateArchiveRequest $request)
    {
        Archive::create([
            'authorID' => $request->input('authorID'),
            'bookID' => $request->input('bookID')
        ]);

        return redirect()->back()->with($request->messages());
    
    }

    public function destroy(CreateArchiveRequest $request)
    {
        Archive::where('bookID', $request->input('bookID'))->where('authorID', Auth::id())->delete();
        return redirect()->route('read.book', ['bookID' => $request->input('bookID')]);
    }
}