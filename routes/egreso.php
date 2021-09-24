<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\EgresoController;
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
Route::get('/egreso', [EgresoController::class, 'index'])
->name('egreso')
->middleware(['auth', 'estudiantePermission']);

Route::get('/egresorevisar', [EgresoController::class, 'revisarCoordinador'])
->name('egresorevisar')
->middleware(['auth', 'cordinadorPermission']);

Route::post('/egreso', [EgresoController::class, 'store'])
->middleware(['auth', 'estudiantePermission'])
->name('guardar-egreso');



