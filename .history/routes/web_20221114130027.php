<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\GroupController;
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
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/home', [PopulationController::class, 'list'])->name('list.population');
    Route::get('/create-population', [PopulationController::class, 'create'])->name('create.population');
    Route::get('/create-population', [PopulationController::class, 'create'])->name('create.population');
});

Route::get('/getCities', [CountryController::class, 'getCities'])->name('getCities');
Route::get('/getGenderPopulation', [GenderController::class, 'getGenderPopulation'])->name('getGenderPopulation');
Route::get('/getGroupPopulation', [GroupController::class, 'getGroupPopulation'])->name('getGroupPopulation');
