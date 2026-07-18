<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->json('technologies_used')
                ->nullable()
                ->after('skills_keywords');

        });
    }


    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn('technologies_used');

        });
    }
};
