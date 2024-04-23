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
        Schema::create('ept_stories', function (Blueprint $table) {
            $table->id();
            $table->string('exam_code');
            $table->string('code');
            $table->text('story');
            $table->enum('section', [
                'part b',
                'part c',
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
        Schema::dropIfExists('ept_stories');
    }
};
