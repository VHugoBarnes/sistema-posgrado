<?php

namespace App\Http\Middleware\Roles;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JefePermission
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
        $user = Auth::user();
        $role = getUserRole($user);

        // Aquí se puede mejorar trayendo los datos de la base de datos
        if($role == 'Jefe Posgrado') 
        {
            return $next($request);
        } else {
            return redirect('dashboard');
        }
    }
}
