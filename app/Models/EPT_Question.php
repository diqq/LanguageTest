<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EPT_Question extends Model
{
    use HasFactory;

    protected $guarded=[
        'id'
    ];

    protected  $table='ept_questions';

    public function story(){
        return $this->belongsTo(EPT_Story::class, 'story_code', 'code');
    }

    public function exam(){
        return $this->belongsTo(Exam::class, 'exam_code', 'code');
    }

    public function ept_answer(){
        return $this->hasMany(ept_answer::class);
    }
}
