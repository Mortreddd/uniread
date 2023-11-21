<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Book;
use App\Models\Bookmark;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Library;
use App\Models\Message;
use App\Models\Follower;
use App\Models\Rating;
use App\Models\Read;
use App\Models\Votes;
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
        Author::factory(100)->create();
        Book::factory(2300)->create();
        Comment::factory(1200)->create();
        Chapter::factory(5000)->create();
        Bookmark::factory(300)->create();
        Follower::factory(1200)->create();
        Message::factory(400)->create();
        Rating::factory(500)->create();
        Library::factory(400)->create();
        Read::factory(700)->create();
        Votes::factory(500)->create();
    }
}