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
        Schema::create('movies_celebrities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('celebrity_profile_id');
            $table->unsignedBigInteger('movie_id');
            $table->foreign('celebrity_profile_id', 'movies_celebrities_celebrity_profile_id_foreign')->references('id')->on('celebrity_profiles');
            $table->foreign('movie_id', 'movies_celebrities_movie_id_foreign')->references('id')->on('movies');
            $table->unique(['celebrity_profile_id', 'movie_id'], 'movies_celebrities_celebrity_profile_id_movie_id_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies_celebrities');
    }
};
