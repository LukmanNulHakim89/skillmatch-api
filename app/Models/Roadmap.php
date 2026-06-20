<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roadmap extends Model
{
    use HasFactory;

    protected $fillable = ['career_id', 'month', 'title', 'description'];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}
