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
        return view('linea.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => ''
        ]);

        $nombre = $request->nombre;
        $descripcion = $request->descripcion;

        $linea = new Linea_Investigacion;

        $linea->nombre = $nombre;
        $descripcion != Null ? $linea->descripcion = $descripcion : Null;
        $linea->save();

        return redirect()->route('home')->with([]);
    }

    public function edit($id)
    {
        $user = Auth::user();
        $linea = Linea_Investigacion::find($id);

        if($linea == NULL) {
            return redirect()->route('home');
        }

        return redirect()->route('linea.edit', [
            'linea' => $linea
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'string'
        ]);

        $nombre = $request->nombre;
        $descripcion = $request->descripcion;

        $linea_id = Linea_Investigacion::where('nombre', 'LIKE', $nombre)->first();
        $linea_id = $linea_id->id;
        $linea = Linea_Investigacion::find($linea_id);

        $linea->nombre = $nombre;
        $linea->descripcion = $descripcion;

        $linea->save();

        return redirect()->route('home')->with([]);
    }

    public function delete($id)
    {
        $linea = Linea_Investigacion::find($id);
        $linea->delete();

        return redirect()->route('')->with([]);
    }
}
