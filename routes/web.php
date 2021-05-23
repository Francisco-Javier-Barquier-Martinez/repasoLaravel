<?php

use App\Http\Controllers\AsignaturasController;
use App\Http\Controllers\ProfesoresController;
use App\Models\asignaturas;
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

Route::resource('profesores', ProfesoresController::class);
Route::resource('asignaturas', AsignaturasController::class);
