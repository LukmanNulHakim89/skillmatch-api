<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'industry'];
    
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'career_skills')
        ->withPivot('importance')
        ->withTimestamps();
    }
    
    public function roadmaps()
    {
        return $this->hasMany(Roadmap::class);
    }
}