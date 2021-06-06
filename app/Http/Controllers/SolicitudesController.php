<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Solicitud_Cambio;
use App\Models\Tesis;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SolicitudesController extends Controller {

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

    public function getProtocoloByNumber(Request $request, $numero)
    {
        return response()->file(storage_path('app/estudiantes/' . $numero . '/solicitudes' . '/') . 'protocolo.pdf');
    }

    public function changeStatus(Request $request, $id, $estatus)
    {
        // Verificar si el id de la solicitud existe
        $solicitud = Solicitud_Cambio::find($id);

        if($solicitud == null) {
            return redirect()->back();
        }

        if($request->comentarios != null) {
            $solicitud->comentarios = $request->comentarios;
        }

        // Verificar que haya llegado en el estatus "aprobar" o "rechazar"
        switch ($estatus) {
            case 'aprobar':
                $solicitud->estatus = "Aprobado";
                $solicitud->save();
                return redirect()->back();
                break;

            case 'rechazar':
                $solicitud->estatus = "Rechazado";
                $solicitud->save();
                return redirect()->back();
                break;
            
            default:
                return redirect()->back();
        }

    }

    public function deleteModification()
    {
        // Recoger id del estudiante autenticado
        $user_id = Auth::user()->id;
        $estudiante_id = Estudiante::where('usuario_id', $user_id)->pluck('id');
        $estudiante = Estudiante::find($estudiante_id);
        // Recoger id de la tesis.
        $tesis_id = Tesis::where('estudiante_id', $user_id)->pluck('id');
        // Recoger id de la solicitud
        $solicitud_id = Solicitud_Cambio::where('tesis_id', $tesis_id)->pluck('id');
        $solicitud = Solicitud_Cambio::find($solicitud_id);

        if(Storage::exists('estudiantes/'.$estudiante->numero_control.'/solicitudes/protocolo.pdf')){
            Storage::disk('estudiantes')->delete($estudiante->numero_control . '/solicitudes/protocolo.pdf');
        }
        Storage::disk('estudiantes')->delete($estudiante->numero_control . '/solicitudes/solicitud.pdf');

        $solicitud->delete();

        return redirect()->back()->with(['message'=>'Solicitud eliminada correctamente']);
    }

    public function viewStatus()
    {
        $usuario = Auth::user();
        $userRole = getUserRole($usuario);
        
        if($userRole == 'Estudiante') {

            $estudiante_id = $usuario->id;
            $estudiante_id = Estudiante::where('usuario_id', $estudiante_id)->pluck('id')[0];

            $tesis_id = Tesis::where('estudiante_id', $estudiante_id)->pluck('id')[0];
            $solicitud = Solicitud_Cambio::where('tesis_id', $tesis_id)->pluck('id')[0];
            $solicitud = Solicitud_Cambio::find($solicitud);

            return view('solicitud.status', [
                'solicitd' => $solicitud
            ]);

        } else if($userRole == 'Docente' || $userRole == 'Coordinador') {

            $director = Auth::user()->id;
            $director = Usuario::find($director);

            if($director->director != null) {

                // Recoger el id de las tesis de la que es director
                $tesis = Tesis::where('director', $director->id)->pluck('id');

                // Recoger todas las tesis que tengan solicitud
                $solicitudes = Solicitud_Cambio::whereIn('tesis_id', $tesis)->get();

                return $solicitudes;
                return view('solicitud.status', [
                    'solicitudes' => $solicitudes
                ]);

            } else {
                return redirect()->route('dashboard');
            }

        }

        return ('solicitud.status');
    }

}
