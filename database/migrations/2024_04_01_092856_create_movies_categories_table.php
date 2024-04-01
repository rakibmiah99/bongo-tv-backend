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
        Schema::create('movies_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id')->default(null)->nullable();
            $table->enum('priority', [1,2,3]);
            $table->foreign('movie_id', 'movies_categories_movie_id_foreign')->on('movies')->references('id')->cascadeOnDelete();
            $table->foreign('category_id', 'movies_categories_category_id_foreign')->on('categories')->references('id')->cascadeOnDelete();
            $table->foreign('sub_category_id', 'movies_categories_sub_category_id_foreign')->on('sub_categories')->references('id')->cascadeOnDelete();
            $table->unique(['movie_id', 'category_id', 'sub_category_id'], 'movies_categories_unique_group');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies_categories');
    }
};
