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
        Schema::create('movie_seasons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id');
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->foreign('movie_id', 'movie_seasons_movie_id_foreign')->references('id')->on('movies');
            $table->unique(['movie_id'], 'movie_seasons_movie_id_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_seasons');
    }
};
