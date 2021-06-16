<?php

namespace App\Http\Controllers;

use App\Models\Estadia_Tecnica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EstadiaTecnicaSecretariaController extends Controller
{
    public function viewRequests()
    {
        $estadias = Estadia_Tecnica::where('estatus', 'Aprovada')->get();

        return view('estadia.solicitudesSecretaria', [
            'estadias' => $estadias
        ]);
    }

    public function viewOneRequest($id)
    {
        $estadia = Estadia_Tecnica::find($id);

        return view('estadia.solicitudSecretaria', [
            'estadia' => $estadia
        ]);
    }

    public function changeStatus(Request $request)
    {
        $validate = $this->validate($request, [
            'estadia_id' => 'required',
            'estatus' => 'required|string|max:100',
            'documento_oficio' => 'required|file|mimes:png,jpg,pdf'
        ]);

        if($request->estatus != 'Sellado') {
            return redirect()->back();
        }

        $estadia = Estadia_Tecnica::find($request->estadia_id);

        if($estadia == null) {
            return redirect()->back();
        }

        $archivo = $request->file('documento_oficio');
        $estadia->estatus = $request->estatus;

        Storage::disk('estudiantes')->delete($estadia->ruta_oficio_presentacion.'oficio-presentacion.pdf');
        Storage::disk('estudiantes')->put($estadia->ruta_oficio_presentacion.'oficio-presentacion.pdf', File::get($archivo));

        $estadia->save();

        return redirect()->route('estadia-revision');
    }
}
