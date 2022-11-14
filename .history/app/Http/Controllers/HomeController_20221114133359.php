<?php

namespace App\Http\Controllers;

use App\Models\Population;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $country_population = Population::selectRaw('sum(population)')
        ->whereColumn('country_id', 'countries.id')
        ->getQuery();
        $countries = Country::select('countries.*')
        ->selectSub($country_population, 'population')
        ->orderBy('population', 'desc');

        $cities = City::withSum('population', 'population')->get();

        $gender_population = Population::selectRaw('sum(population)')
        ->whereColumn('gender_id', 'genders.id')
        ->getQuery();
        $genders = Gender::select('genders.*')
        ->selectSub($gender_population, 'population')
        ->orderBy('population', 'desc')
        ->get();

        $groups = Group::with('population')->get();
        $countries_list = $countries->orderBy('country_name', 'asc')->get();
        $countries = $countries->take(3)->get();
        $total_population = Population::get()->sum('population');

        return view('welcome', compact('countries', 'groups', 'countries_list', 'total_population', 'cities', 'genders'));
    }
}
