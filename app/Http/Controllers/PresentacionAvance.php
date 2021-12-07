<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\Tesis;
use App\Models\Avance;
use App\Models\Usuario;
use App\Models\Estudiante;

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
            $estudiante_id = $t['estudiante']->id;
            $estudiante = Estudiante::find($estudiante_id);
            $usuario = Usuario::find($estudiante->usuario->id);
            if($usuario->avance === null) {
                array_push($estudiantes, $t['estudiante']);
            }
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
    
    public function editarfecha(){
        //Sacar el registro de la base de datos
        //Pasar a la vista el objeto y rellenar el formulario 

    }
    public function enviarReporte(){

        $usuario_id = Auth::user()->id;
        $usuario = Usuario::find($usuario_id);

        if($usuario->avance === null) {
            return redirect()->route('home');
        }

        $avance_id = $usuario->avance->id;
        $avance = Avance::find($avance_id);
        $subio_avance = false;
        $ruta_avance = $avance->ruta_avance;

        if($ruta_avance !== null) {
            $subio_avance = true;
        }


        return view('avance.enviar-reporte', [
            "estudiante_nombre" => $usuario->nombre . ' ' . $usuario->apellidos,
            "subio_avance" => $subio_avance,
            "ruta_avance" => $ruta_avance
        ]);
    }

    public function obtenerReporte(Request $request) {
        // Recoger id del estudiante autenticado
        $estudiante_id = Auth::user()->id;
        // Recoger el numero de control
        $numero_control = Estudiante::where('usuario_id', $estudiante_id)->pluck('numero_control')[0];

        return response()->file(storage_path('app/estudiantes/' . $numero_control . '/avance' . '/') . 'avance.pdf');
    }

    public function guardarReporte(Request $request){

        $validate = $this->validate($request, [
            "reporte" => 'required|mimes:pdf,docx'
        ]);
        $archivo_reporte = $request->file('reporte');

        $usuario_id = Auth::user()->id;
        $usuario = Usuario::find($usuario_id);

        $estudiante_id = $usuario->estudiante->id;
        $estudiante = Estudiante::find($estudiante_id);
        
        $avance_id = $usuario->avance->id;
        $avance = Avance::find($avance_id);

        $ruta = $estudiante->numero_control.'/avance/avance.pdf';

        if(Storage::exists($ruta)) {
            Storage::disk('estudiantes')->delete($ruta);
        }
        Storage::disk('estudiantes')->put($ruta, File::get($archivo_reporte));
        
        // Guardar ruta en base de datos
        $avance->ruta_avance = $ruta;
        $avance->save();

        return redirect()->route('home')->with(['message' => 'Reporte subido correctamente']);
    }

    public function verFecha(){
        $usuario = Auth::user();
        $id = $usuario->id;
        $usuario = Usuario::find($id);

        // Si existe un registro de avance para el usuario        
        if($usuario->avance) { // Tiene fecha asignada
            $avance_id = $usuario->avance->id;
            $avance = Avance::find($avance_id);
        } else { // No tiene fecha asignada
            $avance = false;
        }
        
        return view('avance.ver-fecha', [
            'avance' => $avance
        ]);
    }

    public function verFechas(){
        return view('avance.ver-fechasCor');
    }
    public function verTesis()
    {
        $usuario_id = Auth::user()->id;
        $usuario = Usuario::find($usuario_id);
        $tesis_id = $usuario->estudiante->tesis->id;
        $tesis = Tesis::find($tesis_id);

        $tesis_titulo = $tesis->titulo;
        $nombre_estudiante = $usuario->nombre . ' ' . $usuario->apellidos;

        $director = "Sin director";
        $codirector = "Sin codirector";
        $secretario = "Sin secretatio";
        $vocal = "Sin vocal";

        if($tesis->director !== null) {
            $usuario_director = Usuario::find($tesis->director);
            $director = $usuario_director->nombre . ' ' . $usuario_director->apellidos;
        }

        if($tesis->codirector !== null) {
            $usuario_codirector = Usuario::find($tesis->codirector);
            $codirector = $usuario_codirector->nombre . ' ' . $usuario_codirector->apellidos;
        }

        if($tesis->secretario !== null) {
            $usuario_secretario = Usuario::find($tesis->secretario);
            $secretario = $usuario_secretario->nombre . ' ' . $usuario_secretario->apellidos;
        }

        if($tesis->vocal !== null) {
            $usuario_vocal = Usuario::find($tesis->vocal);
            $vocal = $usuario_vocal->nombre . ' ' . $usuario_vocal->apellidos;
        }
 
        return view('avance.miembrosComite', [
            "tesis_titulo" => $tesis_titulo,
            "nombre_estudiante" => $nombre_estudiante,
            "director" => $director,
            "codirector" => $codirector,
            "secretario" => $secretario,
            "vocal" => $vocal,
        ]);
    }

    public function BuscadorDeAlumnos() {
        return view('avance.ver-reporte');
    }

    public function BuscarAlumno(Request $request){
        //recoge los datos del usuario se igual a la busqueda donde el rol sea (3 = estudiante)
        // $datosUsuario = Usuario::where('nombre', 'LIKE', "%$request->busqueda%")->where('role_id', 3)->get();
        $datosUsuario = Usuario::whereHas('role', function($u) {
            $u->where('nombre', 'LIKE', "%$request->busqueda%");
        })->get();

        $datosAlumno = [];

        // Recorrer datosUsuario
        foreach($datosUsuario as $key => $usuario) {
            $nombre_estudiante = $usuario['nombre'] . " " . $usuario['apellidos'];
            $estudiante_id = $usuario['estudiante']->id;
            $avance_id = $usuario['avance']->id;
            $tiene_avance = false;
            if($avance_id != null) {
                $avance = Avance::find($avance_id);
                if($avance->ruta_avance !== null) {
                    $tiene_avance = true;
                }
            }
            $datos = [
                'tiene_avance' => $tiene_avance,
                'nombre_estudiante' => $nombre_estudiante,
                'estudiante_id' => $estudiante_id
            ];
            array_push($datosAlumno, $datos);
        }
        
        return view('avance.ver-alumnos',[
            'alumnos' => $datosAlumno
        ]);
    }

    
    public function verReporte($estudiante_id) {
        // Recoger id del estudiante autenticado
        $estudiante_id = $estudiante_id;
        // Recoger el numero de control
        $numero_control = Estudiante::where('usuario_id', $estudiante_id)->pluck('numero_control')[0];

        return response()->file(storage_path('app/estudiantes/' . $numero_control . '/avance' . '/') . 'avance.pdf');
    }
}

