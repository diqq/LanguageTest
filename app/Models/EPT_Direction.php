<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EPT_Direction extends Model
{
    use HasFactory;

    protected $guarded=[
        'id'
    ];

    protected  $table='ept_directions';

    public function exam(){
        return $this->belongsTo(Exam::class);
    }
}
