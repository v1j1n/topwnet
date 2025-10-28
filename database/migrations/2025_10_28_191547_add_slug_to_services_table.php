<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add slug column as nullable first
        Schema::table('services', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
        });

        // Generate unique slugs for existing records
        $services = DB::table('services')->get();
        $slugCounts = [];

        foreach ($services as $service) {
            $baseSlug = Str::slug($service->title);
            $slug = $baseSlug;

            // If this slug already exists, append a number
            if (isset($slugCounts[$baseSlug])) {
                $slugCounts[$baseSlug]++;
                $slug = $baseSlug.'-'.$slugCounts[$baseSlug];
            } else {
                $slugCounts[$baseSlug] = 0;
            }

            DB::table('services')
                ->where('id', $service->id)
                ->update(['slug' => $slug]);
        }

        // Make slug unique and not nullable
        Schema::table('services', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
