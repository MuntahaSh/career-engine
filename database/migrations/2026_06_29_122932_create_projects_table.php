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
    {Schema::create('projects', function (Blueprint $table) {

    $table->id();

    $table->foreignId('user_id')
        ->constrained()
        ->cascadeOnDelete();

    // Basic Information
    $table->string('title');
    $table->string('slug')->unique();

    $table->string('category');

    $table->string('summary',500);

    $table->longText('description');

    // Links
    $table->string('github_url')->nullable();

    $table->string('demo_url')->nullable();

    // Thumbnail
    $table->string('thumbnail')->nullable();

    // Visibility
    $table->boolean('is_public')->default(true);

    // Statistics
    $table->unsignedInteger('views')->default(0);

    $table->unsignedInteger('likes')->default(0);

    $table->timestamps();

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
