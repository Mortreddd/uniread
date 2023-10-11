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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('senderAuthorID');
            $table->unsignedBigInteger('ReceiverAuthorID');
            $table->text('content');
            $table->timestamps();
            $table->foreign('senderAuthorID')->references('id')->on('authors');
            $table->foreign('receiverAuthorID')->references('id')->on('authors');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};