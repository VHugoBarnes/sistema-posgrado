<?php

use App\Http\Controllers\EstadiaTecnicaCoordinadorController;
use App\Http\Controllers\EstadiaTecnicaEstudianteController;
use App\Http\Controllers\EstadiaTecnicaJefeController;
use App\Http\Controllers\EstadiaTecnicaSecretariaController;
use Illuminate\Support\Facades\Route;

Route::get('/estadia-tecnica', [EstadiaTecnicaEstudianteController::class, 'index'])
    ->name('estadia-tecnica');

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

//////////////////////////////////////////////////////////// Rutas para Coordinador
Route::get('/estadia-tecnica/coordinador/solicitudes', [EstadiaTecnicaCoordinadorController::class, 'getRequests'])
    ->middleware(['auth', 'cordinadorPermission'])
    ->name('estadia-solicitudes');

Route::get('/estadia-tecnica/coordinador/solicitudes/{id}', [EstadiaTecnicaCoordinadorController::class, 'getOneRequest'])
    ->middleware(['auth', 'cordinadorPermission', 'estadiaPending'])
    ->name('estadia-individual');

Route::post('/estadia-tecnica/coordinador/solicitudes/{id}', [EstadiaTecnicaCoordinadorController::class, 'changeStatus'])
    ->middleware(['auth', 'cordinadorPermission', 'estadiaPending']);

//////////////////////////////////////////////////////////// Rutas para secretaria
Route::get('/estadia-tecnica/secretaria/solicitudes', [EstadiaTecnicaSecretariaController::class, 'viewRequests'])
    ->middleware(['auth', 'secretariaPermission'])
    ->name('estadia-revision');

Route::get('/estadia-tecnica/secretaria/solicitudes/{id}', [EstadiaTecnicaSecretariaController::class, 'viewOneRequest'])
    ->middleware(['auth', 'secretariaPermission', 'estadiaApproved'])
    ->name('estadia-revision-individual');

Route::post('/estadia-tecnica/secretaria/solicitudes/{id}', [EstadiaTecnicaSecretariaController::class, 'addElements'])
    ->middleware(['auth', 'secretariaPermission', 'estadiaApproved']);

//////////////////////////////////////////////////////////// Rutas para jefe posgrado
Route::get('/estadia-tecnica/jefe-posgrado/solicitudes', [EstadiaTecnicaJefeController::class, 'viewPending'])
    ->middleware(['auth', 'jefePermission'])
    ->name('estadia-por-firmar');

Route::get('/estadia-tecnica/jefe-posgrado/solicitudes/{id}', [EstadiaTecnicaJefeController::class, 'viewOnePending'])
    ->middleware(['auth', 'jefePermission', 'estadiaStamped'])
    ->name('estadia-por-firmar-individual');

Route::post('/estadia-tecnica/jefe-posgrado/solicitudes/{id}', [EstadiaTecnicaJefeController::class, 'signPending'])
    ->middleware(['auth', 'jefePermission', 'estadiaStamped'])
    ->name('estadia-por-firmar-individual');
