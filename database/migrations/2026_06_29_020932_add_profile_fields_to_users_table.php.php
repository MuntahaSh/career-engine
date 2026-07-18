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
        Schema::table('users', function (Blueprint $table) {
            // Profile information
            $table->string('title')->nullable()->comment('Professional title ');
            $table->longText('bio')->nullable()->comment('Professional biography');
            $table->string('location')->nullable()->comment('City, Country');
            $table->string('phone',30)->nullable()->comment('Phone number');
            $table->string('website_url')->nullable()->comment('Personal website URL');
            $table->string('profile_photo_path')->nullable()->after('name')->comment('Profile photo path');

            // Social links
            $table->string('github_username')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('twitter_username')->nullable();
            $table->string('portfolio_url')->nullable();
            $table->string('target_role')->nullable();


$table->string('university')->nullable();

$table->string('degree')->nullable();

$table->string('field_of_study')->nullable();
$table->integer('graduation_year')->nullable();

            // Profile metadata
            $table->integer('years_experience')->default(0)->comment('Years of professional experience');
            $table->json('skills_keywords')->nullable()->comment('JSON array of skill keywords for SEO');
            $table->timestamp('profile_completed_at')->nullable()->comment('When profile was fully completed');

            // Tracking
            $table->timestamp('last_profile_updated_at')->nullable();
            $table->integer('profile_views')->default(0)->comment('Number of times profile was viewed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'title',
                'bio',
                'location',
                'phone',
                'website_url',
                'profile_photo_path',
                'github_username',
                'linkedin_url',
                'twitter_username',
                'portfolio_url',
                                'target_role',

                    'university',
                'degree',
                'field_of_study',
                'graduation_year',
                'years_experience',
                'skills_keywords',
                'profile_completed_at',
                'last_profile_updated_at',
                'profile_views',

            ]);
        });
    }
};
