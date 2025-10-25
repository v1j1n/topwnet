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
        Schema::create('about_us_home_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('heading');
            $table->text('description')->nullable();
            $table->json('points')->nullable();
            $table->string('status')->default('active');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us_home_settings');
    }
};
