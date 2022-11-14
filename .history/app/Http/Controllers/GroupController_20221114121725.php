<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function getGroupPopulation(Request $request)
    {
        $group = Group::join('populations', 'populations.gender_id', '=', 'group.id')
        ->join('cities', 'cities.id', '=', 'populations.city_id')
        ->where('city_id', $request->city_id)
        ->selectRaw('group.*, SUM(IF(gender_title = "Male", 1, 0)) as males, SUM(IF(gender_title = "Female", 1, 0)) as females, SUM(population) as population')
        ->groupBy('group.id')
        ->get();

        return $group;
    }
}
