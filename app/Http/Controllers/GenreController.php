<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class GenreController extends Controller
{
    private $backgrounds = [
        1 => 'storage/backgrounds/Mystery.webp', 
        2 => 'storage/backgrounds/Teenfiction.webp',
        3 => 'storage/backgrounds/Sciencefiction.webp',
        4 => 'storage/backgrounds/Generalfiction.webp',
        5 => 'storage/backgrounds/Sciencefiction.webp',
        6 => 'storage/backgrounds/Fantasy.webp',
        7 => 'storage/backgrounds/Thriller.webp',
        8 => 'storage/backgrounds/Action.webp',
        9 => 'storage/backgrounds/Romance.webp',
        10 => 'storage/backgrounds/Adventure.webp',
        11 => 'storage/backgrounds/Paranormal.webp',
        12 => 'storage/backgrounds/Spiritual.webp',
        13 => 'storage/backgrounds/Horror.webp'
    ];
    private $captions = [
            1 => [
                'Mystery' => 'Knowledge does not eliminate the sense of wonder and mystery. There is always more to discover.'
            ],
            2 => [
                'Teen Fiction' => 'Keep true to the dreams of your youth'
            ],
            3 => [
                'Science Fiction' => 'Science fiction has always served as a morality tale and will continue to do so.'
            ],
            4 => [
                'General Fiction' => 'Ultimately,fiction is the art of telling the truth through lies.'
            ],
            5 => [
                'Historical Fiction' => 'History is just a series of unexpected events. It can only get us ready to be shocked once more.'
            ],
            6 => [
                'Fantasy' => "Fantasy isn't much of an escape from reality. It's a method of comprehending it."
            ],
            7 => [
                'Thriller' => 'The darkest secrets are hidden behind the sweetest smiles.'
            ],
            8 => [
                'Action' => "The little hand says it's time to rock and roll."
            ],
            9 => [
                'Romance' => "Read the beloved stories"
            ],
            10 => [
                'Adventure' => "A passport to endless adventures is reading."
            ],
            11 => [
                'Paranormal' => "As we gazed intently at Death's face, Death blinked first."
            ],
            12 => [
                'Spiritual' => 'Silence is the path of spirituality.'
            ],
            13 => [
                'Horror' => 'Be ready to be surprised when you believe you have read everything. A brand-new collection of terrifying stories and unearthly terrors.'
            ]
        ];
    public function index(Request $request, $genreID)
    {
        // $books = Book::with('genre')->where('genreID', $genreID)->get();
        // $groupedBooks = $books->groupBy('genre');
        // return Json::encode($books);         
        // return view('layouts.author.index', ['groupedBooks' => $groupedBooks]);

        $genres = Genre::with('books')->where('id', $genreID)->get();
        $books = Book::with('author')->where('genreID', $genreID)->limit(20)->get();
        $title = $genres->first();
        $captions = $this->captions[$genreID];
        $background = $this->backgrounds[$genreID];
        // return Json::encode($books);
        return view('layouts.author.browse',['books' => $books], compact(['title', 'genres', 'captions', 'background']));
    }

}