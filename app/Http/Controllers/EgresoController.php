<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Linea_Investigacion;
use App\Models\Programa;
use Illuminate\Support\Facades\Auth;

class EgresoController extends Controller
{
    public function index()
   
    {
        return view('egreso.subir'); /** No se donde yo saque esto -en proceso-   */
    }
}
