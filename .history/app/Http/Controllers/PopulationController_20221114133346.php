<?php

namespace App\Http\Controllers;

use App\Http\Requests\PopulationStoreValidation;
use App\Models\City;
use App\Models\Country;
use App\Models\Gender;
use App\Models\Group;
use App\Models\Population;

class PopulationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }


    public function list()
    {
        $population = Population::with(['country', 'city', 'gender', 'group'])->orderBy('created_at', 'desc')->paginate(10);

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
        $population->delete();
        return redirect()->route('population.list');
    }
}
