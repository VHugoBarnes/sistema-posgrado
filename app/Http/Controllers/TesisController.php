<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Tesis;
use App\Models\Estudiante;
use App\Models\Usuario;

class TesisController extends Controller
{
    public function __construct()
    {
        
    }

    public function getAll()
    {
        $tesis = Tesis::with(['estudiante','director', 'codirector', 'secretario', 'vocal'])->get();

        return view('tesis.viewAll',[
            'tesis' => $tesis
        ]);
    }

    public function getOne($id)
    {
        $tesis = Tesis::find($id);

        if($tesis == NULL) {
            return redirect()->route('home');
        }

        return view('tesis.viewOne',[
            'tesis' => $tesis
        ]);
    }

    public function createTesisSubject()
    {
        return view('tesis.create');
    }

    public function storeTesisSubject(Request $request)
    {
        // Validación del formulario
        $validate = $this->validate($request, [
            'titulo' => 'required|string|max:255'
        ]);

        $usuario = Auth::user();
        $id = $usuario->id;
        $usuario = Usuario::find($id);

        // Conseguir id del estudiante
        $id_estudiante = $usuario->estudiante->id;
        $estudiante = Estudiante::find($id_estudiante);

        $tesis = new Tesis;
        $tesis->estudiante_id = $estudiante->id;
        $tesis->titulo = $request->titulo;
        $tesis->save();

        return redirect()->route('home')->with(['message'=>'Tesis creada correctamente']);
    }

    public function registerAs($id, $tipo)
    {
        $user = Auth::user();
        $tesis = Tesis::find($id);

        switch ($tipo) {
            case 'director':
                $tesis->director = $user->id;
                break;
            
            case 'codirector':
                $tesis->codirector = $user->id;
                break;

            case 'secretario':
                $tesis->secretario = $user->id;
                break;

            case 'vocal':
                $tesis->vocal = $user->id;
                break;

            default:
                # code...
                break;
        }

        $tesis->save();

        return redirect()->route('tesis');
    }

    public function uploadTesisFile()
    {

    }

    public function saveTesisFile()
    {

    }
}
