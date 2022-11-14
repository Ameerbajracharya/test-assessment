<?php

namespace App\Models;

use Database\Factories\CityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_name',
        'country_id'
    ];

    protected static function newFactory()
    {
        return CityFactory::new();
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function ()
    {

    }
}
