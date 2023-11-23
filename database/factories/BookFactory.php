<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Genre;
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
        $covers = ['covers/cover1.jpeg', 'covers/cover2.jpg', 'covers/cover3.jpg', 'covers/cover4.jpg', 'covers/cover5.jpg', 'covers/cover6.jpg'];
        return [
            'title' => fake()->realText(30),
            'genreID' => fake()->randomElement(Genre::all('id')),
            'description' => fake()->realText(200),
            'image' => fake()->randomElement($covers),
            'authorID' => fake()->randomElement(Author::all(['id']))
        ];
    }
}