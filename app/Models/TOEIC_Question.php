<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TOEIC_Question extends Model
{
    use HasFactory;

    protected $guarded=[
        'id'
    ];

    protected  $table='toeic_questions';

    public function story(){
        return $this->belongsTo(TOEIC_Story::class, 'story_code', 'code');
    }

    public function exam(){
        return $this->belongsTo(Exam::class, 'exam_code', 'code');
    }

    public function toeic_answer(){
        return $this->hasMany(toeic_answer::class);
    }
}
