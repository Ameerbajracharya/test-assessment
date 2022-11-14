<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Population;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function getCities(Request $request)
    {
        $city_population = Population::selectRaw('sum(population)')
        ->whereColumn('city_id', 'cities.id')
        ->getQuery();
        $cities = City::select('cities.*')
        ->selectSub($city_population, 'population')
        ->orderBy('population', 'desc')->get();

        return City::with('population')->where('country_id', $request->country_id)->select('city_name', 'id')->get();
    }
}
