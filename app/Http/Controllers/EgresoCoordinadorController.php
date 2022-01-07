<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Linea_Investigacion;
use App\Models\Programa;
use Illuminate\Support\Facades\Auth;

class EgresoCoordinadorController extends Controller
{
  
    public function index(){
       // return view('egreso.revisar'); 
    }
    public function revisar(){
        return view('egreso.subir'); }
}

