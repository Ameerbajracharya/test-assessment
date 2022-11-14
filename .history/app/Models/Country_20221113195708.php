<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_name',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function population()
    {
        return $this->cities->population->sum('population');
    }
}
