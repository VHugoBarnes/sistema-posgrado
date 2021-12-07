<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresentacionAvance;

Route::get('/presentacion-avance', [PresentacionAvance::class, 'index'])
    ->middleware(['auth'])
    ->name('presentacion-avance');

Route::get('/presentacion-avance/programar-fecha', [PresentacionAvance::class, 'programarFecha'])
    ->middleware(['auth', 'cordinadorPermission' ])
    ->name('presentacion-avance.programar-fecha');

Route::post('/presentacion-avance/programar-fecha', [PresentacionAvance::class, 'guardarfecha'])
    ->middleware(['auth', 'cordinadorPermission'])
    ->name('presentacion-avance.programar-fecha');

Route::get('/presentacion-avance/ver-fecha', [PresentacionAvance::class, 'verFecha'])
    ->middleware(['auth','estudiantePermission'])
    ->name('presentacion-avance.ver-fecha');

Route::get('/presentacion-avance/fechas-asignadas', [PresentacionAvance::class, 'verFechas'])
    ->middleware(['auth','cordinadorPermission'])
    ->name('presentacion-avance.ver-fechasCor');
    
Route::get('/presentacion-avance/miembros-del-comite', [PresentacionAvance::class, 'verTesis'])
    ->middleware(['auth','estudiantePermission'])
    ->name('presentacion-avance.miembrosComite');

Route::get('/presentacion-avance/enviar-reporte', [PresentacionAvance::class, 'enviarReporte'])
    ->middleware(['auth', 'estudiantePermission'])
    ->name('presentacion-avance.enviar-reporte');

Route::post('/presentacion-avance/enviar-reporte', [PresentacionAvance::class, 'guardarReporte'])
    ->middleware(['auth', 'estudiantePermission'])
    ->name('presentacion-avance.enviar-reporte');

Route::get('/presentacion-avance/obtener-reporte', [PresentacionAvance::class, 'obtenerReporte'])
    ->middleware(['auth', 'estudiantePermission'])
    ->name('presentacion-avance.obtener-reporte');



Route::get('/presentacion-avance/buscar', [PresentacionAvance::class, 'BuscadorDeAlumnos'])
    ->middleware(['auth','cordinadorPermission'])
    ->name('presentacion-avance.buscar-alumnos');

Route::post('/presentacion-avance/ver-reporte', [PresentacionAvance::class, 'BuscarAlumno'])
    ->middleware(['auth','cordinadorPermission'])
    ->name('presentacion-avance.ver-reporte');

Route::get('/presentacion-avance/ver-reporte/{estudiante_id}', [PresentacionAvance::class, 'verReporte'])
    ->middleware(['auth','cordinadorPermission'])
    ->name('presentacion-avance.ver-reporte-alumno');
