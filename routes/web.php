<?php

use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\InfraestructuraController;
use App\Http\Controllers\LineaInvestigacionController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\TesisController;
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

// Route::get('/test', [TestController::class, 'sendEmail']);

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

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
Route::get('/editar-estudiante', [EstudianteController::class, 'edit'])
    ->middleware(['auth', 'estudiantePermission'])
    ->name('editar-estudiante');

Route::put('/editar-estudiante', [EstudianteController::class, 'update'])
    ->middleware(['auth', 'estudiantePermission']);


/**
 * Rutas Tesis
 * - Ver tesis
 * - Ver detalle de tesis (Aquí habrá botones para registrarte como director, codirector, etc)
 * - Subir tesis (una sola vez)
 * - Actualizar datos tesis (solo subir archivo)
 * - Registrarte como director, codirector, secretario o vocal en una tesis
 */

Route::get('/tesis', [TesisController::class, 'getAll'])
    ->name('tesis');

Route::get('/tesis/{id}', [TesisController::class, 'getOne'])
    ->name('tesis-detalle')
    ->where(['id'=>'[0-9]+']);

Route::get('/tesis/{id}/{tipo}', [TesisController::class, 'registerAs'])
    ->middleware(['auth', 'registerInTesisPermission'])
    ->where(['id'=>'[0-9]+', 'tipo'=>'[a-z]+'])
    ->name('tesis-registro');

Route::get('/alta-tesis', [TesisController::class, 'createTesisSubject'])
    ->middleware(['auth', 'estudiantePermission', 'tesisUploaded'])
    ->name('alta-tesis');

Route::post('/alta-tesis', [TesisController::class, 'storeTesisSubject'])
    ->middleware(['auth', 'estudiantePermission', 'tesisUploaded'])
    ->name('guardar-tesis');

Route::get('/tesis-archivo', [TesisController::class, 'uploadTesisFile'])
    ->middleware(['auth', 'estudiantePermission', 'tesisUploaded']);

Route::post('/tesis-archivo', [TesisController::class, 'saveTesisFile'])
    ->middleware(['auth', 'estudiantePermission', 'tesisUploaded']);

/**
 * Rutas docentes
 * - Cambiar datos
 */
Route::get('/editar-docente', [DocenteController::class, 'edit'])
    ->middleware(['auth','docentePermission'])
    ->name('editar-docente');

Route::put('/editar-docente', [DocenteController::class, 'update'])
    ->middleware(['auth','docentePermission']);

/**
 * Rutas de programas
 * - Dar de alta programa
 * - Actualizar datos del programa
 * - Eliminar programa
 * - Obtener programas
 */
Route::get('/crear-programa', [ProgramaController::class, 'create'])
    ->middleware(['auth', 'highPermission'])
    ->name('crear-programa');

Route::post('/crear-programa', [ProgramaController::class, 'store'])
    ->middleware(['auth', 'highPermission']);

Route::get('/editar-programa/{id}', [ProgramaController::class, 'edit'])
    ->middleware(['auth', 'highPermission'])
    ->where(['id'=>'[0-9]+'])
    ->name('editar-programa');

Route::put('/actualizar-programa', [ProgramaController::class, 'update'])
    ->middleware(['auth', 'highPermission'])
    ->name('actualizar-programa');

/**
 * Rutas de Líneas de investigación
 * - Dar de alta línea de investigación
 * - Actualizar datos de la línea
 * - Eliminar línea
 * - Obtener línea
 */
Route::get('/crear-linea', [LineaInvestigacionController::class, 'create'])
    ->middleware(['auth', 'highPermission'])
    ->name('crear-linea');

Route::post('/crear-linea', [LineaInvestigacionController::class, 'store'])
    ->middleware(['auth', 'highPermission']);

Route::get('/editar-linea/{id}', [LineaInvestigacionController::class, 'edit'])
    ->middleware(['auth', 'highPermission'])
    ->where(['id'=>'[0-9]+'])
    ->name('editar-linea');

Route::put('/actualizar-linea', [LineaInvestigacionController::class, 'update'])
    ->middleware(['auth', 'highPermission'])
    ->name('actualizar-linea');

/**
 * Rutas de infraestructura y servicios
 * - Dar de alta infraestructura y servicios
 * - Actualizar datos de la infraestructura
 * - Eliminar infraestructura
 * - Obtener infraestructura
 */
Route::get('/crear-infraestructura', [InfraestructuraController::class, 'create'])
    ->middleware(['auth', 'highPermission'])
    ->name('crear-infraestructura');

Route::post('/crear-infraestructura', [InfraestructuraController::class, 'store'])
    ->middleware(['auth', 'highPermission']);

Route::get('/editar-infraestructura/{id}', [InfraestructuraController::class, 'edit'])
    ->middleware(['auth', 'highPermission'])
    ->where(['id'=>'[0-9]+'])
    ->name('editar-infraestructura');

Route::put('/actualizar-infraestructura', [InfraestructuraController::class, 'update'])
    ->middleware(['auth', 'highPermission'])
    ->name('actualizar-infraestructura');

Route::delete('/eliminar-infraestructura/{id}', [InfraestructuraController::class, 'delete'])
    ->middleware(['auth', 'highPermission'])
    ->where(['id'=>'[0-9]+'])
    ->name('eliminar-infraestructura');