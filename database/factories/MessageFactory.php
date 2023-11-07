<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'senderAuthorID' => fake()->randomElement(Author::all()),
            'receiverAuthorID' => fake()->randomElement(Author::all()),
            'content' => fake()->text(200)
        ];
    }
}