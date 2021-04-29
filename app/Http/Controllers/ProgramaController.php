<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramaController extends Controller
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
            'impacto' => 'string',
            'part_grupos_proyectos' => 'string',
            'servicios_prestados' => 'string',
            'datos_relevantes' => 'string',
            'orientacion' => 'required|boolval',
            'justificacion_orientacion' => 'string',
            'lineas_investigacion' => 'integer'
        ]);

        $programa = new Programa;

        $programa->nombre = $request->nombre;
        $programa->descripcion = $request->descripcion;
        $programa->part_grupos_proyectos = $request->part_grupos_proyectos;
        $programa->servicios_prestados = $request->servicios_prestados;
        $programa->datos_relevantes = $request->datos_relevantes;
        $programa->orientacion = $request->orientacion;
        $programa->justificacion_orientacion = $request->justificacion_orientacion;
        $programa->save();

        return redirect()->route('')->with([]);
    }

    public function edit($id)
    {
        $user = Auth::user();
        $programa = Programa::find($id);

        return redirect()->route('');
    }

    public function update(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'impacto' => 'string',
            'part_grupos_proyectos' => 'string',
            'servicios_prestados' => 'string',
            'datos_relevantes' => 'string',
            'orientacion' => 'required|boolval',
            'justificacion_orientacion' => 'string',
            'lineas_investigacion' => 'integer'
        ]);

        $id = $request->id;
        $nombre = $request->nombre;
        $impacto = $request->impacto;
        $part_grupos_proyectos = $request->part_grupos_proyectos;
        $servicios_prestados = $request->servicios_prestados;
        $orientacion = $request->orientacion;
        $justificacion_orientacion = $request->justificacion_orientacion;

        $programa = Programa::find($id);
        $programa->nombre = $nombre;
        $programa->impacto = $impacto;
        $programa->part_grupos_proyectos = $part_grupos_proyectos;
        $programa->servicios_prestados = $servicios_prestados;
        $programa->orientacion = $orientacion;
        $programa->justificacion_orientacion = $justificacion_orientacion;

        $programa->update();

        return redirect()->route('')->with([]);
    }

    public function delete($id)
    {
        $programa = Programa::find($id);
        $programa->delete();

        return redirect()->route('')->with([]);
    }
}
