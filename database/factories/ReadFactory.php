<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Chapter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Read>
 */
class ReadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'authorID' => fake()->randomElement(Author::all(['id'])),
            'chapterID' => fake()->randomElement(Chapter::all(['id'])),
        ];
    }
}