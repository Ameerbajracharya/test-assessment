<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function getGroupPopulation(Request $request)
    {
        $groups = Group::join('populations', 'populations.group_id', '=', 'groups.id')
        ->join('genders', 'genders.id', '=', 'populations.gender_id')
        ->where('gender_id', $request->gender_id)
        ->selectRaw('groups.*, SUM(IF(group_title = "Ol", 1, 0)) as males, SUM(IF(group_title = "Female", 1, 0)) as females, SUM(population) as population')
        ->groupBy('groups.id')
        ->get();

        return $groups;
    }
}