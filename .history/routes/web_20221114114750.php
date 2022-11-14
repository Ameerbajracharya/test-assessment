<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\PopulationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PopulationController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [PopulationController::class, 'index'])->name('home');

Route::get('/getCities', [CountryController::class, 'getCities'])->name('getCities');
Route::get('/getGenderPopulation', [GenderController::class, 'getGenderPopulation'])->name('getGendersPopulation');
