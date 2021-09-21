<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;

class CambiarPassword extends Controller
{
    //

    public function update(Request $request)
    {
        $request->validate([
            'old_pwd' => 'required|min:8|max:256',
            'new_pwd' => 'required|min:8|max:256',
        ]);

        $usuario_id = Auth::user();
        $usuario_id = $usuario_id->id;
        $usuario = Usuario::find($usuario_id);

        if(!Hash::check($request->old_pwd, $usuario->password)) {
            return redirect()->route('editar-usuario')
                ->with([
                    'status' => 'Contraseña incorrecta, no se pudo cambiar la contraseña',
                    'color' => 'red'
                ]);
        }

        Usuario::find(Auth::user()->id)->update(['password'=> Hash::make($request->new_pwd)]);

        return redirect()->route('editar-usuario')->with([
            'status' => 'Contraseña actualizada', 
            'color' => 'green'
        ]);
    }
}
