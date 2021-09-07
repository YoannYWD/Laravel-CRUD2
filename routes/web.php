<?php

use App\Http\Controllers\PersonnageController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('marvel/ajouter', [PersonnageController::class, 'create']) //appel de la classe du controller, puis de sa méthode
          ->name('personnage.create'); 

Route::post('marvel/enregistrer', [PersonnageController::class, 'store'])
          ->name('personnage.store');

Route::get('marvel/index', [PersonnageController::class, 'index'])
          ->name('personnage.index');

Route::get('marvel/editer/{id}', [PersonnageController::class, 'edit'])
          ->name('personnage.edit');

Route::patch('marvel/update/{id}', [PersonnageController::class, 'update'])
          ->name('personnage.update');

Route::delete('marvel/destroy/{id}', [PersonnageController::class, 'destroy'])
          ->name('personnage.destroy');

