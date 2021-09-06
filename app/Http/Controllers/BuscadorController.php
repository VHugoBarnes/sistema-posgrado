<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Estudiante;
use App\Models\Role;
use App\Models\Usuario;
use App\Models\Tesis;

use Illuminate\Database\Eloquent\Builder;

class BuscadorController extends Controller {
    public function __construct() {
    }

    public function searchByFilter(Request $request) {
        //

        // Filtros
        $numero_control = '';
        $nombre = '';
        $cvu = '';
        $becario = '';
        $generacion = '';

        $estudiante = '';
        $tesis = '';

        isset($request->numero) ? $numero_control = $request->numero : null;
        isset($request->nombre) ? $nombre = $request->nombre : null;
        isset($request->cvu) ? $cvu = $request->cvu : null;
        isset($request->becario) ? $becario = $request->becario : null;
        isset($request->generacion) ? $generacion = $request->generacion : null;

        if (is_numeric($numero_control) && strlen($numero_control) >= 1) {

            $estudiante = Estudiante::where('numero_control', $numero_control)->first();
            $estudiante = $estudiante->id;

            $tesis = Tesis::where('estudiante_id', $estudiante)->first();

            
        } else if (strlen($nombre) >= 1 && preg_match('/[a-zA-Z]+/', $nombre)) {

            $estudiante_rol = Role::where('roles', 'LIKE', 'Estudiante')->pluck('id');

            $usuarios_estudiantes = Usuario::whereHas('role', function(Builder $query) use($estudiante_rol, $nombre) {
                $query->where('role_id',$estudiante_rol);
            })->get();
            
            foreach($usuarios_estudiantes as $estudiante) {
                if(strtolower($estudiante->nombre) == strtolower($nombre)) {
                    $estudiante_id = $estudiante->id;
                }
            }

            $tesis = Tesis::where('estudiante_id', $estudiante_id)->first();
            

        } else if (strlen($cvu) >= 1) {

            $estudiante = Estudiante::where('cvu', $cvu)->first();
            $estudiante = $estudiante->id;

            $tesis = Tesis::where('estudiante_id', $estudiante)->first();
        }

        if (strlen($becario) >= 1 && ($becario == 'true' || $becario == 'false')) {
            if (strlen($generacion) >= 1 && preg_match('/(20[0-9]{2})\-(20[0-9]{2})/', $generacion)) {
                $becario = $becario != 'false' ? 'S' : 'N';
                $estudiante = Estudiante::where('becario', $becario)
                                        ->where('generacion', $generacion)
                                        ->pluck('id');
                $tesis = Tesis::whereIn('estudiante_id', $estudiante)->get();
            }

            $becario = $becario != 'false' ? 'S' : 'N';
            $estudiante = Estudiante::where('becario', $becario)->pluck('id');
            $tesis = Tesis::whereIn('estudiante_id', $estudiante)->get();

        }
        if (strlen($generacion) >= 1 && preg_match('/(20[0-9]{2})\-(20[0-9]{2})/', $generacion)) {
            $becario = $becario != 'false' ? 'S' : 'N';
            $estudiante = Estudiante::where('generacion', $generacion)
                                    ->pluck('id');
            $tesis = Tesis::whereIn('estudiante_id', $estudiante)->get();
        }

        if(empty($estudiante) || empty($tesis)) {
            return redirect()->back();
        } else {
            echo "<pre> " , var_export($tesis) , " </pre>";
            die();
            return view('', [
                'tesis' => $tesis,
                'estudiante' => $estudiante
            ]);
        }
    }
}
