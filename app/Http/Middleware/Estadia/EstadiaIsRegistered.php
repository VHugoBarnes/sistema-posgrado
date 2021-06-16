<?php

namespace App\Http\Middleware\Estadia;

use App\Models\Estadia_Tecnica;
use App\Models\Estudiante;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstadiaIsRegistered
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
        $usuario_id = Auth::user()->id;
        $estudiante_id = Estudiante::where('usuario_id', $usuario_id)->pluck('id')[0];

        $estadia_id = Estadia_Tecnica::where('estudiante_id', $estudiante_id)->pluck('id');
        

        if(count($estadia_id) == 0) {
            return redirect()->back();
        } else {
            return $next($request);
        }
    }
}
