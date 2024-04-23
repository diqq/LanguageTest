<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class toeic_answer extends Model
{
    use HasFactory;

    protected $guarded=[
        'id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function toeic_question(){
        return $this->belongsTo(TOEIC_Question::class,  'question_id', 'id');
    }
}
