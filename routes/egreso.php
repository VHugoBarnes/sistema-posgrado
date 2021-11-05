<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\EgresoController;
use App\Http\Controllers\SolicitudesController;
use App\Http\Controllers\TesisController;
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

Route::get('/egreso/revisar', [EgresoController::class, 'revisarCoordinador'])
->name('egresorevisar')
->middleware(['auth', 'cordinadorPermission']);
//Ruta de donde se muestran los botones de mostrar el PDF
Route::get('/egreso/revisar/documentacion/{usuario_id}', [EgresoController::class, 'revisardoc'])//{usuario_id}
->name('egresorevisardoc')
->middleware(['auth', 'cordinadorPermission']);

Route::post('/egreso', [EgresoController::class, 'store'])
->middleware(['auth', 'estudiantePermission'])
->name('guardar-egreso');

Route::get('/archivo', [EgresoController::class, 'archivo'])
->name('archivo');

Route::post('/SubirRevision', [EgresoController::class, 'Subir'])
->name('SubirRevision');



