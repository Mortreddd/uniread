<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'authorID' => fake()->unique(true)->numberBetween(1, Author::all()->count()),
            'bookID' =>fake()->numberBetween(1, Book::all()->count()),
            'rating' => fake()->numberBetween(1, 5)
        ];
    }
}