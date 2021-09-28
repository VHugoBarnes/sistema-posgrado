<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresentacionAvance;

Route::get('/presentacion-avance', [PresentacionAvance::class, 'index'])
    ->middleware(['auth'])
    ->name('presentacion-avance');

Route::get('/presentacion-avance/programar-fecha', [PresentacionAvance::class, 'programarFecha'])
    ->middleware(['auth'])
    ->name('presentacion-avance.programar-fecha');

Route::post('/presentacion-avance/programar-fecha', [PresentacionAvance::class, 'guardarfecha'])
    ->middleware(['auth'])
    ->name('presentacion-avance.programar-fecha');

Route::get('/presentacion-avance/enviar-Reporte', [PresentacionAvance::class, 'enviarReporte'])
    ->middleware(['auth'])
    ->name('presentacion-avance.enviar-Reporte');

Route::post('/presentacion-avance/enviar-Reporte', [PresentacionAvance::class, 'guardarReporte'])
    ->middleware(['auth'])
    ->name('presentacion-avance.enviar-Reporte');
