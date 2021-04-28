<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $tipo_usuario = Auth::user()->tipo_usuario;
        if($tipo_usuario == 'Administrador' || 
           $tipo_usuario == 'Jefe Posgrado' || 
           $tipo_usuario == 'Coordinador' || 
           $tipo_usuario == 'Asistente Coordinador') 
        {
            return $next($request);
        } else {
            return redirect('dashboard');
        }
    }
}
