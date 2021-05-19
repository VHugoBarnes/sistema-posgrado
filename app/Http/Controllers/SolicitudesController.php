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

    public function editTesis(Request $request)
    {
        
        if( !($request->asunto == 'tema' || $request->asunto == 'titulo') ) {
            return redirect()->back();
        }

        // Recoger id del estudiante autenticado
        $estudiante_id = Auth::user()->id;
        $estudiante_id = Estudiante::where('usuario_id',$estudiante_id)->pluck('id');
        // Recoger la tesis del estudiante
        $tesis = Tesis::where('estudiante_id', $estudiante_id)->first();

        return view('solicitud.crear', [
            'tesis' => $tesis,
            'asunto' => $request->asunto
        ]);
    }

    public function updateTesis(Request $request)
    {
        /* Tomar en cuenta dos casos 
            1. Es la primera vez que el estudiante hace una solicitud.
            2. El estudiante ya ha hecho una solicitud.

            Si es la primera solicitud del estudiante crear un record en la db y establecer
            el status en preparación.

            Si el estudiante ya ha hecho una solicitud verificar si el estatus de su solicitud es 
            aceptado o denegado, si es el caso darle permiso de hacer otra solicitud.
        */
        if( !($request->asunto == 'tema' || $request->asunto == 'titulo') ) {
            return redirect()->back();
        }

        // Recoger id del estudiante autenticado
        $estudiante_id = Auth::user()->id;
        $estudiante_id = Estudiante::where('usuario_id',$estudiante_id)->pluck('id');
        // Recoger la tesis del estudiante
        $tesis = Tesis::where('estudiante_id', $estudiante_id)->first();
        
        // Verificar si existe alguna solicitud de la tesis
        $solicitud = Solicitud_Cambio::where('tesis_id',$tesis->id)->get();

        if(count($solicitud) == 0) { // No hay ninguna solicitud hecha de la tesis
            
            // Crear nueva solicitud

            // $solicitud_nueva = new Solicitud_Cambio;

            // $solicitud_nueva->tesis_id = $tesis->id;
            // $solicitud_nueva->asunto = $request->asunto;

            return view('solicitud.formato', [
                'tesis' => $tesis
            ]);
            
        } else { // Ya tiene alguna solicitud hecha

        }

        return $solicitud;
    }

    public function sendModification()
    {

    }

    public function test() {
        
        // $pdf = \PDF::loadView('test');
        // return $pdf->stream();
    }
}
