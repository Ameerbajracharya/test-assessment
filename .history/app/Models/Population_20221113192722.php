<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    use HasFactory;

    protected $fillable = [
        'population',
        'population',
    ];

    public function population()
    {
        return $this->hasMany(Population::class);
    }
}