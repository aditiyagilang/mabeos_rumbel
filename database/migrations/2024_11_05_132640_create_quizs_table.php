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
        Schema::create('quizs', function (Blueprint $table) {
            $table->id('quizs_id');
            $table->unsignedBigInteger('types_id');
            $table->string('quizs_name', 225);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->enum('status', ['end', 'on going', 'start']);
            $table->char('token', 10)->unique();
            
            // Foreign key relationship
            $table->foreign('types_id')->references('types_id')->on('types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizs');
    }
};
