<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function getCities(Request $request)
    {
        
        return City::with('population')->where('country_id', $request->country_id)->select('city_name', 'id')->get();
    }
}
