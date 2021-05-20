<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Solicitud_Cambio;
use App\Models\Tesis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class SolicitudesController extends Controller {
    public function __construct() {
    }

    public function editTesis(Request $request) {

        if (!($request->asunto == 'tema' || $request->asunto == 'titulo')) {
            return redirect()->back();
        }

        // Recoger id del estudiante autenticado
        $estudiante_id = Auth::user()->id;
        $estudiante_id = Estudiante::where('usuario_id', $estudiante_id)->pluck('id');
        // Recoger la tesis del estudiante
        $tesis = Tesis::where('estudiante_id', $estudiante_id)->first();

        return view('solicitud.crear', [
            'tesis' => $tesis,
            'asunto' => $request->asunto
        ]);
    }

    /*  Tomar en cuenta dos casos 
        1. Es la primera vez que el estudiante hace una solicitud.
        2. El estudiante ya ha hecho una solicitud.

        Si es la primera solicitud del estudiante crear un record en la db y establecer
        el status en preparación.

        Si el estudiante ya ha hecho una solicitud verificar si el estatus de su solicitud es 
        aceptado o denegado, si es el caso darle permiso de hacer otra solicitud.
    */
    public function updateTesis(Request $request) {

        // Redireccionar si el asunto no es el correcto
        if (!($request->asunto == 'tema' || $request->asunto == 'titulo')) {
            return redirect()->back();
        }

        $validate = $this->validate($request, [
            'titulo_nuevo' => 'required|string',
            'objetivo_general_nuevo' => 'required|string',
            'objetivo_especifico_nuevo' => 'required|string',
            'justificacion' => 'required|string',
            'asunto' => 'required|string'
        ]);
        $titulo_nuevo = $request->titulo_nuevo;
        $objetivo_general_nuevo = $request->objetivo_general_nuevo;
        $objetivo_especifico_nuevo = $request->objetivo_especifico_nuevo;
        $justificacion = $request->justificacion;
        $asunto = $request->asunto;

        // Obtener string con la fecha en formato dia/mes/año
        setlocale(LC_TIME, 'es_MX.UTF-8');
        $fecha = strftime("%d/%B/%Y");

        // Recoger id del estudiante autenticado
        $estudiante_id = Auth::user()->id;
        $estudiante_id = Estudiante::where('usuario_id', $estudiante_id)->pluck('id');
        // Recoger la tesis del estudiante
        $tesis = Tesis::where('estudiante_id', $estudiante_id)->first();

        // Verificar si existe alguna solicitud de la tesis
        $solicitud = Solicitud_Cambio::where('tesis_id', $tesis->id)->get();

        if (count($solicitud) == 0 ||
            end($solicitud)[0]->estatus == 'Aprobado' ||
            end($solicitud)[0]->estatus == 'Denegado') { // No hay ninguna solicitud hecha de la tesis

            // Crear nueva solicitud
            $solicitud_nueva = new Solicitud_Cambio;
            $solicitud_nueva->tesis_id = $tesis->id;
            $solicitud_nueva->asunto = $request->asunto;
            $solicitud_nueva->estatus = 'Preparando';
            $solicitud_nueva->titulo_nuevo = $titulo_nuevo;
            $solicitud_nueva->titulo_anterior = $tesis->titulo;
            $solicitud_nueva->objetivog_nuevo = $objetivo_general_nuevo;
            $solicitud_nueva->objetivog_anterior = $tesis->objetivo_general;
            $solicitud_nueva->objetivoe_nuevo = $objetivo_especifico_nuevo;
            $solicitud_nueva->objetivoe_anterior = $tesis->objetivo_especifico;
            $solicitud_nueva->justificacion = $justificacion;
            $solicitud_nueva->save();

            $pdf = \PDF::loadView('solicitud.formato', [
                'fecha' => $fecha,
                'tesis' => $tesis,
                'titulo_nuevo' => $titulo_nuevo,
                'objetivo_general_nuevo' => $objetivo_general_nuevo,
                'objetivo_especifico_nuevo' => $objetivo_especifico_nuevo,
                'justificacion' => $justificacion,
                'asunto' => $asunto
            ]);
            $pdf->save(storage_path('app/estudiantes/'.$tesis->estudiante->numero_control.'/solicitudes'.'/solicitud.pdf' ));

            return $pdf->stream();
            //return $pdf->download('solicitud.pdf');

        } else { // Ya tiene alguna solicitud hecha

            $solicitud_actual = end($solicitud)[0];

            $pdf = \PDF::loadView('solicitud.formato', [
                'fecha' => $fecha,
                'tesis' => $tesis,
                'titulo_nuevo' => $solicitud_actual->titulo_nuevo,
                'objetivo_general_nuevo' => $solicitud_actual->objetivog_nuevo,
                'objetivo_especifico_nuevo' => $solicitud_actual->objetivoe_nuevo,
                'justificacion' => $solicitud_actual->justificacion,
                'asunto' => $asunto
            ]);
            return $pdf->stream();
        }
    }

    public function sendModification() {
    }
}
