<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresentacionAvance;

//? Index
Route::get('/presentacion-avance', [PresentacionAvance::class, 'index'])
    ->middleware(['auth'])
    ->name('presentacion-avance');

//? Agendar la presentación de avance (coordinador)
Route::get('/presentacion-avance/programar-fecha', [PresentacionAvance::class, 'programarFecha'])
    ->middleware(['auth', 'cordinadorPermission' ])
    ->name('presentacion-avance.programar-fecha');

Route::post('/presentacion-avance/programar-fecha', [PresentacionAvance::class, 'guardarfecha'])
    ->middleware(['auth', 'cordinadorPermission']);

//? Ver fecha programada (estudiante)
Route::get('/presentacion-avance/ver-fecha', [PresentacionAvance::class, 'verFecha'])
    ->middleware(['auth','estudiantePermission'])
    ->name('presentacion-avance.ver-fecha');
    
//? Ver miembros del comité (estudiante)
Route::get('/presentacion-avance/miembros-del-comite', [PresentacionAvance::class, 'verTesis'])
    ->middleware(['auth','estudiantePermission'])
    ->name('presentacion-avance.miembrosComite');

//? Enviar reporte (estudiante)
Route::get('/presentacion-avance/enviar-reporte', [PresentacionAvance::class, 'enviarReporte'])
    ->middleware(['auth', 'estudiantePermission'])
    ->name('presentacion-avance.enviar-reporte');

//? Enviar reporte (estudiante) [POST]
Route::post('/presentacion-avance/enviar-reporte', [PresentacionAvance::class, 'guardarReporte'])
    ->middleware(['auth', 'estudiantePermission']);

//? Obtener reporte (estudiante)
Route::get('/presentacion-avance/obtener-reporte', [PresentacionAvance::class, 'obtenerReporte'])
    ->middleware(['auth', 'estudiantePermission'])
    ->name('presentacion-avance.obtener-reporte');

//? Buscar estudiantes (coordinador)
Route::get('/presentacion-avance/buscar', [PresentacionAvance::class, 'BuscadorDeAlumnos'])
    ->middleware(['auth','cordinadorPermission'])
    ->name('presentacion-avance.buscar-alumnos');

//? Buscar estudiantes (coordinador)
Route::get('/presentacion-avance/ver-reporte', [PresentacionAvance::class, 'BuscarAlumno'])
    ->middleware(['auth','cordinadorPermission'])
    ->name('presentacion-avance.ver-reportes');

//? Obtener reporte de estudiante (coordinador)
Route::get('/presentacion-avance/ver-reporte/{estudiante_id}', [PresentacionAvance::class, 'verReporte'])
    ->middleware(['auth','notStudentPermission'])
    ->name('presentacion-avance.ver-reporte-alumno');

//! New

//? Ver reporte del estudiante (Comité)
Route::get('/presentacion-avance/comite', [PresentacionAvance::class, 'verReportesComite'])
    ->middleware(['auth', 'notStudentPermission'])
    ->name('presentacion-avance.comite-ver-reportes');

Route::get('/presentacion-avance/estudiante/{estudiante_id}', [PresentacionAvance::class, 'detalleReporte'])
    ->middleware(['auth', 'notStudentPermission'])
    ->name('presentacion-avance.comite-ver-reporte');

//? Evaluar reporte del estudiante (Comité)
Route::post('/presentacion-avance/comite/evaluar/{estudiante_id}', [PresentacionAvance::class, 'evaluarReporte'])
    ->middleware(['auth', 'notStudentPermission'])
    ->name('presentacion-avance.evaluar-reporte');

//? Generar pdf (Coordinador)
Route::post('/presentacion-avance/generar-documento/{estudiante_id}', [PresentacionAvance::class, 'generarDocumentoEvaluacion'])
    ->middleware(['auth', 'cordinadorPermission'])
    ->name('presentacion-avance.generar-documento');

//? Devolver pdf de evaluación (comite, coordinador o jefe)
Route::get('/presentacion-avance/obtener-documento/{estudiante_id}', [PresentacionAvance::class, 'obtenerDocumentoEvaluacion'])
    ->middleware(['auth', 'notStudentPermission'])
    ->name('presentacion-avance.obtener-documento');

//? Firmar y sellar documento (comite, coordinador o jefe)
Route::post('/presentacion-avance/sellar-documento/{estudiante_id}', [PresentacionAvance::class, 'firmarDocumentoEvaluacion'])
    ->middleware(['auth', 'notStudentPermission'])
    ->name('presentacion-avance.sellar-documento');

Route::post('/presentacion-avance/editar-fecha/{estudiante_id}', [PresentacionAvance::class, 'editarfecha'])
    ->middleware(['auth', 'cordinadorPermission'])
    ->name('presentacion-avance.editar-fecha');

//? Devolver pdf de evaluación (estudiante)
Route::get('/presentacion-avance/obtener-documento-estudiante', [PresentacionAvance::class, 'obtenerDocumentoEvaluacionEstudiante'])
    ->middleware(['auth', 'estudiantePermission'])
    ->name('presentacion-avance.obtener-documento-estudiante');

//? Mandar comentarios a estudiante sobre documento subido
Route::post('/presentacion-avance/enviar-comentario-comite/{estudiante_id}', [PresentacionAvance::class, 'mandarComentarioComite'])
    ->middleware(['auth', 'notStudentPermission'])
    ->name('presentacion-avance.enviar-comentario-comite');
