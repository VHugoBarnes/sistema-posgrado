<?php

namespace App\Http\Middleware;

use App\Models\Tesis;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DirectorPermission
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
        $user_id = Auth::user()->id;
        $director = Tesis::where('director', $user_id)->get();

        if(count($director) >= 1) {
            return $next($request);
        } else {
            return redirect()->back();
        }
    }
}
