<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $genres = ['Action', 'Horror', 'Mystery', 'Romance', 'Teen Fiction', 'Science Fiction'];
        $covers = ['covers/cover1.jpeg', 'covers/cover2.jpg', 'covers/cover3.jpg', 'covers/cover4.jpg', 'covers/cover5.jpg', 'covers/cover6.jpg'];
        return [
            'title' => fake()->text(30),
            'genre' => fake()->randomElement($genres),
            'description' => fake()->text(200),
            'image' => fake()->randomElement($covers),
            'completed' => fake()->boolean(),
            'collaborative' => fake()->boolean(),
            'reads' => fake()->numberBetween(0, 1000000),
            'authorID' => fake()->randomElement(Author::all(['id']))
        ];
    }
}