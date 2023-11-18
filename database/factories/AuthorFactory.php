<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullname' => fake()->name(),
            'username' => fake()->unique(true)->userName(),
            'gender' => fake()->randomElement(['Male', 'Female', 'Other']),
            'birthday' => fake()->dateTimeBetween('-50 years', '-5 years'),
            'image' => 'profiles/default-profile.jpg',
            'email' => fake()->unique(true)->safeEmail(),
            'password' => Hash::make(Str::random(8)), // password
            'remember_token' => Str::random(10),
            'last_login' => fake()->dateTimeBetween('-1 years', 'now'),
        ];
    }
}