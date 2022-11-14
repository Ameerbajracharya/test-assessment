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
        ->join('genders', 'genders.id', '=', 'populations.gender_id')
        ->where('gender_id', $request->gender_id)
        ->selectRaw('groups.*, SUM(IF(group_title = "Old", 1, 0)) as olds, SUM(IF(group_title = "Young", 1, 0)) as Youngs, SUM(IF(group_title = "Child", 1, 0)) as Childs, SUM(population) as total_population')
        ->groupBy('groups.id')
        ->get();

        return view('table', compact('groups'));
    }
}
