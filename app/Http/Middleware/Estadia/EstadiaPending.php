<?php

namespace App\Http\Middleware\Estadia;

use App\Models\Estadia_Tecnica;
use Closure;
use Illuminate\Http\Request;

class EstadiaPending
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
        $estadia_id = $request->id;
        $estadia = Estadia_Tecnica::find($estadia_id);

        if($estadia == null) {
            return redirect()->back();
        }

        if($estadia->estatus == 'Pendiente') {
            return $next($request);
        } else {
            return redirect()->back();
        }

    }
}
