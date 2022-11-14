<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Population;
use Illuminate\Http\Request;

class PopulationController extends Controller
{
    public function index()
    {
        $countries = Country::with(['population', function($q){
            return $q->sort
        }])->get();
        return view('welcome', compact('countries'));
    }
}
