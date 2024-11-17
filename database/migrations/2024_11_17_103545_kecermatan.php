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
        Schema::create('kecermatan', function (Blueprint $table) {
            $table->id('kecermatan_id');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('quizs_id');
            $table->integer('sesi');
            $table->integer('score')->nullable();
           
            
            // Foreign key relationships
            $table->foreign('users_id')->references('users_id')->on('users')->onDelete('cascade');
            $table->foreign('quizs_id')->references('quizs_id')->on('quizs')->onDelete('cascade');
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
