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
        Schema::create('subscriber_packages', function (Blueprint $table) {
            $table->id();
            $table->uuid()->default(\Illuminate\Support\Facades\DB::raw('UUID()'));
            $table->string('name')->unique();
            $table->string('type');
            $table->json('description');
            $table->double('price', 10, 2);
            $table->integer('validity_as_day');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriber_packages');
    }
};
