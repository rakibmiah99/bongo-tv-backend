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
        Schema::create('movies_generics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger('generic_type_id');
            $table->foreign('movie_id', 'movies_generics_movie_id_foreign')->on('movies')->references('id')->cascadeOnDelete();
            $table->foreign('generic_type_id', 'movies_generics_generic_type_id_foreign')->on('generic_types')->references('id')->cascadeOnDelete();
            $table->unique(['movie_id', 'generic_type_id'], 'movies_generics_unique_group');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies_generics');
    }
};
