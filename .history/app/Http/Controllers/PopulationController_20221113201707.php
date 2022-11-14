<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Population;
use Illuminate\Http\Request;

class PopulationController extends Controller
{
    public function index()
    {
        $population = Population::selectRaw('sum(population)')
        ->whereColumn('country_id', 'countries.id')
        ->getQuery();
        dd($population);
        $countries = Country::select('countries.*')
        ->selectSub($population, 'population')
        ->orderBy('population', 'asc')
        ->get();
        dd($countries);
        $countries = Country::with('population')->get();
        return view('welcome', compact('countries'));
    }
}
