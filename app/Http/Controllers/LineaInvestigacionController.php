<?php

namespace App\Http\Controllers;

use App\Models\Linea_Investigacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LineaInvestigacionController extends Controller
{
    public function __construct()
    {
        
    }

    public function getAll()
    {
        $lineas = Linea_Investigacion::all();

        return view('linea.view',[
            'lineas' => $lineas
        ]);
    }

    public function create()
    {
        return view('linea.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:lineas_investigacion,nombre',
            'descripcion' => ''
        ]);

        $nombre = $request->nombre;
        $descripcion = $request->descripcion;

        $linea = new Linea_Investigacion;

        $linea->nombre = $nombre;
        $descripcion != Null ? $linea->descripcion = $descripcion : Null;
        $linea->save();

        return redirect()->route('home')->with(['message'=>'Linea de investigación creada correctamente']);
    }

    public function edit($id)
    {
        $linea = Linea_Investigacion::find($id);

        if($linea == NULL) {
            return redirect()->route('home');
        }

        return view('linea.edit', [
            'linea' => $linea
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'nombre' => 'required|string|max:255|unique:lineas_investigacion,nombre,'.$id,
            'descripcion' => ''
        ]);

        $nombre = $request->nombre;
        $descripcion = $request->descripcion;

        $linea = Linea_Investigacion::find($id);

        $linea->nombre = $nombre;
        $linea->descripcion = $descripcion != Null ? $descripcion : '';

        $linea->save();

        return redirect()->route('home')->with(['message'=>'Linea de investigación actualizada correctamente']);
    }
    
}
