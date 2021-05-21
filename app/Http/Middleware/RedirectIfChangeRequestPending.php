<?php

namespace App\Http\Middleware;

use App\Models\Estudiante;
use App\Models\Solicitud_Cambio;
use App\Models\Tesis;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfChangeRequestPending
{
    /**
     * Verifica si ya existe una o más solicitudes.
     * Siempre revisa la última solicitud hecha, ya que es la más actual.
     * Si la solicitud actual tiene estatus de pendiente, en revisión o preparando.
     * 
     * Usado en controladores para crear una nueva solicitud de cambio.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Recoger id del estudiante autenticado
        $estudiante_id = Auth::user()->id;
        $estudiante_id = Estudiante::where('usuario_id', $estudiante_id)->pluck('id');
        // Recoger la tesis del estudiante
        $tesis = Tesis::where('estudiante_id', $estudiante_id)->first();

        // Verificar si tiene una solicitud hecha
        $solicitud = Solicitud_Cambio::where('tesis_id', $tesis->id)->get();

        if(count($solicitud) >= 1 && (
        end($solicitud)[0]->estatus == 'Pendiente' ||
        end($solicitud)[0]->estatus == 'En Revision' ||
        end($solicitud)[0]->estatus == 'Preparando')) {
            return redirect()->route('obtener-solicitud');
        } else {
            return $next($request);
        }
        
    }
}
