<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tesis;
use App\Models\Avance;
use App\Models\Usuario;

class PresentacionAvance extends Controller{
    //vista
    public function index(){
        return view('avance.index');
    }
    //vista
    public function programarFecha(){
        $tesis = Tesis::where('director', '!=', null)->get();
        $estudiantes = [];
        foreach ($tesis as $key => $t) {
            array_push($estudiantes, $t['estudiante']);
        }
        return view('avance.programar-fecha', [
            "estudiantes"=> $estudiantes  
        ]);
    }
    public function guardarfecha(Request $request){
        // Validación del formulario
        $validate = $this->validate($request, [
        'numero_control' => 'required|numeric',
        'fecha' => 'required|date',
        'hora' => 'required|string'
        ]);
        // Esta linea crea un objeto de tipo Avance (Modelo)
        $avance = new Avance;
        // Con -> asigno cada campo del modelo Avance
        $avance->usuario_id = $request->numero_control;
        $avance->fecha = $request->fecha;
        $avance->hora = $request->hora;
        $avance->comentarios = $request->comentarios;
        // El ->save(); guarda los campos que asigno en la base de datos.
        $avance->save();
        return redirect()->route('presentacion-avance.programar-fecha')->with(['color'=>'green','message'=>'Fecha programada correctamente']);
    }
    //08/11/21 cambio
    public function editarfecha(){
        //Sacar el registro de la base de datos
        //Pasar a la vista el objeto y rellenar el formulario 

    }
    public function enviarReporte(){
        return view('avance.enviar-reporte');
    } 
    public function guardarReporte(){
            
    } 
    public function verFecha(){
        $usuario = Auth::user();
        $id = $usuario->id;
        $usuario = Usuario::find($id);

        if($usuario->avance) {
            $avance_id = $usuario->avance->id;
            $avance = Avance::find($avance_id)->first();
        } else {
            $avance = false;
        }
        
        return view('avance.ver-fecha', [
            'avance' => $avance
        ]);
    }


}
