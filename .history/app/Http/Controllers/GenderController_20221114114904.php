<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Population;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function getGenderPopulation(Request $request)
    {
        $gender_population = Population::selectRaw('sum(population)')
        ->whereColumn('gender_id', 'genders.id')
        ->getQuery();
        $genders = Gender::join('populations', 'populations.gender_id', '=', 'genders.id')
        ->join('cities', 'cities.id', '=', 'populations.city_id')
        ->select('*')
        // ->where('city_id', $request->city_id)
        ->selectSub($gender_population, 'population')
        ->orderBy('population', 'desc')
        ->get();

        return $genders;
    }
}