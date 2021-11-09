<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresentacionAvance;

Route::get('/presentacion-avance', [PresentacionAvance::class, 'index'])
    ->middleware(['auth'])
    ->name('presentacion-avance');

Route::get('/presentacion-avance/programar-fecha', [PresentacionAvance::class, 'programarFecha'])
    ->middleware(['auth','cordinadorPermission'])
    ->name('presentacion-avance.programar-fecha');

Route::post('/presentacion-avance/programar-fecha', [PresentacionAvance::class, 'guardarfecha'])
    ->middleware(['auth', 'cordinadorPermission'])
    ->name('presentacion-avance.programar-fecha');

Route::get('/presentacion-avance/ver-fecha', [PresentacionAvance::class, 'verFecha'])
    ->middleware(['auth','estudiantePermission'])
    ->name('presentacion-avance.programar-fecha');

Route::get('/presentacion-avance/enviar-reporte', [PresentacionAvance::class, 'enviarReporte'])
    ->middleware(['auth', 'estudiantePermission'])
    ->name('presentacion-avance.enviar-reporte');

Route::post('/presentacion-avance/enviar-reporte', [PresentacionAvance::class, 'guardarReporte'])
    ->middleware(['auth', 'estudiantePermission'])
    ->name('presentacion-avance.enviar-reporte');
