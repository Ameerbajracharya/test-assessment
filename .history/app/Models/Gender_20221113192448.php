<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_name',
        'country_id'
    ];

    public function population()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
