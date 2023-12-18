<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Bookmark;
use App\Models\Chapter;
use App\Models\ChapterComment;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{

    /**
     * Redirects to the workspace page with the specified book and chapter ID.
     *
     * @param Request $request The HTTP request object.
     * @param int $bookID The ID of the book.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function redirect(Request $request, $bookID)
    {
        // Retrieve the author ID from the authenticated user
        $authorID = $request->user()->id;

        // Retrieve the book and chapters associated with the author and book ID
        $book = Book::where('authorID', $authorID)->where('id', $bookID)->get();
        $chapters = Chapter::where('bookID', $bookID)->get();

        // Redirect to the workspace page with the book and chapter ID
        return redirect()->route('workspace', ['bookID' => $bookID, 'chapterID' => $chapters->first()->id ?? 0]);
    }

    /**
     * Displays the workspace page with the specified book and chapter ID.
     *
     * @param Request $request The HTTP request object.
     * @param int $bookID The ID of the book.
     * @param int $chapterID The ID of the chapter.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View The view.
     */
    public function index(Request $request, $bookID, $chapterID)
    {
        // Retrieve the author ID from the authenticated user
        $authorID = $request->user()->id;

        // Retrieve the chapters associated with the book ID
        $chapters = Chapter::where('bookID', $bookID)->get();

        // Retrieve the selected chapter and book
        $selectedChapter = Chapter::find($chapterID);
        $selectedBook = Book::find($bookID);

        // Check if the selected book is published
        $hasPublished = $selectedBook->published;

        // Retrieve the book with its chapters associated with the author and book ID
        $book = Book::with('chapters')->where('authorID', $authorID)->where('id', $bookID)->first();

        // Return the workspace view with the book, chapters, selected chapter, hasPublished, and selected book
        return view('layouts.author.workspace', ['book' => $book, 'chapters' => $chapters], compact('selectedChapter','hasPublished', 'selectedBook'));
        // return Json::encode($selectedBook);
    }

    /**
     * Stores a new chapter.
     *
     * @param Request $request The HTTP request object. 
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function store(Request $request)
    {
        // Create a new chapter with the validated request data
        Chapter::create($request->validate([
            'chapter' => 'required',
            'title' => 'nullable',
            'content' => 'nullable',
            'bookID' => 'required'
        ]));

        // Redirect to the redirect method with the book ID
        return to_route('workspace.redirect', ['bookID' => $request->input('bookID')]);
    }

    /**
     * Tracks the actions performed on a chapter.
     *
     * @param Request $request The HTTP request object.
     * @param int $bookID The ID of the book.
     * @param int $chapterID The ID of the chapter.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function track(Request $request, $bookID, $chapterID)
    {
        // return Json::encode($request);
        // Check if the 'save' button is clicked
        if($request->input('save') === 'Save')
        {
            // Update the chapter with the validated request data
            Chapter::find($chapterID)
                ->update($request->validate([
                    'title' => 'nullable',
                    'content' => 'nullable',
                ]));

            // Update the chapter's 'updated_at' timestamp
            Chapter::find($chapterID)
                ->update(['updated_at' => now()]);
        }
        // Check if the 'delete' button is clicked
        else if($request->has('delete'))
        {
            // Delete the chapter's associated bookmarks and comments
            Bookmark::where('chapterID', $chapterID)->delete();
            ChapterComment::where('chapterID', $chapterID)->delete();

            // Delete the chapter
            Chapter::find($chapterID)->delete();
        }
        // Check if the 'publish' button is clicked
        else if($request->has('publish'))
        {
            // Update the book's 'published' status to true
            Book::find($bookID)
                ->update(['published' => true]);
        }
        // Check if the 'unpublish' button is clicked
        else if($request->has('unpublish'))
        {
            // Update the book's 'published' status to false
            Book::find($bookID)
                ->update(['published' => false]);
        }

        // Redirect to the redirect method with the book ID
        return to_route('workspace.redirect', ['bookID' => $bookID]);
    }

}