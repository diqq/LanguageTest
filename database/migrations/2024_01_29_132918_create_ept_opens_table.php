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
        Schema::create('ept_opens', function (Blueprint $table) {
            $table->id();
            $table->string('exam_code');
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->enum('date', [
                '0', '1', '2'
            ]);
            $table->enum('time', [
                '0', '1', '2'
            ]);
            $table->enum('status', [
                'run', 'end'
            ])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ept_opens');
    }
};
