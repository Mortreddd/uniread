<?php

use App\Models\Author;
use App\Models\Chapter;
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
        Schema::create('chapter_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Chapter::class, 'chapterID')->constrained('chapters')->cascadeOnDelete();
            $table->foreignIdFor(Author::class, 'authorID')->constrained('authors')->cascadeOnDelete();
            $table->text('content')->nullable();
            $table->unsignedBigInteger('likes')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapter_comments');
    }
};