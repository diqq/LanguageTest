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
        Schema::create('toeic_directions', function (Blueprint $table) {
            $table->id();
            $table->string('exam_code');
            $table->text('audio');
            $table->text('direction');
            $table->enum('section', [
                'i',
                'ii',
                'iii',
                'iv',
                'v',
                'vi',
                'vii',
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toeic_directions');
    }
};
