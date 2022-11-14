<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Population;
use Illuminate\Http\Request;

class PopulationController extends Controller
{
    public function index()
    {
         Order::with( 'sort' )->
            join( 'sorts', 'sorts.id', '=', 'orders.sort_id' )->
            where( 'orders.payed', 0 )->
            sum( 'sorts.price' );
        $countries = Country::select('countries.*')
        ->selectSub($population, 'population')
        ->orderBy('population', 'asc')
        ->get();
        $countries = Country::with('population')->get();
        return view('welcome', compact('countries'));
    }
}
