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
        Schema::create('ept_converteds', function (Blueprint $table) {
            $table->id();
            $table->string('correct_amount');
            $table->string('first_section');
            $table->string('second_section');
            $table->string('third_section');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ept_converteds');
    }
};
