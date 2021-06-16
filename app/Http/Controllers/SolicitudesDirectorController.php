<?php

namespace App\Http\Controllers;

use App\Models\Solicitud_Cambio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SolicitudesDirectorController extends Controller
{
    public function viewRequests()
    {
        $solicitudes = Solicitud_Cambio::where('estatus' , 'Pendiente')->get();

        return view('solicitud.listaDirector', [
            'solicitudes' => $solicitudes
        ]);
    }

    public function changeStatus(Request $request, $id, $estatus)
    {
        // Verificar si el id de la solicitud existe
        $solicitud = Solicitud_Cambio::find($id);

        $validate = $this->validate($request, [
            'archivo_firmado' => 'required|file|mimes:pdf'
        ]);

        $archivo = $request->file('archivo_firmado');

        if($solicitud == null) {
            return redirect()->back();
        }

        if($request->comentarios != null) {
            $solicitud->comentarios = $request->comentarios;
        }

        $estudiante = $solicitud->tesis->estudiante;

        Storage::disk('estudiantes')->delete($estudiante->numero_control . '/solicitudes/solicitud.pdf');
        Storage::disk('estudiantes')->put($estudiante->numero_control . '/solicitudes/solicitud.pdf', File::get($archivo));

        // Verificar que haya llegado en el estatus "aprobar" o "rechazar"
        switch ($estatus) {
            case 'aprobar':
                $solicitud->estatus = "Aprobado Director";
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
}
