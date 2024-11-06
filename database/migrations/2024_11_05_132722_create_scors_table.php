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
        Schema::create('scores', function (Blueprint $table) {
            $table->id('scores_id');
            $table->unsignedBigInteger('quizs_id');
            $table->unsignedBigInteger('users_id');
            $table->float('score');
            
            // Foreign key relationships
            $table->foreign('quizs_id')->references('quizs_id')->on('quizs')->onDelete('cascade');
            $table->foreign('users_id')->references('users_id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scors');
    }
};
