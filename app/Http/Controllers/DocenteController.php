<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Usuario;
use App\Rules\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocenteController extends Controller
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

        // Conseguir id del docente
        $id_docente = $usuario->docente->id;
        $docente = Docente::find($id_docente);

        return view('docente.edit', [
            'generos' => $this->generos,
            'docente' => $docente
        ]);
    }

    public function update(Request $request)
    {
        // Conseguir el usuario identificado
        $user = Auth::user();
        $id = $user->id;
        $usuario = Usuario::find($id);

        // Conseguir id del docente
        $id_docente = $usuario->docente->id;
        $docente = Docente::find($id_docente);

        // Validación del formulario
        $validate = $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:usuarios,email,'.$id,
            'genero' => new Genero,
            'direccion' => 'required_if:exists:usuarios,direccion',
            'telefono' => 'max:13',

            'sni' => '',
            'catedras' => '',
            'tipo_investigador' => 'max:255',
            'nivel_academico' => 'max:255',
            'puesto' => 'max:255',
            'jornada' => 'max:255',
            'publicaciones' => 'max:255',
            'cursos' => 'max:255'
        ]);

        // Propiedades usuario
        $nombre = $request->nombre;
        $apellidos = $request->apellidos;
        $email = $request->email;
        $genero = $request->genero;
        $direccion = $request->direccion;
        $telefono = $request->telefono;

        // Propiedades docente
        $sni = $request->sni;
        $catedras = $request->catedras;
        $tipo_investigador = $request->tipo_investigador;
        $nivel_academico = $request->nivel_academico;
        $puesto = $request->puesto;
        $jornada = $request->jornada;
        $publicaciones = $request->publicaciones;
        $cursos = $request->cursos;

        // Actualizar datos en la tabla usuario
        $usuario->nombre = $nombre;
        $usuario->apellidos = $apellidos;
        $usuario->email = $email;
        $genero != 'none' ? $usuario->genero = $genero : Null;
        $direccion != Null ? $usuario->direccion = $direccion : Null;
        $telefono != Null ? $usuario->telefono = $telefono : Null;

        // Actualizar datos en la tabla docente
        $docente->sni = $sni != Null ? 'S' : 'N';
        $docente->catedras = $catedras != Null ? 'S' : 'N';
        $tipo_investigador != Null ? $docente->tipo_investigador = $tipo_investigador : Null;
        $nivel_academico != Null ? $docente->nivel_academico = $nivel_academico : Null;
        $puesto != Null ? $docente->puesto = $puesto : Null;
        $jornada != Null ? $docente->jornada = $jornada : Null;
        $publicaciones != Null ? $docente->publicaciones = $publicaciones : Null;
        $cursos != Null ? $docente->cursos = $cursos : Null;

        $usuario->save();
        $docente->save();

        return redirect()->route('')->with([]);
    }
}
