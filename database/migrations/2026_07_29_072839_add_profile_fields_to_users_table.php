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
            $table->string('job_title')->nullable();
            $table->string('avatar')->nullable();
            $table->string('cv_path')->nullable();
            $table->string('phone')->nullable();
            $table->text('bio')->nullable();
            $table->string('github_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('telegram_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'job_title',
                'avatar',
                'cv_path',
                'phone',
                'bio',
                'github_link',
                'linkedin_link',
                'telegram_link'
            ]);
        });
    }
};
