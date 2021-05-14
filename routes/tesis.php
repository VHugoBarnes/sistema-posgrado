<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TesisController;

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
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisUploaded'])
    ->name('alta-tesis');

Route::post('/alta-tesis', [TesisController::class, 'storeTesisSubject'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisUploaded'])
    ->name('guardar-tesis');

Route::get('/tesis-archivo', [TesisController::class, 'uploadTesisFile'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded'])
    ->name('archivo-tesis');

Route::post('/tesis-archivo', [TesisController::class, 'saveTesisFile'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded']);

////////////////////////////////////////////////////////////////////////////////////

Route::get('/modificar-tesis', [TesisController::class, 'editTesis'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded'])
    ->name('modificar-tesis');

Route::post('/modificar-tesis', [TesisController::class, 'updateTesis'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded']);

Route::post('/enviar-modificacion-tesis', [TesisController::class, 'sendModification'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded']);
