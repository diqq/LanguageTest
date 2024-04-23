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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('user_id');
            $table->enum('registrant',['widyatama student', 'not widyatama student']);
            $table->string('npm');
            $table->enum('faculty', [
                'Economics and Business',
                'Engineering', 
                'Cultural Studies', 
                'Communication and Visual Design',
                'Social Science and Political Science']);
            $table->enum('program_study', [
                'S1 Accounting', 
                'D3 Accounting', 
                'Master of Accounting', 
                'Accounting Profession', 
                'S1 Management', 
                'D3 Management', 
                'Master of Management', 
                'S1 Informatics', 
                'S1 Industry', 
                'S1 Information Systems', 
                'S1 Electrical', 
                'S1 Mechanical', 
                'D3 Mechanical', 
                'S1 Civil', 
                'S1 Japanese Language', 
                'D3 Japanese Language', 
                'S1 English Language', 
                'D4 Graphic Design', 
                'D3 Multimedia', 
                'International Trade', 
                'Library & Information Science', 
                'Film & Television Production']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
