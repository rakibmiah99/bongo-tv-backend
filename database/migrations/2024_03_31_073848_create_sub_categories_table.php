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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('slug');
            $table->string('name');
            $table->integer('ordering')->nullable()->default(null);
            $table->boolean('visibility')->default(true);
            $table->timestamps();
            $table->foreign('category_id', 'sub_categories_category_id_foreign')->on('categories')->references('id')->cascadeOnDelete();
            $table->unique(['slug', 'category_id'], 'sub_categories_slug_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
