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
        Schema::create('ept_scores', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('order_id');
            $table->string('score_code');
            $table->string('correct_first_section');
            $table->string('correct_second_section');
            $table->string('correct_third_section');
            $table->string('score_first_section');
            $table->string('score_second_section');
            $table->string('score_third_section');
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
        Schema::dropIfExists('ept_scores');
    }
};
