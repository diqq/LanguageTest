<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TOEIC_Open extends Model
{
    use HasFactory;

    protected $guarded=[
        'id'
    ];

    protected  $table='toeic_opens';

    public function exam(){
        return $this->belongsTo(Exam::class, 'exam_code', 'code');
    }
}
