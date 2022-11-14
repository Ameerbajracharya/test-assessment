<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function getGroupPopulation(Request $request)
    {
        $gro = Group::join('populations', 'populations.gender_id', '=', 'gro.id')
        ->join('cities', 'cities.id', '=', 'populations.city_id')
        ->where('city_id', $request->city_id)
        ->selectRaw('gro.*, SUM(IF(gender_title = "Male", 1, 0)) as males, SUM(IF(gender_title = "Female", 1, 0)) as females, SUM(population) as population')
        ->groupBy('gro.id')
        ->get();

        return $gro;
    }
}
