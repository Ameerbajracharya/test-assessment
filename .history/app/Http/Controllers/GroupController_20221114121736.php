<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function getGroupPopulation(Request $request)
    {
        $groups = Group::join('populations', 'populations.group_id', '=', 'groups.id')
        ->join('cities', 'cities.id', '=', 'populations.city_id')
        ->where('city_id', $request->city_id)
        ->selectRaw('groups.*, SUM(IF(gender_title = "Male", 1, 0)) as males, SUM(IF(gender_title = "Female", 1, 0)) as females, SUM(population) as population')
        ->groupBy('groups.id')
        ->get();

        return $groups;
    }
}
