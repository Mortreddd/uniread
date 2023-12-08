<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Chapter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChapterComment>
 */
class ChapterCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [ 
            'chapterID' => fake()->randomElement(Chapter::all(['id'])),
            'authorID' => fake()->randomElement(Author::all(['id'])),
            'content' => fake()->realText(100)
        ];
    }
}