<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    use HasFactory;

    protected $fillable = [
        'population',
        'country_id',
        'city_id',
        'gender_id',
        'group_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
