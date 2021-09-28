<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresentacionAvance extends Controller
{
    //vista
    public function index(){
        return view('avance.index');
    }
    //vista
    public function programarFecha(){
        return view('avance.programar-fecha');
    }
    public function guardarfecha(){
        
    }
    public function enviarReporte(){
    } 
    public function guardarReporte(){
    } 

}
