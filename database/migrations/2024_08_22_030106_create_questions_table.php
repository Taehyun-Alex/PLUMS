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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
//            $table->foreignId('course_id')->constrained()->onDelete('cascade');
//            $table->foreignId('certificate_id')->constrained()->onDelete('cascade');
//            $table->foreignId('section_id')->constrained()->onDelete('cascade');
            $table->text('question');
            $table->integer('score')->default(1);
            $table->text('tags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
