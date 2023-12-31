<?php

use App\Models\Author;
use App\Models\Book;
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
        Schema::create('collaboratives', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Book::class, 'bookID')->constrained('books')->cascadeOnDelete();
            $table->foreignIdFor(Author::class, 'authorID')->constrained('authors')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collaboratives');
    }
};