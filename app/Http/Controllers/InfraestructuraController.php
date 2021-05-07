<?php

namespace App\Http\Controllers;

use App\Models\Infraestructura_Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

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
            'nombre' => 'required|string|max:255|unique:infraestructura_servicio,nombre',
            'tipo' => '',
            'caracteristicas' => '',
            'observaciones' => ''
        ]);

        $nombre = $request->nombre;
        $tipo = $request->tipo;
        $caracteristicas = $request->caracteristicas;
        $observaciones = $request->observaciones;

        $infraestructura = new Infraestructura_Servicio;

        $infraestructura->nombre = $nombre;
        $infraestructura->tipo = $tipo != Null ? $tipo : '';
        $infraestructura->caracteristicas = $caracteristicas != Null ? $caracteristicas : '';
        $infraestructura->observaciones = $observaciones != Null ? $observaciones : '';

        $infraestructura->save();

        return redirect()->route('home')->with(['message'=>'Infraestructura creada correctamente']);

    }

    public function edit($id)
    {
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

        $id = $request->id;

        $request->validate([
            'nombre' => 'required|string|max:255|unique:infraestructura_servicio,nombre,'.$id,
            'tipo' => '',
            'caracteristicas' => '',
            'observaciones' => ''
        ]);

        $nombre = $request->nombre;
        $tipo = $request->tipo;
        $caracteristicas = $request->caracteristicas;
        $observaciones = $request->observaciones;

        // Obtenemos la infraestructura a editar
        $infraestructura = Infraestructura_Servicio::find($id);

        $infraestructura->nombre = $nombre;
        $infraestructura->tipo = $tipo != Null ? $tipo : '';
        $infraestructura->caracteristicas = $caracteristicas != Null ? $caracteristicas : '';
        $infraestructura->observaciones = $observaciones != Null ? $observaciones : '';

        $infraestructura->save();

        return redirect()->route('home')->with(['message'=>'La infraestructura ha sido actualizada correctamente']);

    }

    public function delete($id)
    {
        $infraestructura = Infraestructura_Servicio::find($id);
        
        if($infraestructura == Null) {
            return redirect()->route('home')->with(['message'=>'La infraestructura que quieres eliminar no existe']);
        }

        $infraestructura->delete();
        return redirect()->route('home')->with(['message'=>'La infraestructura ha sido eliminada correctamente']);
    }

}
