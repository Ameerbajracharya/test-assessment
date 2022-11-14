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
    Route::get('/home',                     [PopulationController::class, 'list'])->name('population.list');
    Route::get('/create-population',        [PopulationController::class, 'create'])->name('population.create');
    Route::post('/store-population',        [PopulationController::class, 'store'])->name('population.store');
    Route::get('/edit-population/{id}',     [PopulationController::class, 'edit'])->name('population.edit');
    Route::put('/update-population/{id}', [PopulationController::class, 'update'])->name('population.update');
    Route::get('/destroy-population/{id}', [PopulationController::class, 'destroy'])->name('population.destroy');
});

Route::get('/getCities', [CountryController::class, 'getCities'])->name('getCities');
Route::get('/getGenderPopulation', [GenderController::class, 'getGenderPopulation'])->name('getGenderPopulation');
Route::get('/getGroupPopulation', [GroupController::class, 'getGroupPopulation'])->name('getGroupPopulation');
