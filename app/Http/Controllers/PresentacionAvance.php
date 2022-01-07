<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\Tesis;
use App\Models\Avance;
use App\Models\Role;
use App\Models\Usuario;
use App\Models\Estudiante;

use Illuminate\Database\Eloquent\Builder;

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
    
    public function editarfecha(Request $request, $estudiante_id){
        $validate = $this->validate($request, [
          'fecha' => 'required|date',
          'hora' => 'required|string'
        ]);

        // Obtener estudiante
        $estudiante = Estudiante::find($estudiante_id);

        if($estudiante == null) {
          return redirect()->route('dashboard')->with(['message' => 'Usuario estudiante no encontrado', 'color' => 'red']);
        }

        // Obtener su avance
        $avance_id = $estudiante->usuario->avance->id;
        if($avance_id == null) {
          return redirect()->route('dashboard')->with(['message' => 'El estudiante aún no tiene asignada una fecha, por ende no se puede editar', 'color' => 'red']);
        }

        $avance = Avance::find($avance_id);
        $avance->fecha = $request->fecha;
        $avance->hora = $request->hora;

        $avance->save();
        return redirect()->route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $estudiante_id])->with(['message' => 'Hora y fecha actualizados correctamente', 'color' => 'blue']);

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

        return redirect()->route('presentacion-avance.ver-fecha')->with(['message' => 'Reporte subido correctamente', 'color' => 'green']);
    }

    public function verFecha() {
        $usuario = Auth::user();
        $id = $usuario->id;
        $usuario = Usuario::find($id);

        $estudiante = Estudiante::where('usuario_id', $id)->first();
        $estudiante_id = $estudiante->id;

        $documento_subido = false;
        $comentario_director = '';
        $comentario_secretario = '';
        $comentario_vocal = '';

        // Si existe un registro de avance para el usuario        
        if($usuario->avance) { // Tiene fecha asignada
          $avance_id = $usuario->avance->id;
          $avance = Avance::find($avance_id);

          if($avance->ruta_avance != null) {
            $documento_subido = true;
          }

          if($avance->comentario_director != null) {
            $comentario_director = $avance->comentario_director;
          }
          if($avance->comentario_secretario != null) {
            $comentario_secretario = $avance->comentario_secretario;
          }
          if($avance->comentario_vocal != null) {
            $comentario_vocal = $avance->comentario_vocal;
          }

        } else { // No tiene fecha asignada
            $avance = false;
        }

        // Verificar si el pdf ya ha sido generado para poder descargarlo y subirlo firmado
        $documento_evaluacion_generado = false;
        if(Storage::exists('estudiantes/' . $estudiante->numero_control . '/avance/acta_calificacion.pdf')) {
            $documento_evaluacion_generado = true;
        }
        
        return view('avance.ver-fecha', [
            'avance' => $avance,
            'documento_subido' => $documento_subido,
            'estudiante_id' => $estudiante_id,
            'documento_evaluacion_generado' => $documento_evaluacion_generado,
            'comentario_director' => $comentario_director,
            'comentario_secretario' => $comentario_secretario,
            'comentario_vocal' => $comentario_vocal,
        ]);
    }

    public function verTesis() {
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

    public function resultadoBusqueda($alumnos) {
        return view('avance.ver-alumnos', ['alumnos' => $alumnos]);
    }

    public function BuscarAlumno(Request $request) {
        //recoge los datos del usuario se igual a la busqueda donde el rol sea (3 = estudiante)
        // $datosUsuario = Usuario::where('nombre', 'LIKE', "%$request->busqueda%")->where('role_id', 3)->get();
        $estudiante_rol = Role::where('roles', 'LIKE', 'Estudiante')->pluck('id');

        $busqueda = $request->busqueda;

        $datosUsuarios = Usuario::where('nombre', 'LIKE', "%$busqueda%")->orWhere('apellidos', 'LIKE', "%$busqueda%")->get();

        $soloEstudiantes = [];
        foreach($datosUsuarios as $key => $usuario) {
            if($usuario['estudiante'] != null) {
                array_push($soloEstudiantes, $usuario);
            }
        }

        $datosAlumno = [];

        // Recorrer datosUsuario
        foreach($soloEstudiantes as $key => $usuario) {
            $nombre_estudiante = $usuario['nombre'] . " " . $usuario['apellidos']; 
            $estudiante_id = $usuario['estudiante']->id;
            $avanca_doc = $usuario['avance'];
            $tiene_avance = false;
            $fecha_programada = 'Sin fecha programada para presentar avance';
            if($avanca_doc != null) {
                $avance = Avance::find($usuario['avance']->id);
                if($avance->ruta_avance !== null) {
                    $tiene_avance = true;
                }
                $fecha_programada = "Fecha programada para presentar avance: $avance->fecha - $avance->hora";
            }
            $datos = [
                'tiene_avance' => $tiene_avance,
                'nombre_estudiante' => $nombre_estudiante,
                'estudiante_id' => $estudiante_id,
                'fecha_programada' => $fecha_programada
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
        $numero_control = Estudiante::find($estudiante_id)->pluck('numero_control')[0];

        return response()->file(storage_path('app/estudiantes/' . $numero_control . '/avance' . '/') . 'avance.pdf');
    }

    //! nuevo
    public function verificarAvanceEvaluado($estudiante_id) {
        // Obtener estudiante
        $estudiante = Estudiante::find($estudiante_id);
        if($estudiante == null) {
            return false;
        }

        // Obtener avance
        $tiene_avance = $estudiante->usuario->avance;
        if($tiene_avance == null) {
            return false;
        }
        $estudiante_usuario = Usuario::find($estudiante->usuario->id);
        $avance = Avance::find($estudiante_usuario->avance->id);

        // Verificar si el comité ya lo evaluó
        $preguntas = json_decode($avance->preguntas);

        if($preguntas == null) {
            return false;
        }

        // Pregunta 1
        if($preguntas->pregunta_1->director == "" || $preguntas->pregunta_1->secretario == "" || $preguntas->pregunta_1->vocal == "") {
          return false;
        }
        // Pregunta 2
        if($preguntas->pregunta_2->director == "" || $preguntas->pregunta_2->secretario == "" || $preguntas->pregunta_2->vocal == "") {
          return false;
        }
        // Pregunta 3
        if($preguntas->pregunta_3->director == "" || $preguntas->pregunta_3->secretario == "" || $preguntas->pregunta_3->vocal == "") {
          return false;
        }
        // Pregunta 4
        if($preguntas->pregunta_4->director == "" || $preguntas->pregunta_4->secretario == "" || $preguntas->pregunta_4->vocal == "") {
          return false;
        }
        // Pregunta 5
        if($preguntas->pregunta_5->director == "" || $preguntas->pregunta_5->secretario == "" || $preguntas->pregunta_5->vocal == "") {
          return false;
        }
        // Pregunta 6
        if($preguntas->pregunta_6->director == "" || $preguntas->pregunta_6->secretario == "" || $preguntas->pregunta_6->vocal == "") {
          return false;
        }
        // Pregunta 7
        if($preguntas->pregunta_7->director == "" || $preguntas->pregunta_7->secretario == "" || $preguntas->pregunta_7->vocal == "") {
          return false;
        }
        // Pregunta 8
        if($preguntas->pregunta_8->director == "" || $preguntas->pregunta_8->secretario == "" || $preguntas->pregunta_8->vocal == "") {
          return false;
        }

        return true;
    }

    public function verReportesComite() {
        // Obtener id del usuario
        $usuario_id = Auth::user()->id;

        // Traer tesis donde el docente sea parte de un comité tutorial
        $estudiantes_id = Tesis::where('director', $usuario_id)
            ->orWhere('codirector', $usuario_id)
            ->orWhere('secretario', $usuario_id)
            ->orWhere('vocal', $usuario_id)
            ->pluck('estudiante_id');

        $datosEstudiantes = [];
        foreach($estudiantes_id as $key => $estudiante_id) {
            $estudiante = Estudiante::find($estudiante_id);
            $tiene_avance = false;
            $usuario_id = $estudiante->usuario->id;
            $usuario = Usuario::find($usuario_id);

            $avance = $usuario->avance;
            $fecha_programada = 'Sin fecha programada para presentar avance';
            if($avance != null) {
                $avance = Avance::find($usuario['avance']->id);
                if($avance->ruta_avance !== null) {
                    $tiene_avance = true;
                }
                $fecha_programada = "Fecha programada para presentar avance: $avance->fecha - $avance->hora";
            }

            array_push($datosEstudiantes, [
                'nombre_estudiante' => $estudiante->usuario->nombre . ' ' . $estudiante->usuario->apellidos,
                'tiene_avance' => $tiene_avance,
                'estudiante_id' => $estudiante->id,
                'fecha_programada' => $fecha_programada
            ]);
        }

        return view('avance.ver-reportes-comite', [
            'estudiantes' => $datosEstudiantes
        ]);
        
    }

    public function detalleReporte($estudiante_id) {

        // Obtener estudiante
        $estudiante = Estudiante::find($estudiante_id);
        if($estudiante == null) {
            return redirect()->route('dashboard');
        }

        $director_id = $estudiante->tesis->director;
        $director_usuario;
        $director_nombre = 'Sin director';
        if($director_id != null) {
            $director_usuario = Usuario::find($director_id);
            $director_nombre = $director_usuario->nombre . ' ' . $director_usuario->apellidos;
        }

        $codirector_id = $estudiante->tesis->codirector;
        $codirector_usuario;
        $codirector_nombre = 'Sin codirector';
        if($codirector_id != null) {
            $codirector_usuario = Usuario::find($codirector_id);
            $codirector_nombre = $codirector_usuario->nombre . ' ' . $codirector_usuario->apellidos;
        }

        $secretario_id = $estudiante->tesis->secretario;
        $secretario_usuario;
        $secretario_nombre = 'Sin secretario';
        if($secretario_id != null) {
            $secretario_usuario = Usuario::find($secretario_id);
            $secretario_nombre = $secretario_usuario->nombre . ' ' . $secretario_usuario->apellidos;
        }

        $vocal_id = $estudiante->tesis->vocal;
        $vocal_usuario;
        $vocal_nombre = 'Sin vocal';
        if($vocal_id != null)  {
            $vocal_usuario = Usuario::find($vocal_id);
            $vocal_nombre = $vocal_usuario->nombre . ' ' . $vocal_usuario->apellidos;
        }

        $fecha_hora = 'Sin fecha programada para presentar avance';

        // Obtener avance
        $avance = Avance::where('usuario_id', $estudiante->usuario->id)->first();
        $avance_subido = false;
        
        if($avance != null) {
            $fecha_hora = $avance['fecha'] . ' a las ' . $avance['hora'] . ' horas';
            if($avance->ruta_avance != null) {
                $avance_subido = true;
            }
        }

        // Obtener role del usuario visitante
        $usuario = Usuario::find(Auth::user()->id);
        $role = getUserRole($usuario);

        // Ver si el usuario pertenece al comité tutorial
        $es_director = ($usuario->id == $director_id) ? true : false;
        $es_secretario = ($usuario->id == $secretario_id) ? true : false;
        $es_vocal = ($usuario->id == $vocal_id) ? true : false;

        // Verificar si las calificaciones están completadas para generar el pdf
        $calificaciones_hechas = $this->verificarAvanceEvaluado($estudiante_id);

        // Verificar si el pdf ya ha sido generado para poder descargarlo y subirlo firmado
        $documento_generado = false;
        if(Storage::exists('estudiantes/' . $estudiante->numero_control . '/avance/acta_calificacion.pdf')) {
            $documento_generado = true;
        }

        return view('avance.avanceDetalle', [
            'estudiante_id' => $estudiante->id,
            'nombre_estudiante' => $estudiante->usuario->nombre . ' ' . $estudiante->usuario->apellidos,
            'director' => $director_nombre,
            'codirector' => $codirector_nombre,
            'secretario' => $secretario_nombre,
            'vocal' => $vocal_nombre,
            'fecha_hora' => $fecha_hora,
            'avance_subido' => $avance_subido,
            'role' => $role,
            'es_director' => $es_director,
            'es_secretario' => $es_secretario,
            'es_vocal' => $es_vocal,
            'calificaciones_hechas' => $calificaciones_hechas,
            'documento_generado' => $documento_generado
        ]);
    }

    public function evaluarReporte(Request $request, $estudiante_id) {

        $validate = $this->validate($request, [
            'pregunta_1' => 'integer|digits_between:0,100',
            'pregunta_2' => 'integer|digits_between:0,100',
            'pregunta_3' => 'integer|digits_between:0,100',
            'pregunta_4' => 'integer|digits_between:0,100',
            'pregunta_5' => 'integer|digits_between:0,100',
            'pregunta_6' => 'integer|digits_between:0,100',
            'pregunta_7' => 'integer|digits_between:0,100',
            'pregunta_8' => 'integer|digits_between:0,100',
        ]);

        // Obtener el usuario que evaluó
        $usuario = Usuario::find(Auth::user()->id);
        if($usuario == null) {
            return redirect()->route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $estudiante_id])->with(['message' => 'Usuario no encontrado', 'color' => 'red']);
        }

        // Obtener el estudiante
        $estudiante = Estudiante::find($estudiante_id);
        if($estudiante == null) {
            return redirect()->route('dashboard')->with(['message' => 'Estudiante no encontrado', 'color' => 'red']);
        }

        // Verificar que el usuario sea parte del comité tutorial de la tesis del estudiante
        $tesis = Tesis::find($estudiante->tesis->id);
        if($tesis == null) {
            return redirect()->route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $estudiante_id])->with(['message' => 'El estudiante no cuenta aún con un tema de tesis', 'color', 'red']);
        }

        $role;
        if(($tesis->director == $usuario->id)) {
            $role = 'director';
        }

        if(($tesis->secretario == $usuario->id)) {
          $role = 'secretario';
        }

        if(($tesis->vocal == $usuario->id)) {
          $role = 'vocal';
        }

        if(!isset($role)) {
          return redirect()->route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $estudiante_id])->with(['message' => 'No eres miembro del comité de la tesis de este estudiante', 'color', 'red']);
        }

        // Verificar que el estudiante tenga programado la presentación de avance
        if($estudiante->usuario->avance == null) {
          return redirect()->route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $estudiante_id])->with([
              'message' => 'El estudiante aún no tiene asignada una fecha para presentar su avance',
              'color' => 'red'
          ]);
        }

        // Obtener avance
        $avance = Avance::find($estudiante->usuario->avance->id);

        // Obtener preguntas
        $preguntas;
        if($avance->preguntas != null) {
            $preguntas = $avance->preguntas;
            $preguntas = json_decode($preguntas);
        } else {
            // Si no hay preguntas respondidas aún, crear un JSON
            $preguntas = '{
                "pregunta_1": {
                    "director": "",
                    "secretario": "",
                    "vocal": ""
                },
                "pregunta_2": {
                    "director": "",
                    "secretario": "",
                    "vocal": ""
                },
                "pregunta_3": {
                    "director": "",
                    "secretario": "",
                    "vocal": ""
                },
                "pregunta_4": {
                    "director": "",
                    "secretario": "",
                    "vocal": ""
                },
                "pregunta_5": {
                    "director": "",
                    "secretario": "",
                    "vocal": ""
                },
                "pregunta_6": {
                    "director": "",
                    "secretario": "",
                    "vocal": ""
                },
                "pregunta_7": {
                    "director": "",
                    "secretario": "",
                    "vocal": ""
                },
                "pregunta_8": {
                    "director": "",
                    "secretario": "",
                    "vocal": ""
                }
            }';
            // Pasar JSON a objeto php
            $preguntas = json_decode($preguntas);
        }

        // Guardar respuesta
        switch ($role) {
            case 'director':
                $preguntas->pregunta_1->director = $request->pregunta_1;
                $preguntas->pregunta_2->director = $request->pregunta_2;
                $preguntas->pregunta_3->director = $request->pregunta_3;
                $preguntas->pregunta_4->director = $request->pregunta_4;
                $preguntas->pregunta_5->director = $request->pregunta_5;
                $preguntas->pregunta_6->director = $request->pregunta_6;
                $preguntas->pregunta_7->director = $request->pregunta_7;
                $preguntas->pregunta_8->director = $request->pregunta_8;
                break;
            case 'secretario':
                $preguntas->pregunta_1->secretario = $request->pregunta_1;
                $preguntas->pregunta_2->secretario = $request->pregunta_2;
                $preguntas->pregunta_3->secretario = $request->pregunta_3;
                $preguntas->pregunta_4->secretario = $request->pregunta_4;
                $preguntas->pregunta_5->secretario = $request->pregunta_5;
                $preguntas->pregunta_6->secretario = $request->pregunta_6;
                $preguntas->pregunta_7->secretario = $request->pregunta_7;
                $preguntas->pregunta_8->secretario = $request->pregunta_8;
                break;
            case 'vocal':
                $preguntas->pregunta_1->vocal = $request->pregunta_1;
                $preguntas->pregunta_2->vocal = $request->pregunta_2;
                $preguntas->pregunta_3->vocal = $request->pregunta_3;
                $preguntas->pregunta_4->vocal = $request->pregunta_4;
                $preguntas->pregunta_5->vocal = $request->pregunta_5;
                $preguntas->pregunta_6->vocal = $request->pregunta_6;
                $preguntas->pregunta_7->vocal = $request->pregunta_7;
                $preguntas->pregunta_8->vocal = $request->pregunta_8;
                break;
            default:
                break;
        }

        $avance->preguntas = json_encode($preguntas);
        $avance->save();

        return redirect()->route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $estudiante_id])->with([
            'message' => 'Evaluación guardada con éxito, puedes volver a editar la evaluación si así lo deseas',
            'color' => 'green'
        ]);

    }

    public function generarDocumentoEvaluacion(Request $reqest, $estudiante_id) {
        // Obtener estudiante
        $estudiante = Estudiante::find($estudiante_id);
        if($estudiante == null) {
            return redirect()->route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $estudiante_id])->with([
                'message' => 'El estudiante que seleccionaste no existe',
                'color' => 'red'
            ]);
        }

        // Obtener avance
        $tiene_avance = $estudiante->usuario->avance;
        if($tiene_avance == null) {
            return redirect()->route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $estudiante_id])->with([
                'message' => 'El estudiante aún no tiene asignada una fecha para presentar avance',
                'color' => 'yellow'
            ]);
        }
        $estudiante_usuario = Usuario::find($estudiante->usuario->id);
        $avance = Avance::find($estudiante_usuario->avance->id);

        // Verificar si el comité ya lo evaluó
        $preguntas = json_decode($avance->preguntas);

        if($preguntas == null) {
            return redirect()->route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $estudiante_id])->with([
                'message' => 'Los miembros del comité aún no ha evaluado el reporte',
                'color' => 'yellow'
            ]);
        }
        
        // Pregunta 1
        if($preguntas->pregunta_1->director == "" || $preguntas->pregunta_1->secretario == "" || $preguntas->pregunta_1->vocal == "") {
            return redirect()->route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $estudiante_id])->with([
                'message' => 'Los miembros del comité aún no ha evaluado el reporte',
                'color' => 'yellow'
            ]);
        }
        // Pregunta 2
        if($preguntas->pregunta_2->director == "" || $preguntas->pregunta_2->secretario == "" || $preguntas->pregunta_2->vocal == "") {
            return redirect()->route('dashboard')->with([
                'message' => 'Los miembros del comité aún no ha evaluado el reporte',
                'color' => 'yellow'
            ]);
        }
        // Pregunta 3
        if($preguntas->pregunta_3->director == "" || $preguntas->pregunta_3->secretario == "" || $preguntas->pregunta_3->vocal == "") {
            return redirect()->route('dashboard')->with([
                'message' => 'Los miembros del comité aún no ha evaluado el reporte',
                'color' => 'yellow'
            ]);
        }
        // Pregunta 4
        if($preguntas->pregunta_4->director == "" || $preguntas->pregunta_4->secretario == "" || $preguntas->pregunta_4->vocal == "") {
            return redirect()->route('dashboard')->with([
                'message' => 'Los miembros del comité aún no ha evaluado el reporte',
                'color' => 'yellow'
            ]);
        }
        // Pregunta 5
        if($preguntas->pregunta_5->director == "" || $preguntas->pregunta_5->secretario == "" || $preguntas->pregunta_5->vocal == "") {
            return redirect()->route('dashboard')->with([
                'message' => 'Los miembros del comité aún no ha evaluado el reporte',
                'color' => 'yellow'
            ]);
        }
        // Pregunta 6
        if($preguntas->pregunta_6->director == "" || $preguntas->pregunta_6->secretario == "" || $preguntas->pregunta_6->vocal == "") {
            return redirect()->route('dashboard')->with([
                'message' => 'Los miembros del comité aún no ha evaluado el reporte',
                'color' => 'yellow'
            ]);
        }
        // Pregunta 7
        if($preguntas->pregunta_7->director == "" || $preguntas->pregunta_7->secretario == "" || $preguntas->pregunta_7->vocal == "") {
            return redirect()->route('dashboard')->with([
                'message' => 'Los miembros del comité aún no ha evaluado el reporte',
                'color' => 'yellow'
            ]);
        }
        // Pregunta 8
        if($preguntas->pregunta_8->director == "" || $preguntas->pregunta_8->secretario == "" || $preguntas->pregunta_8->vocal == "") {
            return redirect()->route('dashboard')->with([
                'message' => 'Los miembros del comité aún no ha evaluado el reporte',
                'color' => 'yellow'
            ]);
        }

        // Obtener resultados de evaluación del comité
        $p1_dir = $preguntas->pregunta_1->director;
        $p2_dir = $preguntas->pregunta_2->director;
        $p3_dir = $preguntas->pregunta_3->director;
        $p4_dir = $preguntas->pregunta_4->director;
        $p5_dir = $preguntas->pregunta_5->director;
        $p6_dir = $preguntas->pregunta_6->director;
        $p7_dir = $preguntas->pregunta_7->director;
        $p8_dir = $preguntas->pregunta_8->director;
        $suma_director = $p1_dir + $p2_dir + $p3_dir + $p4_dir + $p5_dir + $p6_dir + $p7_dir + $p8_dir;
        $promedio_director = number_format(($suma_director) / 8, 2, '.', '');
        
        $p1_sec = $preguntas->pregunta_1->secretario;
        $p2_sec = $preguntas->pregunta_2->secretario;
        $p3_sec = $preguntas->pregunta_3->secretario;
        $p4_sec = $preguntas->pregunta_4->secretario;
        $p5_sec = $preguntas->pregunta_5->secretario;
        $p6_sec = $preguntas->pregunta_6->secretario;
        $p7_sec = $preguntas->pregunta_7->secretario;
        $p8_sec = $preguntas->pregunta_8->secretario;
        $suma_secretario = $p1_sec + $p2_sec + $p3_sec + $p4_sec + $p5_sec + $p6_sec + $p7_sec + $p8_sec;
        $promedio_secretario = number_format(($suma_secretario) / 8, 2, '.', '');

        $p1_voc = $preguntas->pregunta_1->vocal;
        $p2_voc = $preguntas->pregunta_2->vocal;
        $p3_voc = $preguntas->pregunta_3->vocal;
        $p4_voc = $preguntas->pregunta_4->vocal;
        $p5_voc = $preguntas->pregunta_5->vocal;
        $p6_voc = $preguntas->pregunta_6->vocal;
        $p7_voc = $preguntas->pregunta_7->vocal;
        $p8_voc = $preguntas->pregunta_8->vocal;
        $suma_vocal = $p1_voc + $p2_voc + $p3_voc + $p4_voc + $p5_voc + $p6_voc + $p7_voc + $p8_voc;
        $promedio_vocal = number_format(($suma_vocal) / 8, 2, '.', '');
        
        // Sacar calificación final
        $calificacion_final = number_format(($promedio_director + $promedio_secretario + $promedio_vocal) / 3, 2, '.', '');

        // Obtener nombre del estudiante
        $nombre_estudiante = $estudiante_usuario->nombre . ' ' . $estudiante_usuario->apellidos;

        // Obtener fecha
        $time_fecha = strtotime($avance->fecha);
        $fecha = date('Y/m/d', $time_fecha);

        // Obtener numero de control del estudiante
        $estudiante_numero_control = $estudiante->numero_control;

        // // Obtener semestre del estudiante
        // $estudiante_semestre = $estudiante;

        // Obtener periodo del estudiante
        $estudiante_periodo = $estudiante->generacion;

        // Obtener título de tema de tesis
        $estudiante_tesis = Tesis::where('estudiante_id', $estudiante->id)->first();
        $titulo_tesis = $estudiante_tesis->titulo;

        // Obtener programa educativo
        $programa_educativo = "Maestría en Administración Industrial";

        // Generar pdf
        $pdf = \PDF::loadView('avance.pdf.actaCalificacion', [
            'p_dir' => [$p1_dir, $p2_dir, $p3_dir, $p4_dir, $p5_dir, $p6_dir, $p7_dir, $p8_dir],
            'dir_prom' => $promedio_director,
            'p_sec' => [$p1_sec, $p2_sec, $p3_sec, $p4_sec, $p5_sec, $p6_sec, $p7_sec, $p8_sec],
            'sec_prom' => $promedio_secretario,
            'p_voc' => [$p1_voc, $p2_voc, $p3_voc, $p4_voc, $p5_voc, $p6_voc, $p7_voc, $p8_voc],
            'voc_prom' => $promedio_vocal,
            'calificacion_final' => $calificacion_final,
            'fecha' => $fecha,
            'estudiante_nombre' => $nombre_estudiante,
            'estudiante_numero_control' => $estudiante_numero_control,
            'periodo' => $estudiante_periodo,
            'titulo_tesis' => $titulo_tesis,
            'programa_educativo' => $programa_educativo
        ]);

        // Verificar si existe ya el pdf
        if(Storage::exists('estudiantes/' . $estudiante_numero_control . '/avance/acta_calificacion.pdf')) {
            Storage::disk('estudiantes')->delete($estudiante_numero_control . '/avance/acta_calificacion.pdf');
        }

        // Guardar pdf
        $pdf->save(storage_path('app/estudiantes/' . $estudiante_numero_control . '/avance' . '/') . 'acta_calificacion.pdf');
        // Devolver pdf
        return response()->file(storage_path('app/estudiantes/' . $estudiante_numero_control . '/avance' . '/') . 'acta_calificacion.pdf');
    }

    public function obtenerDocumentoEvaluacion($estudiante_id) {
        // Obtener usuario
        $usuario = Usuario::find(Auth::user()->id);

        // Obtener estudiante
        $estudiante = Estudiante::find($estudiante_id);
        if($estudiante == null) {
            return redirect()->route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $estudiante_id])->with(['message' => 'El estudiante no existe', 'color', 'red']);
        }
        $estudiante_tesis = Tesis::where('estudiante_id', $estudiante->id)->first();
        $estudiante_numero_control = $estudiante->numero_control;

        // Obtener role del usuario
        $role = getUserRole($usuario);
        
        // Verificar si está en el comité, es coordinador o jefe
        if(!($role == 'Jefe Posgrado' || 
           $role == 'Coordinador' || 
           $usuario->id == $estudiante_tesis->director || 
           $usuario->id == $estudiante_tesis->secretario || 
           $usuario->id == $estudiante_tesis->vocal
        )) {
          return redirect()->route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $estudiante_id])->with(['message' => '403 Forbidden', 'color' => 'red']);
        }

        // Verificar si existe el documento
        if(!(Storage::exists('estudiantes/' . $estudiante_numero_control . '/avance/acta_calificacion.pdf'))) {
          return redirect()->route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $estudiante_id])->with(['message' => 'El documento de evaluación aún no ha sido generado', 'color' => 'yellow']);
        }

        // Retornar pdf
        return response()->file(storage_path('app/estudiantes/' . $estudiante_numero_control . '/avance' . '/') . 'acta_calificacion.pdf');
    }

    public function firmarDocumentoEvaluacion(Request $request, $estudiante_id) {

        // Validar documento si es pdf
        $validate = $this->validate($request, [
            'documento_firmado' => 'required|mimes:pdf'
        ]);

        $documento_firmado = $request->file('documento_firmado');

        // Obtener el estudiante
        $estudiante = Estudiante::find($estudiante_id);
        if($estudiante == null) {
            return redirect()->route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $estudiante_id])->with(['message' => 'El estudiante con el id proporcionado no existe', 'color' => 'red']);
        }

        // TODO: Añadir validaciones sobre si los datos de avance están completos, de momento no son 100% necesarios
        // TODO: porque el pdf solo se genera cuando todo está completo y porque el que tiene acceso a esta función
        // TODO: es el jefe del posgrado

        // Eliminar el pdf antiguo
        Storage::disk('estudiantes')->delete($estudiante->numero_control . '/avance/acta_calificacion.pdf');
        // Subir nuevo documento firmado
        Storage::disk('estudiantes')->put($estudiante->numero_control . '/avance/acta_calificacion.pdf', File::get($documento_firmado));

        // Retornamos al dashboard con un mensaje de éxito
        return redirect()->route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $estudiante_id])->with(['message' => 'Documento subido exitosamente!', 'color' => 'green']);

    }

    public function obtenerDocumentoEvaluacionEstudiante() {
      $usuario_id = Auth::user()->id;
      $estudiante = Estudiante::where('usuario_id', $usuario_id)->first();
      $estudiante_numero_control = $estudiante->numero_control;

      // Verificar si existe el documento
      if(!(Storage::exists('estudiantes/' . $estudiante_numero_control . '/avance/acta_calificacion.pdf'))) {
        return redirect()->route('presentacion-avance.comite-ver-fecha')->with(['message' => 'El documento de evaluación aún no ha sido generado', 'color' => 'yellow']);
      }

      // Retornar pdf
      return response()->file(storage_path('app/estudiantes/' . $estudiante_numero_control . '/avance' . '/') . 'acta_calificacion.pdf');
    }

    public function mandarComentarioComite(Request $request, $estudiante_id) {
      $estudiante = Estudiante::find($estudiante_id);

      $hay_avance = $estudiante->usuario->avance;
      $avance;
      $usuario = Usuario::find(Auth::user()->id);

      if($hay_avance != null) {
        $usuario_estudiante = Usuario::find($estudiante->usuario->id);
        $avance = Avance::where('usuario_id', $usuario_estudiante->id)->first();
      } else {
        return redirect()->route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $estudiante_id])->with(['message' => 'El estudiante no tiene asignada una fecha de entrega de avance', 'color', 'red']);
      }

      // Verificar que el usuario sea parte del comité tutorial de la tesis del estudiante
      $tesis = Tesis::find($estudiante->tesis->id);
      if($tesis == null) {
          return redirect()->route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $estudiante_id])->with(['message' => 'El estudiante no cuenta aún con un tema de tesis', 'color', 'red']);
      }

      $role;
      if(($tesis->director == $usuario->id)) {
          $role = 'director';
          $avance->comentario_director = $request->comentario;
          $avance->save();
          return redirect()->route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $estudiante_id])->with(['message' => 'Comentario envíado exitosamente', 'color' => 'green']);

      }

      if(($tesis->secretario == $usuario->id)) {
        $role = 'secretario';
        $avance->comentario_secretario = $request->comentario;
        $avance->save();
        return redirect()->route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $estudiante_id])->with(['message' => 'Comentario envíado exitosamente', 'color' => 'green']);
      }

      if(($tesis->vocal == $usuario->id)) {
        $role = 'vocal';
        $avance->comentario_vocal = $request->comentario;
        $avance->save();
        return redirect()->route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $estudiante_id])->with(['message' => 'Comentario envíado exitosamente', 'color' => 'green']);
      }

      if(!isset($role)) {
        return redirect()->route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $estudiante_id])->with(['message' => 'No eres miembro del comité de la tesis de este estudiante', 'color', 'red']);
      }

    }

}