<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Solicitud_Cambio;
use App\Models\Tesis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SolicitudesController extends Controller {

    public function __construct() {
    }

    /**
     * Al entrar a este controlador se asume:
     *      - NO tienes ninguna solicitud hecha
     *      O
     *      - Tu última solicitud NO tiene estatus 'Pendiente', 'En Revision' o 'Preparando'
     */
    public function create(Request $request) {

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

    /**
     * Al entrar a este controlador se asume:
     *      - NO tienes ninguna solicitud hecha 
     *      O
     *      - Tu última solicitud NO tiene estatus 'Pendiente', 'En Revision' o 'Preparando'
     */
    public function store(Request $request) {

        // Redireccionar si el asunto no es el correcto
        if (!($request->asunto == 'tema' || $request->asunto == 'titulo')) {
            return redirect()->back();
        }

        // Validaciones
        $validate = $this->validate($request, [
            'titulo_nuevo' => 'required|string',
            'objetivo_general_nuevo' => 'required|string',
            'objetivo_especifico_nuevo' => 'required|string',
            'justificacion' => 'required|string',
            'asunto' => 'required|string'
        ]);
        // Guardamos en variables la request
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

        // Cargamos en PDF la vista
        $pdf = \PDF::loadView('solicitud.formato', [
            'fecha' => $fecha,
            'tesis' => $tesis,
            'titulo_nuevo' => $titulo_nuevo,
            'objetivo_general_nuevo' => $objetivo_general_nuevo,
            'objetivo_especifico_nuevo' => $objetivo_especifico_nuevo,
            'justificacion' => $justificacion,
            'asunto' => $asunto
        ]);

        // Guarda la vista en el file system
        $pdf->save(storage_path('app/estudiantes/' . $tesis->estudiante->numero_control . '/solicitudes' . '/') . 'solicitud.pdf');

        // Devolvemos el pdf en el navegador
        return $pdf->stream();
    }

    /**
     * Al entrar a este controlador se asume que:
     *      - Tienes una solicitud con el estatus 'Preparando'
     */
    public function uploadModification() {
        // Vista para subir el archivo de la solicitud con la firma
        return view('solicitud.subir');
    }

    /**
     * Al entrar a este controlador se asume que:
     *      - Tienes una solicitud con el estatus 'Preparando'
     */
    public function sendModification(Request $request) {
        
        // Verificamos que el archivo sea un PDF
        $validate = $this->validate($request, [
            'archivo' => 'required|mimes:pdf'
        ]);
        
        /*************** Recibimos la solicitud con firma ***************/
        $archivo = $request->file('archivo');

        /******* Cambiamos el estatus de la solicitud a Pendiente *******/
        // Obtener el id del estudiante autenticado
        $estudiante_id = Auth::user()->id;
        $estudiante = Estudiante::where('usuario_id', $estudiante_id)->first();
        $estudiante_id = $estudiante->id;
        $tesis = Tesis::where('estudiante_id', $estudiante_id)->first();

        /*************** Reemplazar pdf antiguo con nuevo ***************/
        Storage::disk('estudiantes')->delete($estudiante->numero_control . '/solicitudes/solicitud.pdf');
        Storage::disk('estudiantes')->put($estudiante->numero_control . '/solicitudes/solicitud.pdf', File::get($archivo));

        $solicitud_id = Solicitud_Cambio::where('tesis_id', $tesis->id)->pluck('id');
        $solicitud = Solicitud_Cambio::find($solicitud_id)->first();
        $solicitud->estatus = 'Pendiente';
        $solicitud->save();

        // Devolvemos un mensaje de que se ha enviado el documento
        return redirect()->route('home')->with(['message'=>'Se ha enviado tu solicitud al departamento de coordinación']);
    }

    /**
     * Sirve para enviar el documento a personas con el estatus Preparando
     */
    public function sendPDF() {
        // Recoger id del estudiante autenticado
        $estudiante_id = Auth::user()->id;
        // Recoger el numero de control
        $numero_control = Estudiante::where('usuario_id', $estudiante_id)->pluck('numero_control')[0];

        return response()->file(storage_path('app/estudiantes/' . $numero_control . '/solicitudes' . '/') . 'solicitud.pdf');
    }

    public function viewRequests()
    {
        $solicitudes = Solicitud_Cambio::where('estatus', '!=' ,'Preparando')->get();

        return view('solicitud.lista', [
            'solicitudes' => $solicitudes
        ]);

    }

    public function getSolicitudByNumber(Request $request, $numero)
    {
        return response()->file(storage_path('app/estudiantes/' . $numero . '/solicitudes' . '/') . 'solicitud.pdf');
    }

}
