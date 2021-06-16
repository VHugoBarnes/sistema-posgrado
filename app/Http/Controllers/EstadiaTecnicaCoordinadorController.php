<?php

namespace App\Http\Controllers;

use App\Models\Estadia_Tecnica;
use Illuminate\Http\Request;

class EstadiaTecnicaCoordinadorController extends Controller
{
    public function viewRequests()
    {
        $estadias = Estadia_Tecnica::where('estatus', 'Pendiente')->get();

        return view('estadia.solicitudesCoordinador', [
            'estadias' => $estadias
        ]);
    }

    public function viewOneRequest($id)
    {
        $estadia = Estadia_Tecnica::find($id);
        
        return view('estadia.solicitudCoordinador', [
            'estadia' => $estadia
        ]);
    }

    public function changeStatus(Request $request)
    {
        $validate = $this->validate($request, [
            'estadia_id' => 'required',
            'estatus' => 'required|string|max:100'
        ]);

        if(!($request->estatus != 'Aprovada' || $request->estatus != 'Rechazada')) {
            return redirect()->back();
        }

        $estadia = Estadia_Tecnica::find($request->estadia_id);

        if($estadia == null) {
            return redirect()->back();
        }

        $estadia->estatus = $request->estatus;
        $estadia->save();

        return redirect()->route('estadia-solicitudes');
    }

}
