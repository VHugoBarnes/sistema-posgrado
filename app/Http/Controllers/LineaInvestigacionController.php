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
        
    }

    public function create()
    {
        return view('');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'string'
        ]);

        $linea = new Linea_Investigacion;

        $linea->nombre = $request->nombre;
        $linea->descripcion = $request->descripcion;
        $linea->save();

        return redirect()->route('')->with([]);
    }

    public function edit($id)
    {
        $user = Auth::user();
        $linea = Linea_Investigacion::find($id);

        return redirect()->route('');
    }

    public function update(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'string'
        ]);

        $id = $request->id;
        $nombre = $request->nombre;
        $descripcion = $request->descripcion;

        $linea = Linea_Investigacion::find($id);
        $linea->nombre = $nombre;
        $linea->descripcion = $descripcion;

        $linea->update();

        return redirect()->route('')->with([]);
    }

    public function delete($id)
    {
        $linea = Linea_Investigacion::find($id);
        $linea->delete();

        return redirect()->route('')->with([]);
    }
}
