<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function getGroupPopulation(Request $request)
    {
        $groups = Group::with('population')->join('populations', 'populations.group_id', '=', 'groups.id')
        ->join('genders', 'genders.id', '=', 'populations.gender_id')
        ->where('gender_id', $request->gender_id)
        ->select('groups.*')
        ->groupBy('groups.id')
        ->get();
        return view('table', compact('groups'));
    }
}
