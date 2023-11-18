<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookMonitorController extends Controller
{
    public function index()
    {
        
        $genreCounts = Genre::leftJoin('books', 'genres.id', '=', 'books.genreID')
            ->select('genres.name', DB::raw('COUNT(books.id) as book_count'))
            ->groupBy('genres.name')
            ->orderBy('genres.id')
            ->get();
        $publishedBooks = Publisher::with(['book', 'author'])->get();
        $totalBooks = Book::count();
        
        foreach ($genreCounts as $genreCount) {
            $genreCount->percentage = round(($genreCount->book_count * 100) / $totalBooks, 2);
        }

        // $genreCounts now contains the count of books for each genre and their percentages

        // return Json::encode($publishedBooks); 
        return view('layouts.admin.books', [
                'genreCounts' => $genreCounts,
                'publishedBooks' => $publishedBooks
            ]);
    }
}