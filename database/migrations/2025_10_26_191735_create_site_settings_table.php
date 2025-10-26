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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            // General Settings
            $table->json('emails')->nullable();
            $table->json('mobile_numbers')->nullable();
            $table->string('address')->nullable();
            $table->string('footer_note')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('x_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->text('google_map_url')->nullable();
            // Page Banners
            $table->string('client_banner')->nullable();
            $table->string('partner_banner')->nullable();
            $table->string('contact_banner')->nullable();
            $table->string('aboutus_banner')->nullable();
            $table->string('services_banner')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
