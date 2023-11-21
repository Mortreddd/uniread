<?php

use App\Models\Author;
use App\Models\Genre;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignIdFor(Genre::class, 'genreID')->constrained('genres')->cascadeOnDelete();
            $table->string('description');
            $table->string('image');
            $table->boolean('completed')->default(false);
            $table->boolean('collaborative')->default(false);
            $table->unsignedBigInteger('votes')->default(0);
            $table->boolean('mature')->default(false);
            $table->foreignIdFor(Author::class, 'authorID')->constrained('authors')->cascadeOnDelete();
            $table->enum('copyright', ['Public Domain', 'All Rights Reserved', 'Creative Commons (CC) Attribution']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};