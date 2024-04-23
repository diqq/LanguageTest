<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TOEIC_Story extends Model
{
    use HasFactory;

    protected $guarded=[
        'id'
    ];

    protected  $table='toeic_stories';

    public function question(){
        return $this->hasMany(TOEIC_Question::class, 'story_code', 'code');
    }

    public function exam(){
        return $this->belongsTo(Exam::class, 'exam_code', 'code');
    }
}
