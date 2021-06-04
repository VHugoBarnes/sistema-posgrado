<?php

use App\Http\Controllers\BuscadorController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\InfraestructuraController;
use App\Http\Controllers\LineaInvestigacionController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UsuarioController;
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
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/tesis.php';
require __DIR__.'/solicitudes.php';
require __DIR__.'/dominio.php';

/**
 *  Rutas Usuarios
 * - Cambiar datos
 */
Route::get('/editar-usuario', [UsuarioController::class, 'edit'])
    ->middleware(['auth','highPermission'])
    ->name('editar-usuario');

Route::put('/editar-usuario', [UsuarioController::class, 'update'])
    ->middleware(['auth', 'highPermission']);

/**
 *  Rutas Estudiantes
 * - Cambiar datos
 * - Busqueda por filtros de estudiantes
 */

 /** Registrar usuarios **/
Route::get('/registro-estudiante', [EstudianteController::class, 'create'])
->middleware(['auth', 'highPermission'])
->name('registrar-estudiante');

Route::post('/registro-estudiante', [EstudianteController::class, 'store'])
->middleware(['auth', 'highPermission']);

Route::get('/editar-estudiante', [EstudianteController::class, 'edit'])
    ->middleware(['auth', 'estudiantePermission'])
    ->name('editar-estudiante');

Route::put('/editar-estudiante', [EstudianteController::class, 'update'])
    ->middleware(['auth', 'estudiantePermission']);

Route::get('/buscar', [BuscadorController::class, 'searchByFilter'])
    ->name('buscar-estudiante');

/**
 * Rutas docentes
 * - Cambiar datos
 */
Route::get('/editar-docente', [DocenteController::class, 'edit'])
    ->middleware(['auth','docentePermission'])
    ->name('editar-docente');

Route::put('/editar-docente', [DocenteController::class, 'update'])
    ->middleware(['auth','docentePermission']);

