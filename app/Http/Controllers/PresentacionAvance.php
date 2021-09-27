<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresentacionAvance extends Controller
{
    //
    public function index(){
        return view('avance.index');
    }
}
