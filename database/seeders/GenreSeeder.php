<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            [
                'name' => 'Mystery',
            ],
            [
                'name' => 'Teen Fiction',
            ],
            [
                'name' => 'Science Fiction',
            ],
            [
                'name' => 'General Fiction',
            ],
            [
                'name' => 'Historical Fiction',
            ],
            [
                'name' => 'Fantasy',
            ],
            [
                'name' => 'Thriller',
            ],
            [
                'name' => 'Action',
            ],
            [
                'name' => 'Romance',
            ],
            [
                'name' => 'Adventure',
            ],
            [
                'name' => 'Paranormal',
            ],
            [
                'name' => 'Spiritual',
            ],
            [
                'name' => 'Horror',
            ]
        ];

        foreach ($genres as $genre) {
            DB::table('genres')->insert($genre);
        }
    }
}