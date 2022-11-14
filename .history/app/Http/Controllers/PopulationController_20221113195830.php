<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Population;
use Illuminate\Http\Request;

class PopulationController extends Controller
{
    public function index()
    {
        $country = Country::with('cities')->get();
        dd($country[0]->cities->pop);
        return view('home', compact('country'));
    }
}
