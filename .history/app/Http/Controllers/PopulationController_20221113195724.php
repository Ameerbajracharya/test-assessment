<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Population;
use Illuminate\Http\Request;

class PopulationController extends Controller
{
    public function index()
    {
        $country = Country::with('cities', population)->get();
        dd($country[0]->cities);
        return view('home', compact('country'));
    }
}
