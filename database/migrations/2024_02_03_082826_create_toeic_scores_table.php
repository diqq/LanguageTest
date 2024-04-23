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
        Schema::create('toeic_scores', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('order_id');
            $table->string('score_code');
            $table->string('correct_part_i');
            $table->string('correct_part_ii');
            $table->string('correct_part_iii');
            $table->string('correct_part_iv');
            $table->string('correct_part_v');
            $table->string('correct_part_vi');
            $table->string('correct_part_vii');
            $table->string('score_listening');
            $table->string('score_reading');
            $table->string('score_total');
            $table->enum('behaviour', [
                'good',
                'times',
                'kick',
                'out',
                'closed'
            ])->nullable();
            $table->enum('status', [
                'keep',
                'deleted',
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toeic_scores');
    }
};
