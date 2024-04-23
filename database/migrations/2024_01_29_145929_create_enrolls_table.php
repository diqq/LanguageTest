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
        Schema::create('enrolls', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('exam_code');
            $table->enum('for', [
                'ept', 'toeic'
            ]);
            $table->enum('date', [
                '0', '1', '2'
            ]);
            $table->enum('time', [
                '0', '1', '2'
            ]);
            $table->enum('status', [
                'enrolled',
                'working',
                'finish',
                'kick',
                'out',
                'closed',
                'good'
            ]);
            $table->enum('expired', [
                'yes', 'no'
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrolls');
    }
};
