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
        Schema::create('category_sliders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('movie_id');
            $table->integer('ordering')->default(null)->nullable();
            $table->foreign('category_id', 'category_sliders_category_id_foreign')->on('categories')->references('id')->cascadeOnDelete();
            $table->foreign('movie_id', 'category_sliders_movie_id_foreign')->on('movies')->references('id')->cascadeOnDelete();
            $table->unique(['category_id', 'movie_id'], 'category_sliders_unique_group');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_sliders');
    }
};
