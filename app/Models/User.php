<?php

namespace App\Models;

use App\Models\ToeicStoryAudio;
use Laravel\Sanctum\HasApiTokens;
use App\Models\ToeicQuestionAudio;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function enroll(){
        return $this->hasMany(Enroll::class);
    }

    public function ept_answer(){
        return $this->hasMany(ept_answer::class);
    }

    public function toeic_answer(){
        return $this->hasMany(toeic_answer::class);
    }

    public function EptQuestionAudio(){
        return $this->hasMany(EptQuestionAudio::class);
    }

    public function EptStoryAudio(){
        return $this->hasMany(EptStoryAudio::class);
    }

    public function ToeicQuestionAudio(){
        return $this->hasMany(ToeicQuestionAudio::class);
    }

    public function ToeicStoryAudio(){
        return $this->hasMany(ToeicStoryAudio::class);
    }

    public function ept_score(){
        return $this->hasMany(ept_score::class);
    }

    public function toeic_score(){
        return $this->hasMany(toeic_score::class);
    }

    public function payment(){
        return $this->hasMany(payment::class);
    }
}
