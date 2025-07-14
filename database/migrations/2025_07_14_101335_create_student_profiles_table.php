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
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Personal Details
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth')->nullable();
            $table->string('contact_number')->nullable();
            $table->text('address')->nullable();

            // Educational Details
            $table->string('highest_qualification')->nullable();
            $table->year('year_of_passing')->nullable();
            $table->string('university_institute')->nullable();

            // Professional Details
            $table->string('current_organization')->nullable();
            $table->integer('years_of_experience')->nullable();
            $table->text('skills')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_profiles');
    }
};
