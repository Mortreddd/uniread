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
        $genres = ['Fiction', 'Novel', 'Historical Fiction', 'Narrative', 'Thriller', 'Science Fiction', 'Mystery'];
        return [
            'title' => fake()->name(),
            'genre' => fake()->randomElement($genres),
            'description' => fake()->text(200),
            'collaborative' => fake()->boolean(),
            'authorID' => fake()->randomElement(Author::all())
        ];
    }
}