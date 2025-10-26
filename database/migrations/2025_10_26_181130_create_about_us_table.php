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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            // General Info
            $table->string('title');
            $table->text('description');
            $table->string('chairman_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('about_section_image')->nullable();
            $table->string('company_profile_file');
            $table->integer('year_of_innovation')->nullable();
            $table->integer('successful_projects')->nullable();
            $table->integer('client_retention')->nullable();
            // Mission & Vision
            $table->string('mission')->nullable();
            $table->json('mission_points')->nullable();
            $table->string('vision')->nullable();
            $table->json('vision_points')->nullable();
            $table->string('our_values')->nullable();
            $table->json('our_values_points')->nullable();
            $table->integer('client_satisfaction')->nullable();
            $table->integer('projects_delivered')->nullable();
            $table->string('vision_mission_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
