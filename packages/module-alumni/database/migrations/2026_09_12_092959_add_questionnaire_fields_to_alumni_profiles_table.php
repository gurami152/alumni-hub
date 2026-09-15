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
        Schema::table('alumni_profiles', function (Blueprint $table) {
            $table->integer('enrollment_year')->nullable();
            $table->string('education_level')->nullable();
            $table->text('awards_state')->nullable();
            $table->text('awards_other')->nullable();
            $table->json('contact_preferences')->nullable();
            $table->text('suggestions')->nullable();
            $table->json('social_links')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alumni_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'enrollment_year',
                'education_level',
                'awards_state',
                'awards_other',
                'contact_preferences',
                'suggestions',
                'social_links',
            ]);
        });
    }
};
