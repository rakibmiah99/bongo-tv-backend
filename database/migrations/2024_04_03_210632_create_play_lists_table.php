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
        Schema::create('play_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name')->default('default');
            $table->timestamps();
            $table->foreign('user_id', 'play_lists_user_id_foreign')->on('users')->references('id')->cascadeOnDelete();
            $table->unique(['user_id', 'name'], 'play_lists_user_id_name_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('play_lists');
    }
};
