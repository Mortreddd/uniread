<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chapter>
 */
class ChapterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'chapter' => fake()->numberBetween(1, 100),
            'title' => fake()->realText(50),
            'content' => fake()->realText(200),
            'published' => fake()->boolean(),
            'bookID' => fake()->randomElement(Book::all(['id'])),
            'reads' => fake()->numberBetween(1, 1000),
        ];

    }
}