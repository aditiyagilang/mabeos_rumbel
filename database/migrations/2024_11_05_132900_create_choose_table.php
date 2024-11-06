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
        Schema::create('choose', function (Blueprint $table) {
            $table->id('choose_id');
            $table->text('answers');
            $table->unsignedBigInteger('questions_id');
            
            // Foreign key relationship
            $table->foreign('questions_id')->references('questions_id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choose');
    }
};
