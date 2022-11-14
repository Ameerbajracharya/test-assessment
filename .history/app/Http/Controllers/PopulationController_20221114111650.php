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
        ->orderBy('population', 'desc');
        $groups = Group::with('population')->get();
        $countries_list = $countries->orderBy('country_name', 'asc')->get();
        $countries = $countries->take(3)->get();
        $population = $population->get();
        dd();
        return view('welcome', compact('countries', 'groups', 'countries_list'));
    }
}
