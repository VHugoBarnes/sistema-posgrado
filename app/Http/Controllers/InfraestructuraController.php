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
        return view('');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'string',
            'caracteristicas' => 'string',
            'observaciones' => 'string'
        ]);

        $infraestructura = new Infraestructura_Servicio;

        $infraestructura->nombre = $request->nombre;
        $infraestructura->tipo = $request->tipo;
        $infraestructura->caractetisticas = $request->caractetisticas;
        $infraestructura->observaciones = $request->observaciones;
        $infraestructura->save();

        return redirect()->route('')->with([]);

    }

    public function edit($id)
    {
        $user = Auth::user();
        $infraestructura = Infraestructura_Servicio::find($id);

        return redirect()->route('');
    }

    public function update(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'string',
            'caracteristicas' => 'string',
            'observaciones' => 'string'
        ]);

        $id = $request->id;
        $nombre = $request->nombre;
        $tipo = $request->tipo;
        $caracteristicas = $request->caracteristicas;
        $observaciones = $request->observaciones;
        
        $infraestructura = Infraestructura_Servicio::find($id);
        $infraestructura->nombre = $nombre;
        $infraestructura->tipo = $tipo;
        $infraestructura->caracteristicas = $caracteristicas;
        $infraestructura->observaciones = $observaciones;

        $infraestructura->update();

        return redirect()->route('')->with([]);

    }

    public function delete($id)
    {
        $infraestructura = Infraestructura_Servicio::find($id);
        $infraestructura->delete();

        return redirect()->route('')->with([]);
    }

}
