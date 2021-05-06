<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Rules\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/**
 * Controlador para editar datos de usuarios de tipo
 * administrador, coordinador, jefe posgrado, etc.
 * Para usuarios tipo estudiante o docente ir a su propio controlador
 */
class UsuarioController extends Controller
{
    /**
     * Messages:
     * The messages to send to the client
     */
    public $messages = [];

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
        return view('user.edit', [
            'generos' => $this->generos
        ]);
    }

    public function update(Request $request)
    {
        // Conseguir el usuario identificado
        $user = Auth::user();
        $id = $user->id;

        $usuario = Usuario::find($id);

        // Validación del formulario
        $validate = $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:usuarios,email,'.$id,
            'genero' => new Genero,
            'direccion' => 'required_if:exists:usuarios,direccion',
            'telefono' => 'max:13'
        ]);

        $nombre = $request->nombre;
        $apellidos = $request->apellidos;
        $email = $request->email;
        $genero = $request->genero;
        $direccion = $request->direccion;
        $telefono = $request->telefono;

        $usuario->nombre = $nombre;
        $usuario->apellidos = $apellidos;
        $usuario->email = $email;
        $genero != 'none' ? $usuario->genero = $genero : Null;
        $direccion != Null ? $usuario->direccion = $direccion : Null;
        $telefono != Null ? $usuario->telefono = $telefono : Null;

        $usuario->save();

        return redirect()->route('')->with([]);
    }

    public function comiteTutorialRegister()
    {

    }
}
