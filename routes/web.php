<?php

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

/**
 *  Rutas Usuarios
 * - Cambiar datos
 * - Registrarte como director, codirector, secretario o vocal en una tesis
 */

/**
 *  Rutas Estudiantes
 * - Cambiar datos
 * - Subir tesis (una sola vez)
 * - Actualizar datos tesis (solo subir archivo)
 * - Busqueda por filtros de estudiantes
 */

/**
 * Rutas docentes
 * - Cambiar datos
 */

/**
 * Rutas de programas
 * - Dar de alta programa
 * - Actualizar datos del programa
 * - Eliminar programa
 * - Obtener programas
 */

/**
 * Rutas de Líneas de investigación
 * - Dar de alta línea de investigación
 * - Actualizar datos de la línea
 * - Eliminar línea
 * - Obtener línea
 */

/**
 * Rutas de infraestructura y servicios
 * - Dar de alta infraestructura y servicios
 * - Actualizar datos de la infraestructura
 * - Eliminar infraestructura
 * - Obtener infraestructura
 */