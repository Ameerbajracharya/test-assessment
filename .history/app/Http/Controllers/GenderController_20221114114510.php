<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Population;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function getCities(Request $request)
    {
        $gender_population = Population::selectRaw('sum(population)')
        ->whereColumn('gender_id', 'genders.id')
        ->getQuery();
        $genders = Gender::select('genders.*')
        ->join()
        ->where('country_id', $request->country_id)
        ->selectSub($gender_population, 'population')
        ->orderBy('population', 'desc')
        ->get();

        return $genders;
    }
}
