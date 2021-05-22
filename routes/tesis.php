<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SolicitudesController;
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

Route::get('/modificar-tesis', [SolicitudesController::class, 'create'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'redirectIfChangeRequestPending'])
    ->name('modificar-tesis');

Route::post('/modificar-tesis', [SolicitudesController::class, 'store'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'redirectIfChangeRequestPending']);

Route::get('/enviar-modificacion-tesis', [SolicitudesController::class, 'uploadModification'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'redirectIfChangeRequestNotMade'])
    ->name('modificacion-tesis');

Route::post('/enviar-modificacion-tesis', [SolicitudesController::class, 'sendModification'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'redirectIfChangeRequestNotMade']);

Route::get('/obtener-solicitud', [SolicitudesController::class, 'sendPDF'])
->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'redirectIfChangeRequestNotMade'])
->name('obtener-solicitud');

///////////////////////////////////////////////////////////////////////////////////////

Route::get('/solicitudes', [SolicitudesController::class, 'viewRequests'])
    ->middleware(['auth', 'cordinadorPermission']);

Route::get('/solicitud/{numero}', [SolicitudesController::class, 'getSolicitudByNumber'])
    ->middleware(['auth', 'cordinadorPermission'])
    ->where(['numero' => '[0-9]+'])
    ->name('solicitud-numero');