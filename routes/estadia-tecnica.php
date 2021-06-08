<?php

use App\Http\Controllers\EstadiaTecnicaController;
use Illuminate\Support\Facades\Route;

Route::get('/estadia-tecnica', [EstadiaTecnicaController::class, 'index'])
    ->name('estadia-tecnica');

//////////////////////////////////////////////////////////// Rutas para estudiante
Route::get('estadia-tecnica/solicitud', [EstadiaTecnicaController::class, 'create'])
    ->middleware(['auth', 'estudiantePermission'])
    ->name('estadia-solicitud');

Route::post('estadia-tecnica/solicitud', [EstadiaTecnicaController::class, 'store'])
    ->middleware(['auth', 'estudiantePermission']);

//////////////////////////////////////////////////////////// Rutas para Coordinador
Route::get('/estadia-tecnica/solicitudes', [EstadiaTecnicaController::class, 'getRequests'])
    ->middleware(['auth', 'cordinadorPermission'])
    ->name('estadia-solicitudes');

Route::get('/estadia-tecnica/solicitudes/{id}', [EstadiaTecnicaController::class, 'getOneRequest'])
    ->middleware(['auth', 'cordinadorPermission'])
    ->name('estadia-individual');

Route::post('/estadia-tecnica/solicitudes/{id}', [EstadiaTecnicaController::class, 'changeStatus'])
    ->middleware(['auth', 'cordinadorPermission']);

//////////////////////////////////////////////////////////// Rutas para secretaria
Route::get('/estadia-tecnica/revision', [EstadiaTecnicaController::class, 'viewRequests'])
    ->middleware(['auth', 'secretariaPermission'])
    ->name('estadia-revision');

Route::get('/estadia-tecnica/revision/{id}', [EstadiaTecnicaController::class, 'viewOneRequest'])
    ->middleware(['auth', 'secretariaPermission'])
    ->name('estadia-revision-individual');

Route::post('/estadia-tecnica/revision/{id}', [EstadiaTecnicaController::class, 'addElements'])
    ->middleware(['auth', 'secretariaPermission']);

//////////////////////////////////////////////////////////// Rutas para jefe posgrado
Route::get('/estadia-tecnica/por-firmar', [EstadiaTecnicaController::class, 'viewPending'])
    ->middleware(['auth', 'jefePermission'])
    ->name('estadia-por-firmar');

Route::get('/estadia-tecnica/por-firmar/{id}', [EstadiaTecnicaController::class, 'viewOnePending'])
    ->middleware(['auth', 'jefePermission'])
    ->name('estadia-por-firmar-individual');

Route::post('/estadia-tecnica/por-firmar/{id}', [EstadiaTecnicaController::class, 'signPending'])
    ->middleware(['auth', 'jefePermission'])
    ->name('estadia-por-firmar-individual');
