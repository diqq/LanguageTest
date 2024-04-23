<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TOEIC_Direction extends Model
{
    use HasFactory;

    protected $guarded=[
        'id'
    ];

    protected  $table='toeic_directions';

    public function exam(){
        return $this->belongsTo(Exam::class);
    }
}
