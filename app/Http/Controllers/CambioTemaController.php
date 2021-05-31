<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Solicitud_Cambio;
use App\Models\Tesis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CambioTemaController extends Controller
{
    public function create()
    {
        // Recoger id del estudiante autenticado
        $estudiante_id = Auth::user()->id;
        $estudiante_id = Estudiante::where('usuario_id', $estudiante_id)->pluck('id');
        // Recoger la tesis del estudiante
        $tesis = Tesis::where('estudiante_id', $estudiante_id)->first();

        return view('solicitud.cambiarTema', [
            'tesis' => $tesis
        ]);
    }

    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'titulo_nuevo' => 'required|string',
            'objetivo_general_nuevo' => 'required|string',
            'objetivo_especifico_nuevo' => 'required|string',
            'justificacion' => 'required|string'
        ]);
        // Guardamos en variables la request
        $titulo_nuevo = $request->titulo_nuevo;
        $objetivo_general_nuevo = $request->objetivo_general_nuevo;
        $objetivo_especifico_nuevo = $request->objetivo_especifico_nuevo;
        $justificacion = $request->justificacion;

        // Obtener string con la fecha en formato dia/mes/año
        setlocale(LC_TIME, 'es_MX.UTF-8');
        $fecha = strftime("%d/%B/%Y");

        // Recoger id del estudiante autenticado
        $estudiante_id = Auth::user()->id;
        $estudiante_id = Estudiante::where('usuario_id', $estudiante_id)->pluck('id');
        // Recoger la tesis del estudiante
        $tesis = Tesis::where('estudiante_id', $estudiante_id)->first();

        // Crear nueva solicitud
        $solicitud_nueva = new Solicitud_Cambio;
        $solicitud_nueva->tesis_id = $tesis->id;
        $solicitud_nueva->asunto = 'tema';
        $solicitud_nueva->estatus = 'Preparando';
        $solicitud_nueva->titulo_nuevo = $titulo_nuevo;
        $solicitud_nueva->titulo_anterior = $tesis->titulo;
        $solicitud_nueva->objetivog_nuevo = $objetivo_general_nuevo;
        $solicitud_nueva->objetivog_anterior = $tesis->objetivo_general;
        $solicitud_nueva->objetivoe_nuevo = $objetivo_especifico_nuevo;
        $solicitud_nueva->objetivoe_anterior = $tesis->objetivo_especifico;
        $solicitud_nueva->justificacion = $justificacion;
        $solicitud_nueva->save();

        // Cargamos en PDF la vista
        $pdf = \PDF::loadView('solicitud.formato', [
            'fecha' => $fecha,
            'tesis' => $tesis,
            'titulo_nuevo' => $titulo_nuevo,
            'objetivo_general_nuevo' => $objetivo_general_nuevo,
            'objetivo_especifico_nuevo' => $objetivo_especifico_nuevo,
            'justificacion' => $justificacion,
            'asunto' => 'Por medio de la presente, se solicita el cambio de tema de tesis. Se anexo el protocolo de investigación del nuevo tema de tesis propuesto.'
        ]);

        // Guarda la vista en el file system
        $pdf->save(storage_path('app/estudiantes/' . $tesis->estudiante->numero_control . '/solicitudes' . '/') . 'solicitud.pdf');

        // Devolvemos el pdf en el navegador
        return response()->file(storage_path('app/estudiantes/' . $tesis->estudiante->numero_control . '/solicitudes' . '/') . 'solicitud.pdf');
    }

    public function uploadModification()
    {
        // Vista para subir el archivo de la solicitud con la firma
        return view('solicitud.subirTema');
    }

    public function sendModification(Request $request)
    {
        // Verificamos que el archivo sea un PDF
        $validate = $this->validate($request, [
            'archivo_solicitud' => 'required|mimes:pdf',
            'archivo_protocolo' => 'required|mimes:pdf'
        ]);

        /*************** Recibimos la solicitud con firma ***************/
        $archivo_solicitud = $request->file('archivo_solicitud');
        $archivo_protocolo = $request->file('archivo_protocolo');

        /******* Cambiamos el estatus de la solicitud a Pendiente *******/
        // Obtener el id del estudiante autenticado
        $estudiante_id = Auth::user()->id;
        $estudiante = Estudiante::where('usuario_id', $estudiante_id)->first();
        $estudiante_id = $estudiante->id;
        $tesis = Tesis::where('estudiante_id', $estudiante_id)->first();

        /*************** Reemplazar pdf antiguo con nuevo ***************/
        Storage::disk('estudiantes')->delete($estudiante->numero_control . '/solicitudes/solicitud.pdf');
        Storage::disk('estudiantes')->put($estudiante->numero_control . '/solicitudes/solicitud.pdf', File::get($archivo_solicitud));
        /*************** Guardamos el archivo del protocolo ***************/
        // Verificar si existe un archivo con ese nombre
        if(Storage::exists('estudiantes/'.$estudiante->numero_control.'/solicitudes/protocolo.pdf')){
            Storage::disk('estudiantes')->delete($estudiante->numero_control . '/solicitudes/protocolo.pdf');
        }
        Storage::disk('images')->put($estudiante->numero_control.'/solicitudes/protocolo.pdf', File::get($archivo_protocolo));

        $solicitud_id = Solicitud_Cambio::where('tesis_id', $tesis->id)->pluck('id');
        $solicitud = Solicitud_Cambio::find($solicitud_id)->first();
        $solicitud->estatus = 'Pendiente';
        $solicitud->save();

        // Devolvemos un mensaje de que se ha enviado el documento
        return redirect()->route('home')->with(['message'=>'Se ha enviado tu solicitud al departamento de coordinación']);
    }

}
