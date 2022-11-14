<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Population;
use Illuminate\Http\Request;

class PopulationController extends Controller
{
    public function index()
    {
        $commentsRating = Comment::selectRaw('sum(rating)')
    ->whereColumn('user_id', 'users.id')
    ->getQuery();

$users = User::select('users.*')
    ->selectSub($commentsRating, 'comments_rating')
    ->orderBy('comments_rating', 'DESC')
    ->get();
        $countries = Country::with('population')->get();
        return view('welcome', compact('countries'));
    }
}
