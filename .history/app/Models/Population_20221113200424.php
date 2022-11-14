<?php

namespace App\Models;

use Database\Factories\PopulationFactory;
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


    protected static function newFactory()
    {
        return PopulationFactory::new();
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
