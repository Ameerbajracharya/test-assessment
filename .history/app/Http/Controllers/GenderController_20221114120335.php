<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Population;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function getGenderPopulation(Request $request)
    {
       $genders = Gender::join('populations', 'populations.gender_id', '=', 'genders.id')
       ->join('cities', 'cities.id', '=', 'populations.city_id')
       ->selectRaw('sum(population) as total')
       ->groupBy('genders.id')
    //    ->where('city_id', $request->city_id)
       ->get();

        return $genders;
    }
}
