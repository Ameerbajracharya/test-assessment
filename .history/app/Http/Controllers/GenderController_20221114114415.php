<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Population;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function getCities(Request $request)
    {
        $gender = Population::selectRaw('sum(population)')
        ->whereColumn('city_id', 'cities.id')
        ->getQuery();
        $genders = Gender::select('genders.*')
        ->where('country_id', $request->country_id)
        ->selectSub($gender, 'population')
        ->orderBy('population', 'desc')
        ->get();

        return $cities;
    }
}
