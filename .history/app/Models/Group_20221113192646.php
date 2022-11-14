<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'GROUP_title',
    ];

    public function population()
    {
        return $this->hasMany(Population::class);
    }
}
