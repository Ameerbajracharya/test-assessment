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
        $country_population = Population::selectRaw('sum(population)')
        ->whereColumn('country_id', 'countries.id')
        ->getQuery();
        $city_population = Population::selectRaw('sum(population)')
        ->whereColumn('city_id', 'cities.id')
        ->getQuery();
        $countries = Country::select('countries.*')
        ->selectSub($country_population, 'population')
        ->orderBy('population', 'desc');
        $countries = Country::select('countries.*')
        ->selectSub($country_population, 'population')
        ->orderBy('population', 'desc');
        $groups = Group::with('population')->get();
        $countries_list = $countries->orderBy('country_name', 'asc')->get();
        $countries = $countries->take(3)->get();
        $total_population = Population::get()->sum('population');
        return view('welcome', compact('countries', 'groups', 'countries_list', 'total_population'));
    }
}
