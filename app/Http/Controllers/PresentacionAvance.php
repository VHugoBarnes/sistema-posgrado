<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresentacionAvance extends Controller
{
    // Vista
    public function index(){
        return view('avance.index');
    }

    // Vista
    public function programarFecha(){
        return view('avance.programar-fecha');
    }

    public function guardarFecha(){

    }

    // Vista
    public function enviarReporte(){
        return view('avance.enviar-reporte');
    }

    public function guardarReporte(){

    }
}
