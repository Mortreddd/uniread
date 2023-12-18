<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class PersonalStoriesController extends Controller
{
    /**
     * Display the index page for personal stories.
     *
     * This method retrieves the drafts and published books associated with the authenticated user,
     * and passes them to the 'layouts.author.personal-story' view for rendering.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $authID = $request->user()->id;
        $drafts = Book::with('chapters')->where('authorID', $authID)->where('published', false)->get();
        $published = Book::with('chapters')->where('authorID', $authID)->where('published', true)->get();
        return view('layouts.author.personal-story', ['drafts' => $drafts, 'published' => $published]);
        // return Json::encode([$drafts]);
    }
}