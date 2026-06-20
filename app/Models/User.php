<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Skill;
use App\Models\Interest;
use App\Models\UserProgress;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'user_skills')
                    ->withPivot('level')
                    ->withTimestamps();
    }

    public function interests()
    {
        return $this->belongsToMany(Interest::class, 'user_interests')
                    ->withTimestamps();
    }

    public function progress()
    {
        return $this->hasMany(UserProgress::class);
    }
}