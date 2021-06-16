<?php

use App\Http\Controllers\EstadiaTecnicaCoordinadorController;
use App\Http\Controllers\EstadiaTecnicaEstudianteController;
use App\Http\Controllers\EstadiaTecnicaJefeController;
use App\Http\Controllers\EstadiaTecnicaSecretariaController;
use Illuminate\Support\Facades\Route;

Route::get('/estadia-tecnica', [EstadiaTecnicaEstudianteController::class, 'index'])
    ->name('estadia-tecnica');

Route::post('/estadia-tecnica/documento', [EstadiaTecnicaEstudianteController::class, 'getDocument'])
    ->middleware(['auth'])
    ->where(['tipo'=>'[a-z]+', 'id'=>'[0-9]+'])
    ->name('estadia-documento');

Route::get('/estadia-test', [EstadiaTecnicaEstudianteController::class, 'test']);

//////////////////////////////////////////////////////////// Rutas para estudiante
Route::get('/estadia-tecnica/estudiante/solicitud', [EstadiaTecnicaEstudianteController::class, 'create'])
    ->middleware(['auth', 'estudiantePermission', 'estadiaIsNotRegistered'])
    ->name('estadia-estudiante-solicitud');

Route::post('/estadia-tecnica/estudiante/solicitud', [EstadiaTecnicaEstudianteController::class, 'store'])
    ->middleware(['auth', 'estudiantePermission', 'estadiaIsNotRegistered']);

Route::get('/estadia-tecnica/estudiante/estatus', [EstadiaTecnicaEstudianteController::class, 'status'])
    ->middleware(['auth', 'estudiantePermission', 'estadiaIsRegistered'])
    ->name('estadia-estudiante-status');

Route::get('/estadia-tecnica/estudiante/modificar', [EstadiaTecnicaEstudianteController::class, 'edit'])
    ->middleware(['auth', 'estudiantePermission', 'estadiaIsRegistered', 'estadiaModifiable'])
    ->name('estadia-estudiante-modificar');

Route::put('/estadia-tecnica/estudiante/modificar', [EstadiaTecnicaEstudianteController::class, 'update'])
    ->middleware(['auth', 'estudiantePermission', 'estadiaIsRegistered', 'estadiaModifiable']);

Route::post('/estadia-tecnica/estudiante/enviar', [EstadiaTecnicaEstudianteController::class, 'send'])
    ->middleware(['auth', 'estudiantePermission', 'estadiaIsRegistered', 'estadiaModifiable'])
    ->name('estadia-estudiante-enviar');

//////////////////////////////////////////////////////////// Rutas para Coordinador
Route::get('/estadia-tecnica/coordinador/solicitudes', [EstadiaTecnicaCoordinadorController::class, 'viewRequests'])
    ->middleware(['auth', 'cordinadorPermission'])
    ->name('estadia-solicitudes');

Route::get('/estadia-tecnica/coordinador/solicitudes/{id}', [EstadiaTecnicaCoordinadorController::class, 'viewOneRequest'])
    ->middleware(['auth', 'cordinadorPermission', 'estadiaPending'])
    ->where(['id'=>'[0-9]+'])
    ->name('estadia-individual');

Route::post('/estadia-tecnica/coordinador/solicitudes/{id}', [EstadiaTecnicaCoordinadorController::class, 'changeStatus'])
    ->middleware(['auth', 'cordinadorPermission', 'estadiaPending'])
    ->where(['id'=>'[0-9]+']);

//////////////////////////////////////////////////////////// Rutas para secretaria
Route::get('/estadia-tecnica/secretaria/solicitudes', [EstadiaTecnicaSecretariaController::class, 'viewRequests'])
    ->middleware(['auth', 'secretariaPermission'])
    ->name('estadia-revision');

Route::get('/estadia-tecnica/secretaria/solicitudes/{id}', [EstadiaTecnicaSecretariaController::class, 'viewOneRequest'])
    ->middleware(['auth', 'secretariaPermission', 'estadiaApproved'])
    ->where(['id'=>'[0-9]+'])
    ->name('estadia-revision-individual');

Route::post('/estadia-tecnica/secretaria/solicitudes/{id}', [EstadiaTecnicaSecretariaController::class, 'changeStatus'])
    ->middleware(['auth', 'secretariaPermission', 'estadiaApproved'])
    ->where(['id'=>'[0-9]+']);

//////////////////////////////////////////////////////////// Rutas para jefe posgrado
Route::get('/estadia-tecnica/jefe-posgrado/solicitudes', [EstadiaTecnicaJefeController::class, 'viewRequests'])
    ->middleware(['auth', 'jefePermission'])
    ->name('estadia-por-firmar');

Route::get('/estadia-tecnica/jefe-posgrado/solicitudes/{id}', [EstadiaTecnicaJefeController::class, 'viewOneRequest'])
    ->middleware(['auth', 'jefePermission', 'estadiaStamped'])
    ->where(['id'=>'[0-9]+'])
    ->name('estadia-por-firmar-individual');

Route::post('/estadia-tecnica/jefe-posgrado/solicitudes/{id}', [EstadiaTecnicaJefeController::class, 'changeStatus'])
    ->middleware(['auth', 'jefePermission', 'estadiaStamped'])
    ->where(['id'=>'[0-9]+']);
