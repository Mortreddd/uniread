<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Library>
 */
class LibraryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     
     public function definition(): array
     {
         $authorID = Author::inRandomOrder()->first()->id;
         $bookID = Book::inRandomOrder()->first()->id;
     
         return [
             'authorID' => $authorID,
             'bookID' => $bookID,
         ];
     }
}