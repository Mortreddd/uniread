<?php

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
            $table->unsignedBigInteger("bookID");
            $table->unsignedBigInteger('authorID');
            $table->foreign('bookID')->references('id')->on('books');
            $table->foreign('authorID')->references('id')->on('authors');
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