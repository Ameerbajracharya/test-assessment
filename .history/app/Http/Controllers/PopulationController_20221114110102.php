<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Group;
use App\Models\Population;
use Illuminate\Http\Request;

class PopulationController extends Controller
{
    public function index()
    {
        $population = Population::selectRaw('sum(population)')
        ->whereColumn('country_id', 'countries.id')
        ->getQuery();
        $countries = Country::select('countries.*')
        ->selectSub($population, 'population')
        ->orderBy('population', 'desc')
        ->take(3)
        ->get();
        $groups = Group::with('population')->get();
        $countries = Country::with('population')->orderBy()->get();
        return view('welcome', compact('countries', 'groups'));
    }
}
