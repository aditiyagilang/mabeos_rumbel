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
        Schema::create('detail_quizs', function (Blueprint $table) {
            $table->unsignedBigInteger('quizs_id');
            $table->unsignedBigInteger('question_id');
            
            // Foreign key relationships
            $table->foreign('quizs_id')->references('quizs_id')->on('quizs')->onDelete('cascade');
            $table->foreign('question_id')->references('questions_id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_quiz');
    }
};
