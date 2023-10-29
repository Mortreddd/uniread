<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Book;
use App\Models\Bookmark;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Follower;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Author::factory(30)->create();
        Book::factory(30)->create();
        Comment::factory(30)->create();
        Chapter::factory(30)->create();
        Bookmark::factory(10)->create();
        Follower::factory(30)->create();
        Message::factory(40)->create();
    }
}