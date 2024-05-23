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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('date_of_birth');
            $table->string('gender');

            $table->string('education_level');
            $table->string('subject');
            $table->string('institution');
            $table->string('result_type');
            $table->string('result');

            $table->string('language_skill')->nullable();
            $table->string('experience_in_year');

            $table->string('address');
            $table->string('email');
            $table->string('mobile');
            $table->string('linkedin_url');
            
            // files
            $table->string('image')->nullable();
            $table->string('resume')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
