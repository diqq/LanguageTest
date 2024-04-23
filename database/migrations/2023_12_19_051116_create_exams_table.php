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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->enum('category', ['ept', 'toeic']);
            $table->string('title');
            $table->string('first_date')->nullable();
            $table->string('second_date')->nullable();
            $table->string('third_date')->nullable();
            $table->string('first_time')->nullable();
            $table->string('second_time')->nullable();
            $table->string('third_time')->nullable();
            $table->text('conference_link')->nullable();
            $table->enum('activated', ['yes', 'no'])->default('no');
            $table->enum('status', ['publish', 'progress'])->default('progress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {  
        Schema::dropIfExists('exams');
    }
};
