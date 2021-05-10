<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Usuario;

use App\Rules\Genero;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstudianteController extends Controller
{
    /**
     * Messages:
     * The messages to send to the client
     */
    public $messages = [];

    public $options = ['S', 'N'];
    public $generos = [
        'none' => '',
        'mujer' => 'Mujer', 
        'hombre' => 'Hombre', 
        'otro' => 'Otro', 
        'prefiero-no-decirlo' => 'Prefiero no decirlo'
    ];

    public function __construct()
    {
        
    }

    public function edit()
    {
        // Conseguir el usuario identificado
        $user = Auth::user();
        $id = $user->id;
        $usuario = Usuario::find($id);

        // Conseguir id del estudiante
        $id_estudiante = $usuario->estudiante->id;
        $estudiante = Estudiante::find($id_estudiante);

        return view('estudiante.edit', [
            'generos' => $this->generos,
            'estudiante' => $estudiante
        ]);
    }

    public function update(Request $request)
    {
        // Conseguir el usuario identificado
        $user = Auth::user();
        $id = $user->id;
        $usuario = Usuario::find($id);

        // Conseguir id del estudiante
        $id_estudiante = $usuario->estudiante->id;
        $estudiante = Estudiante::find($id_estudiante);

        // Validación del formulario
        $validate = $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:usuarios,email,'.$id,
            'genero' => new Genero,
            'direccion' => 'required_if:exists:usuarios,direccion',
            'telefono' => 'max:13',

            'numero_control' => 'required|max:20',
            'generacion' => 'required|max:20',
            'nivel_estudios' => 'max:255',
            'becario' => '',
            'cvu' => 'required|max:100'
        ]);

        // Propiedades usuario
        $nombre = $request->nombre;
        $apellidos = $request->apellidos;
        $email = $request->email;
        $genero = $request->genero;
        $direccion = $request->direccion;
        $telefono = $request->telefono;
        // Propiedades estudiante
        $numero_control = $request->numero_control;
        $generacion = $request->generacion;
        $nivel_estudios = $request->nivel_estudios;
        $becario = $request->becario;
        $cvu = $request->cvu;

        // Actualizar datos en la tabla usuario
        $usuario->nombre = $nombre;
        $usuario->apellidos = $apellidos;
        $usuario->email = $email;
        $genero != 'none' ? $usuario->genero = $genero : Null;
        $direccion != Null ? $usuario->direccion = $direccion : Null;
        $telefono != Null ? $usuario->telefono = $telefono : Null;

        // Actualizar datos en la tabla estudiante
        $numero_control != Null ? $estudiante->numero_control = $numero_control : Null;
        $generacion != Null ? $estudiante->generacion = $generacion : Null ;
        $nivel_estudios != Null ? $estudiante->nivel_estudios = $nivel_estudios : Null;
        $estudiante->becario = $becario != NULL ? 'S' : 'N';
        $cvu != Null ? $estudiante->cvu = $cvu : Null;

        $usuario->save();
        $estudiante->save();

        return redirect()->route('home')->with(['message'=>'Estudiante actualizado correctamente']);
    }

    public function searchByFilter($filter)
    {
        
    }
}
