<?php

namespace App\Http\Controllers;

use App\Models\Linea_Investigacion;
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
        $lineas = Linea_Investigacion::all();
        return view('programa.create',[
            'lineas' => $lineas
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'impacto' => '',
            'part_grupos_proyectos' => '',
            'servicios_prestados' => '',
            'datos_relevantes' => '',
            'orientacion' => '',
            'justificacion_orientacion' => '',
            'lineas_investigacion' => 'integer'
        ]);

        $programa = new Programa;

        $nombre = $request->nombre;
        $impacto = $request->impacto;
        $part_grupos_proyectos = $request->part_grupos_proyectos;
        $servicios_prestados = $request->servicios_prestados;
        $datos_relevantes = $request->datos_relevantes;
        $orientacion = $request->orientacion;
        $justificacion_orientacion = $request->justificacion_orientacion;
        $lineas_investigacion = $request->lineas_investigacion;

        $programa->nombre = $request->nombre;
        $programa->impacto = $impacto != Null ? $impacto : '';
        $programa->part_grupos_proyectos = $part_grupos_proyectos != null ? $part_grupos_proyectos : '';
        $programa->servicios_prestados = $servicios_prestados != null ? $servicios_prestados : '';
        $programa->datos_relevantes = $datos_relevantes != null ? $datos_relevantes : '';
        $programa->orientacion = $orientacion != null ? 'S' : 'N';
        $programa->justificacion_orientacion = $justificacion_orientacion != null ? $justificacion_orientacion : '';
        $programa->save();

        $linea_id = Linea_Investigacion::find($lineas_investigacion);

        if($linea_id == NULL) {
            $programa->lineas_investigacion()->attach(1);
        } else {
            $programa->lineas_investigacion()->attach($linea_id);
        }

        return redirect()->route('home')->with(['message'=>'Programa creado exitosamente']);
    }

    public function edit($id)
    {
        $lineas = Linea_Investigacion::all();

        if($lineas == null) {
            return redirect()->route('home');
        }

        $programa = Programa::find($id);
        $id_linea_programa = 0;
        foreach($programa->lineas_investigacion as $linea) {
            $id_linea_programa = $linea->pivot->linea_investigacion_id;
        }

        return view('programa.edit',[
            'programa' => $programa,
            'lineas' => $lineas,
            'id_linea_programa' => $id_linea_programa
        ]);
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

        return redirect()->route('home')->with(['message'=>'Programa actualizado correctamente']);
    }

    public function delete($id)
    {
        $programa = Programa::find($id);
        $programa->delete();

        return redirect()->route('')->with([]);
    }
}
