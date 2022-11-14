<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Population;
use Illuminate\Http\Request;

class PopulationController extends Controller
{
    public function index()
    {
        $countries = Country::with('cities')->get();
        dd($countries[0]->cities[0]);
        return view('welcome', compact('countries'));
    }
}
