<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProgress extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'roadmap_id', 'status'];

    public function roadmap()
    {
        return $this->belongsTo(Roadmap::class);
    }
}
