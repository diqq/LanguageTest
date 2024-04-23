<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $guarded=[
        'id'
    ];

    public function eptDirection(){
        return $this->hasMany(EPT_Direction::class, 'exam_code', 'code');
    }
    
    public function eptQuestion(){
        return $this->hasMany(EPT_Question::class, 'exam_code', 'code');
    }

    public function eptStory(){
        return $this->hasMany(EPT_Story::class, 'exam_code', 'code');
    }

    public function toeicDirection(){
        return $this->hasMany(TOEIC_Direction::class, 'exam_code', 'code');
    }

    public function toeicQuestion(){
        return $this->hasMany(TOEIC_Question::class, 'exam_code', 'code');
    }

    public function toeicStory(){
        return $this->hasMany(TOEIC_Story::class, 'exam_code', 'code');
    }

    public function eptOpens(){
        return $this->hasMany(EPT_Open::class, 'exam_code', 'code');
    }

    public function toeicOpens(){
        return $this->hasMany(TOEIC_Open::class, 'exam_code', 'code');
    }

    public function enroll(){
        return $this->hasMany(Enroll::class, 'exam_code', 'code');
    }
}
