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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('film_industry_id');
            $table->string('slug')->unique();
            $table->string('name');
            $table->longText('description');
            $table->enum('play_mode', ['free', 'paid'])->default('paid');
            $table->float('rating')->nullable()->default(null);
            $table->boolean('visibility')->default(true);
            $table->string('trailer_youtube_link')->nullable()->default(null);
            $table->string('video_path')->nullable()->default(null);
            $table->timestamps();
            $table->foreign('film_industry_id')->on('film_industries')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
