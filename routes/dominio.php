<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfraestructuraController;
use App\Http\Controllers\LineaInvestigacionController;
use App\Http\Controllers\ProgramaController;

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
    ->where(['id' => '[0-9]+'])
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
    ->where(['id' => '[0-9]+'])
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
    ->where(['id' => '[0-9]+'])
    ->name('editar-infraestructura');

Route::put('/actualizar-infraestructura', [InfraestructuraController::class, 'update'])
    ->middleware(['auth', 'highPermission'])
    ->name('actualizar-infraestructura');

Route::delete('/eliminar-infraestructura/{id}', [InfraestructuraController::class, 'delete'])
    ->middleware(['auth', 'highPermission'])
    ->where(['id' => '[0-9]+'])
    ->name('eliminar-infraestructura');
