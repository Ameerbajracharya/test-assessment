<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Population;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function getCities(Request $request)
    {
        $city_population = Population::selectRaw('sum(population)')
        ->whereColumn('city_id', 'cities.id')
        ->getQuery();
        $genders = Gender::select('genders.*')
        ->where('country_id', $request->country_id)
        ->selectSub($city_population, 'population')
        ->orderBy('population', 'desc')
        ->get();

        return $cities;
    }
}
