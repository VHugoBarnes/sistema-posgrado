<?php

namespace App\Http\Controllers;

use App\Models\Infraestructura_Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfraestructuraController extends Controller
{

    public function __construct()
    {
        
    }

    public function getAll()
    {
        
    }
    
    public function create()
    {
        return view('infraestructura.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => '',
            'caracteristicas' => '',
            'observaciones' => ''
        ]);

        $nombre = $request->nombre;
        $tipo = $request->tipo;
        $caracteristicas = $request->caracteristicas;
        $observaciones = $request->observaciones;

        $infraestructura = new Infraestructura_Servicio;

        $nombre != Null ? $infraestructura->nombre = $nombre : Null;
        $tipo != Null ? $infraestructura->tipo = $tipo : Null;
        $caracteristicas != Null ? $infraestructura->caracteristicas = $caracteristicas : Null;
        $observaciones != Null ? $infraestructura->observaciones = $observaciones : Null;

        $infraestructura->save();

        return redirect()->route('home')->with([]);

    }

    public function edit($id)
    {
        $user = Auth::user();
        $infraestructura = Infraestructura_Servicio::find($id);

        if($infraestructura == NULL) {
            return redirect()->route('home');
        }

        return view('infraestructura.edit',[
            'infraestructura' => $infraestructura
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => '',
            'caracteristicas' => '',
            'observaciones' => ''
        ]);

        $nombre = $request->nombre;
        $tipo = $request->tipo;
        $caracteristicas = $request->caracteristicas;
        $observaciones = $request->observaciones;

        // Obtenemos la infraestructura a editar
        $infraestructura_id = Infraestructura_Servicio::where('nombre', 'LIKE', $nombre)->first();
        $infraestructura_id = $infraestructura_id->id;
        $infraestructura = Infraestructura_Servicio::find($infraestructura_id);

        $nombre != Null ? $infraestructura->nombre = $nombre : Null;
        $tipo != Null ? $infraestructura->tipo = $tipo : Null;
        $caracteristicas != Null ? $infraestructura->caracteristicas = $caracteristicas : Null;
        $observaciones != Null ? $infraestructura->observaciones = $observaciones : Null;

        $infraestructura->save();

        return redirect()->route('home')->with([]);

    }

    public function delete($id)
    {
        $infraestructura = Infraestructura_Servicio::find($id);
        $infraestructura->delete();

        return redirect()->route('')->with([]);
    }

}
