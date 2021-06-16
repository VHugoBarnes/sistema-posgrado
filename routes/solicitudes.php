<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CambioTemaController;
use App\Http\Controllers\CambioTitulo;
use App\Http\Controllers\CambioTituloController;
use App\Http\Controllers\SolicitudesController;
use App\Http\Controllers\SolicitudesDirectorController;
use App\Models\Solicitud_Cambio;

/******************************** GENERAL ********************************/
Route::get('/cambio-tesis', [SolicitudesController::class, 'index'])
    ->middleware(['auth', 'estudiantePermission'])
    ->name('solicitudes-index');

Route::get('/obtener-solicitud/solicitud', [SolicitudesController::class, 'sendSolicitud'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'redirectIfChangeRequestNotMade'])
    ->name('obtener-solicitud');

Route::get('/obtener-solicitud/protocolo', [SolicitudesController::class, 'sendProtocolo'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'redirectIfChangeRequestNotMade', 'requestSubjectIsTema'])
    ->name('obtener-solicitud');

Route::get('/solicitud-estatus', [SolicitudesController::class, 'viewStatus'])
    ->middleware(['auth', 'docenteEstudiantePermission']);

Route::delete('/solicitud', [SolicitudesController::class, 'deleteModification'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'redirectIfChangeRequestNotMade', 'redirectIfChangeRequestNotPending']);

Route::get('/solicitudes', [SolicitudesController::class, 'viewRequests'])
    ->middleware(['auth', 'cordinadorPermission'])
    ->name('solicitudes');

Route::get('/solicitud/{numero}', [SolicitudesController::class, 'getSolicitudByNumber'])
    ->middleware(['auth', 'cordinadorPermission'])
    ->where(['numero' => '[0-9]+'])
    ->name('solicitud-numero');

Route::post('/solicitud/{id}/{estatus}', [SolicitudesController::class, 'changeStatus'])
    ->middleware(['auth', 'cordinadorPermission'])
    ->where(['id'=>'[0-9]+', 'estatus'=>'[a-z]+'])
    ->name('cambiar-estatus');

/******************************** DIRECTOR ********************************/
Route::get('/cambio-tesis/director', [SolicitudesDirectorController::class, 'viewRequests'])
    ->middleware(['auth', 'directorPermission'])
    ->name('solicitudes-director');

Route::post('/cambio-tesis/director/{id}/{estatus}', [SolicitudesDirectorController::class, 'changeStatus'])
    ->middleware(['auth', 'directorPermission'])
    ->where(['id'=>'[0-9]+', 'estatus'=>'[a-z]+'])
    ->name('cambiar-status-director');

/******************************** CAMBIO DE TEMA ********************************/
Route::get('/cambio-tesis/tema', [CambioTemaController::class, 'create'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'hasDirector', 'redirectIfChangeRequestPending'])
    ->name('cambio-tema');

Route::post('/cambio-tesis/tema', [CambioTemaController::class, 'store'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'hasDirector', 'redirectIfChangeRequestPending']);

Route::get('/enviar-modificacion/tema', [CambioTemaController::class, 'uploadModification'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'hasDirector', 'redirectIfChangeRequestNotMade', 'requestSubjectIsTema'])
    ->name('enviar-modificacion-tema');

Route::post('/enviar-modificacion/tema', [CambioTemaController::class, 'sendModification'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'hasDirector', 'redirectIfChangeRequestNotMade', 'requestSubjectIsTema']);

/******************************** CAMBIO DE TITULO ********************************/
Route::get('/cambio-tesis/titulo', [CambioTituloController::class, 'create'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'hasDirector', 'redirectIfChangeRequestPending'])
    ->name('cambio-titulo');

Route::post('/cambio-tesis/titulo', [CambioTituloController::class, 'store'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'hasDirector', 'redirectIfChangeRequestPending'])
    ->name('cambio-titulo');

Route::get('/enviar-modificacion/titulo', [CambioTituloController::class, 'uploadModification'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'hasDirector', 'redirectIfChangeRequestNotMade', 'requestSubjectIsTitulo'])
    ->name('enviar-modificacion-titulo');

Route::post('/enviar-modificacion/titulo', [CambioTituloController::class, 'sendModification'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'hasDirector', 'redirectIfChangeRequestNotMade', 'requestSubjectIsTitulo']);
