<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function getCities(Request $request)
    {
        $city_population = Population::selectRaw('sum(population)')
        ->whereColumn('city_id', 'cities.id')
        ->getQuery();
        $cities = City::select('cities.*')
        ->where('country_id', $request->country_id)
        ->selectSub($city_population, 'population')
        ->orderBy('population', 'desc')
        ->get();

        return $cities;
    }
}
