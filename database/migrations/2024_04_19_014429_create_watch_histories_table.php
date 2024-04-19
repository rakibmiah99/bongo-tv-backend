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
        Schema::create('watch_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('movie_id');
            $table->foreign('user_id', 'watch_histories_user_id_foreign')->references('id')->on('users');
            $table->foreign('movie_id', 'watch_histories_movie_id_foreign')->references('id')->on('movies');
            $table->unique(['user_id', 'movie_id'], 'watch_histories_user_id_movie_id_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watch_histories');
    }
};
