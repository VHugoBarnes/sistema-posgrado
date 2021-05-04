<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Role;

class RegisterPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $role_id = '';
        $user = Auth::user();

        foreach($user->role as $rol) {
            $role_id = $rol->pivot->role_id;
        }

        $role = Role::find($role_id);
        $role = $role->roles;

        // Aquí se puede mejorar trayendo los datos de la base de datos
        if($role == 'Administrador' || 
           $role == 'Jefe Posgrado' || 
           $role == 'Coordinador' || 
           $role == 'Asistente Coordinador') 
        {
            return $next($request);
        } else {
            return redirect('dashboard');
        }
    }
}
