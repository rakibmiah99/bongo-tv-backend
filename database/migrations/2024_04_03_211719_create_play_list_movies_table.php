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
        Schema::create('play_list_movies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('play_list_id');
            $table->unsignedBigInteger('movie_id');
            $table->foreign('play_list_id', 'play_list_movies_play_list_id_foreign')->on('play_lists')->references('id')->cascadeOnDelete();
            $table->foreign('movie_id', 'play_list_movies_movie_id_foreign')->on('movies')->references('id')->cascadeOnDelete();
            $table->unique(['play_list_id', 'movie_id'], 'play_list_movies_movie_list_group');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('play_list_movies');
    }
};
