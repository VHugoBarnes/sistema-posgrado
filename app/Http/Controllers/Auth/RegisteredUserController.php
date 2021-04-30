<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmAccount;
use App\Models\Docente;
use App\Models\Estudiante;

class RegisteredUserController extends Controller {

    /**
     * Messages:
     * The messages to send to the client
     */
    public $messages = [
        'userCreated' => 'Usuario creado correctamente, se le ha enviado un correo con su contraseña',
        'adminCreated' => 'Administrador creado correctamente, se le ha enviado un correo con su contraseña',
        'denyPermission' => 'Accion denegada'
    ];

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'tipo_usuario' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = Usuario::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'tipo_usuario' => $request->tipo_usuario,
            'password' => Hash::make($request->password),
        ]);

        // Si se registro un usuario estudiante
        if ($request->tipo_usuario == 'Estudiante') {
            $estudiante = new Estudiante;

            $estudiante->id_usuario = $user->id;
            $estudiante->numero_control = '0000000';
            $estudiante->programa = 'Maestría';
            $estudiante->nivel_estudios = 'Licenciatura';

            $estudiante->save();
        } else if ($request->tipo_usuario == 'Docente') { // Si se registro un usuario docente
            $docente = new Docente;
            $docente->id_usuario = $user->id;
            $docente->save();
        }

        event(new Registered($user));

        // Enviar email
        Mail::to($request->email)->send(new ConfirmAccount($user, $request->password));

        return redirect()->route('home')->with(['message' => $this->messages['userCreated']]);
    }

    public function createAdmin() {
        return view('auth.registerAdmin');
    }

    public function storeAdmin(Request $request) {
        $request->validate([
            'adminPassword' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if ($request->adminPassword != env('SIS_PASSWORD')) {
            return redirect()->route('register-admin')->with(['message' => $this->messages['denyPermission']]);
        }

        $user = Usuario::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->nombre,
            'email' => $request->email,
            'tipo_usuario' => 'Administrador',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Mail::to($request->email)->send(new ConfirmAccount($user, $request->password));

        return redirect()->route('home')->with(['message' => $this->messages['adminCreated']]);
    }
}
