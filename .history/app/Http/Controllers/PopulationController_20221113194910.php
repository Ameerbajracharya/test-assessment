<?php

namespace App\Http\Controllers;

use App\Models\Population;
use Illuminate\Http\Request;

class PopulationController extends Controller
{
    public function index()
    {
        $populations = Population::with('city')->all();
        return view('home', compact('populations'));
    }
}
