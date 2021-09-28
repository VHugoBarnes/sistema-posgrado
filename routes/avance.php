<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresentacionAvance;

Route::get('/presentacion-avance', [PresentacionAvance::class, 'index'])
    ->middleware(['auth'])
    ->name('presentacion-avance');

Route::get('/presentacion-avance/programar-fecha', [PresentacionAvance::class, 'programarFecha'])
    ->middleware(['auth'])
    ->name('presentacion-avance.programar-fecha');

Route::post('/presentacion-avance/programar-fecha', [PresentacionAvance::class, 'guardarFecha'])
    ->middleware(['auth'])
    ->name('presentacion-avance.programar-fecha');

Route::get('/presentacion-avance/enviar-reporte', [PresentacionAvance::class, 'enviarReporte'])
    ->middleware(['auth'])
    ->name('presentacion-avance.enviar-reporte');

Route::post('/presentacion-avance/enviar-reporte', [PresentacionAvance::class, 'guardarReporte'])
    ->middleware(['auth'])
    ->name('presentacion-avance.enviar-reporte');
