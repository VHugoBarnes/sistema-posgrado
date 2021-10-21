<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\documentacion_egreso;
use App\Models\Estudiante;
use App\Models\Linea_Investigacion;
use App\Models\Programa;
use App\Models\Usuario;
use App\Models\Tesis;
use Illuminate\Support\Facades\Auth;

class EgresoController extends Controller
{
    public function index(){
       return view('egreso.subir'); 
      
    }

    public function revisardoc(){
       return view('egreso.revisardoc');
    }

    public function revisarCoordinador(){
     // $estudiantes = estudiante::with(['nombre','apellidos','email'])->get();
      
      // return view('egreso.revisar',['estudiantes' => $estudiantes]);
      $tesis = Tesis::with(['estudiante'])->get();

      return view('egreso.revisar',[
          'tesis' => $tesis
      ]);
  
     
     }
   
   public function store(Request $request){
      $documentacion_egreso = $request->all();

      $usuario = Auth::user();
      $id = $usuario->id;
      $usuario = Usuario::find($id);

      // Conseguir id del estudiante.
      $id_estudiante = $usuario->estudiante->id;
      $estudiante = Estudiante::find($id_estudiante);

      //Guarda la ruta donde se guardaran los archivos.
      $documentacion_egreso = new  Documentacion_egreso;
      $documentacion_egreso->estudiante_id = $estudiante->usuario_id;
      $documentacion_egreso->liberacion_tesis = $estudiante->usuario_id.'/liberaciontesis/'.$request->liberacion_tesis->getClientOriginalName();
      $documentacion_egreso->tesis_ultima_version = $estudiante->usuario_id.'/tesis/'.$request->tesis_ultima_version->getClientOriginalName();
      $documentacion_egreso->constancia_plagio = $estudiante->usuario_id.'/plagio/'.$request->constancia_plagio->getClientOriginalName();
      $documentacion_egreso->estadia = $estudiante->usuario_id.'/estadia/'.$request->estadia->getClientOriginalName();
      $documentacion_egreso->articulo = $estudiante->usuario_id.'/articulo/'.$request->articulo->getClientOriginalName();
      $documentacion_egreso->evaluacion_desemp = $estudiante->usuario_id.'/evaluacion/'.$request->evaluacion_desemp->getClientOriginalName();
      $documentacion_egreso->cvu = $estudiante->usuario_id.'/cvu/'.$request->cvu->getClientOriginalName();
      $documentacion_egreso->numero_cvu = $estudiante->usuario_id.'/numerocvu/'.$request->numero_cvu->getClientOriginalName();
      $documentacion_egreso->encuesta_egresado = $estudiante->usuario_id.'/encuesta/'.$request->encuesta_egresado->getClientOriginalName();
      $documentacion_egreso->validacion_ingles = $estudiante->usuario_id.'/ingles/'.$request->validacion_ingles->getClientOriginalName();
      $documentacion_egreso->save();

         //Guarda los archivos en la ruta.
          $documentacion_egreso['liberacion_tesis'] = $request->file('liberacion_tesis')->store($estudiante->usuario_id.'/liberaciontesis');
          $documentacion_egreso['tesis_ultima_version'] = $request->file('tesis_ultima_version')->store($estudiante->usuario_id.'/tesis');
          $documentacion_egreso['constancia_plagio'] = $request->file('constancia_plagio')->store($estudiante->usuario_id.'/plagio');
          $documentacion_egreso['estadia'] = $request->file('estadia')->store($estudiante->usuario_id.'/estadia');
          $documentacion_egreso['articulo'] = $request->file('articulo')->store($estudiante->usuario_id.'/articulo');
          $documentacion_egreso['evaluacion_desemp'] = $request->file('evaluacion_desemp')->store($estudiante->usuario_id.'/evaluacion');
          $documentacion_egreso['cvu'] = $request->file('cvu')->store($estudiante->usuario_id.'/cvu');
          $documentacion_egreso['numero_cvu'] = $request->file('numero_cvu')->store($estudiante->usuario_id.'/numerocvu');
          $documentacion_egreso['encuesta_egresado'] = $request->file('encuesta_egresado')->store($estudiante->usuario_id.'/encuesta');
          $documentacion_egreso['validacion_ingles'] = $request->file('validacion_ingles')->store($estudiante->usuario_id.'/ingles');
          

      return redirect()->route('home')->with(['message'=>'La documetacion se ha mandado a revision correctamente']);

   }

   public function archivo(Request $request){
      $documentacion_egreso = $request->all();

      $usuario = Auth::user();
      $id = $usuario->id;
      $usuario = Usuario::find($id);

      // Conseguir id del estudiante.
      $id_estudiante = $usuario->estudiante->id;
      $estudiante = Estudiante::find($id_estudiante);

      //Guarda la ruta donde se guardaran los archivos.
      $documentacion_egreso = new  Documentacion_egreso;
      $documentacion_egreso->estudiante_id = $estudiante->usuario_id;
      $documentacion_egreso->liberacion_tesis = $estudiante->usuario_id.'/liberaciontesis/'.$request->liberacion_tesis->getClientOriginalName();


       // Devolvemos el pdf en el navegador
       return response()->file(storage_path('app/public/' . $estudiante->usuario_id . '/liberaciontesis' . '/') . 'cQ0D1aR1poCYoZVLDSuwCAbH6SkaT1O5mgS9jJ77.pdf');
   }

     
     
   }

