<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CambioTemaController;
use App\Http\Controllers\CambioTitulo;
use App\Http\Controllers\CambioTituloController;
use App\Http\Controllers\SolicitudesController;
use App\Models\Solicitud_Cambio;

/******************************** GENERAL ********************************/
Route::get('/obtener-solicitud', [SolicitudesController::class, 'sendPDF'])
->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'redirectIfChangeRequestNotMade'])
->name('obtener-solicitud');

/******************************** CAMBIO DE TEMA ********************************/
Route::get('/cambio-tesis/tema', [CambioTemaController::class, 'create'])
->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'redirectIfChangeRequestPending'])
->name('cambio-tema');

Route::post('/cambio-tesis/tema', [CambioTemaController::class, 'store'])
->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'redirectIfChangeRequestPending']);

Route::get('/enviar-modificacion/tema', [CambioTemaController::class, 'uploadModification'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'redirectIfChangeRequestNotMade'. 'requestSubjectIsTema'])
    ->name('enviar-modificacion-tema');

Route::post('/enviar-modificacion/tema', [CambioTemaController::class, 'sendModification'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'redirectIfChangeRequestNotMade'. 'requestSubjectIsTema']);

/******************************** CAMBIO DE TITULO ********************************/
Route::get('/cambio-tesis/titulo', [CambioTituloController::class, 'create'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'redirectIfChangeRequestPending'])
    ->name('cambio-titulo');

Route::post('/cambio-tesis/titulo', [CambioTituloController::class, 'store'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'redirectIfChangeRequestPending'])
    ->name('cambio-titulo');

Route::get('/enviar-modificacion/titulo', [CambioTituloController::class, 'uploadModification'])
->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'redirectIfChangeRequestNotMade'. 'requestSubjectIsTitulo'])
->name('enviar-modificacion-titulo');

Route::post('/enviar-modificacion/titulo', [CambioTituloController::class, 'sendModification'])
    ->middleware(['auth', 'estudiantePermission', 'redirectIfTesisNotUploaded', 'redirectIfChangeRequestNotMade'. 'requestSubjectIsTitulo']);
