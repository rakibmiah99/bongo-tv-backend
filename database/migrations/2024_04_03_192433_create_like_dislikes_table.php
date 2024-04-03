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
        Schema::create('like_dislikes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('like')->default(false);
            $table->boolean('dislike')->default(false);
            $table->boolean('is_favourite')->default(false);
            $table->foreign('movie_id', 'like_dislikes_movie_id_foreign')->on('movies')->references('id')->cascadeOnDelete();
            $table->foreign('user_id', 'like_dislikes_user_id_foreign')->on('users')->references('id')->cascadeOnDelete();
            $table->unique(['movie_id', 'user_id', 'like'],'like_dislikes_movie_user_like_group');
            $table->unique(['movie_id', 'user_id', 'dislike'],'like_dislikes_movie_user_dislike_group');
            $table->unique(['movie_id', 'user_id', 'is_favourite'],'like_dislikes_movie_user_is_favourite_group');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('like_dislikes');
    }
};
