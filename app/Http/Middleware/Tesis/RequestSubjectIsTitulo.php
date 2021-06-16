<?php

namespace App\Http\Middleware\Tesis;

use App\Models\Estudiante;
use App\Models\Solicitud_Cambio;
use App\Models\Tesis;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestSubjectIsTitulo
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
        // Obtener el id del estudiante
        $estudiante_id = Auth::user()->id;
        $estudiante_id = Estudiante::where('usuario_id', $estudiante_id)->pluck('id');
        // Recoger la tesis del estudiante
        $tesis = Tesis::where('estudiante_id', $estudiante_id)->first();
        // Recoger el id de la solicitud
        $solicitud = Solicitud_Cambio::where('tesis_id', $tesis->id)->pluck('id');
        $solicitud = Solicitud_Cambio::find($solicitud);
        $solicitud = end($solicitud)[0];

        if($solicitud->asunto == 'titulo') {
            return $next($request);
        } else {
            return redirect()->back();
        }
    }
}
