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
        Schema::create('ept_directions', function (Blueprint $table) {
            $table->id();
            $table->string('exam_code');
            $table->string('audio')->nullable();
            $table->string('direction');
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
        Schema::dropIfExists('ept_directions');
    }
};
