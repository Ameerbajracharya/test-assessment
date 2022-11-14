<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function getCities(Request $request)
    {
        return State::where('country_id', $request->country_id)->select('state_name', 'id')->get();
    }
}
