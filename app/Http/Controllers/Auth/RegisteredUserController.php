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
use App\Models\Role;

use App\Events\SendMail;

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
            'password' => Hash::make($request->password),
        ]);

        // Si se registro un usuario estudiante
        if ($request->tipo_usuario == 'Estudiante') {
            $estudiante = new Estudiante;
            $estudiante->usuario_id = $user->id;
            $estudiante->save();

        } 
        else if ($request->tipo_usuario == 'Docente') { // Si se registro un usuario docente
            $docente = new Docente;
            $docente->usuario_id = $user->id;
            $docente->save();
        }

        // Ingresar en la tabla pivot los id's correspondientes
        $role_id = Role::where('roles', 'like', $request->tipo_usuario)->first('id');
        $user->role()->attach($role_id);
        
        //event(new SendMail($user, $request->password));
        //Mail::to($request->email)->send(new ConfirmAccount($user, $request->password));

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

        // $sis_password = '';
        // $sis_password = env('SIS_PASSWORD');
        // echo "<pre> " , var_export($request->adminPassword) , " </pre>";
        // echo "<pre> " , var_export($sis_password) , " </pre>";
        // echo "<pre> " , var_export(env('SIS_PASSWORD')) , " </pre>";
        // die();
        
        if ($request->adminPassword != env('SIS_PASSWORD')) {
            return redirect()->route('registro-admin')
                ->with(['message' => $this->messages['denyPermission']]);
        }

        $user = Usuario::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Ingresar en la tabla pivot los id's correspondientes
        $role_id = Role::where('roles', 'like', 'Administrador')->first('id');        
        $user->role()->attach($role_id);

        //event(new SendMail($user, $request->password));
        //Mail::to($request->email)->send(new ConfirmAccount($user, $request->password));

        return redirect()->route('home')->with(['message' => $this->messages['adminCreated']]);
    }
}
