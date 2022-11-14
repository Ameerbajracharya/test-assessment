<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Population;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function getGenderPopulation(Request $request)
    {
       $genders = Gender::withSum('population', 'population')
       ->join('populations', 'populations.gender_id', '=', 'genders.id');

        return $genders;
    }
}
