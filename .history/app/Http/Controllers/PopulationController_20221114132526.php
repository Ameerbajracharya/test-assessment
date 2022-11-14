<?php

namespace App\Http\Controllers;

use App\Http\Requests\PopulationStoreValidation;
use App\Models\City;
use App\Models\Country;
use App\Models\Gender;
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

    public function list()
    {
        $population = Population::with(['country', 'city', 'gender', 'group'])->orderBy('created_at', 'asc')->paginate(10);

        return view('population_auth.list', compact('population'));
    }

    public function create()
    {
        $countries = Country::orderBy('country_name', 'asc')->pluck('country_name', 'id');
        $cities = City::orderBy('city_name', 'asc')->pluck('city_name', 'id');
        $genders = Gender::orderBy('gender_title', 'asc')->pluck('gender_title', 'id');
        $groups = Group::orderBy('group_title', 'asc')->pluck('group_title', 'id');

        return view('population_auth.form', compact('countries', 'cities', 'genders', 'groups'));
    }


    public function store(PopulationStoreValidation $request)
    {
        Population::create($request->validated());
        return redirect()->route('population.list');
    }

    public function edit($id)
    {
        $population = Population::findOrFail($id);
        $countries = Country::orderBy('country_name', 'asc')->pluck('country_name', 'id');
        $cities = City::orderBy('city_name', 'asc')->pluck('city_name', 'id');
        $genders = Gender::orderBy('gender_title', 'asc')->pluck('gender_title', 'id');
        $groups = Group::orderBy('group_title', 'asc')->pluck('group_title', 'id');

        return view('population_auth.form', compact('countries', 'cities', 'genders', 'groups', 'population'));
    }

    public function update($id, PopulationStoreValidation $request)
    {
        $population = Population::findOrFail($id);
        $population->update($request->validated());
        return redirect()->route('population.list');
    }

    public function destroy($id)
    {
        $population = Population::findOrFail($id);

        return view('population_auth.form', compact('countries', 'cities', 'genders', 'groups', 'population'));
    }
}
