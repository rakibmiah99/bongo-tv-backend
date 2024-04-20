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
        Schema::create('movie_series', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_season_id')->nullable();
            $table->unsignedBigInteger('series_movie_id')->nullable();
            $table->unsignedBigInteger('movie_id');
            $table->foreign('series_movie_id', 'movie_series_series_movie_id_foreign')->references('id')->on('movies');
            $table->foreign('movie_id', 'movie_series_movie_id_foreign')->references('id')->on('movies');
            $table->unique(['movie_id', 'movie_season_id'], 'movie_series_movie_id_movie_season_id_unique');
            $table->unique(['movie_id', 'series_movie_id'], 'movie_series_movie_id_series_movie_id_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_series');
    }
};
