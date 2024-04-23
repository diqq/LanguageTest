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
        Schema::create('ept_questions', function (Blueprint $table) {
            $table->id();
            $table->string('exam_code');
            $table->string('story_code')->nullable();
            $table->text('question');
            $table->text('answer_a');
            $table->text('answer_b');
            $table->text('answer_c');
            $table->text('answer_d');
            $table->enum('correct_answer', [
                'a',
                'b',
                'c',
                'd',
            ]);
            $table->enum('section', [
                'part a',
                'part b',
                'part c',
                'structure',
                'written',
                'reading',
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ept_questions');
    }
};
