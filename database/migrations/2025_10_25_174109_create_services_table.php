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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            // Carousel Content
            $table->string('image');
            $table->string('alt_text');
            $table->string('primary_label')->nullable();
            $table->string('secondary_label')->nullable();
            $table->string('title')->nullable();
            $table->string('title_hover')->nullable();
            $table->string('hover_icon_class')->nullable();

            // Detail Page Content
            $table->string('big_image');
            $table->text('description')->nullable();

            // Meta & Admin
            $table->integer('sort_order');
            $table->string('status')->default('Active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
