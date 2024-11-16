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
        Schema::create('answers', function (Blueprint $table) {
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('quizs_id');
            $table->unsignedBigInteger('question_id');
            $table->text('answers')->nullable();
            $table->integer('score')->nullable();
            $table->enum('status', ['finish', 'on going']);
            
            // Foreign key relationships
            $table->foreign('users_id')->references('users_id')->on('users')->onDelete('cascade');
            $table->foreign('quizs_id')->references('quizs_id')->on('quizs')->onDelete('cascade');
            $table->foreign('question_id')->references('questions_id')->on('questions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
