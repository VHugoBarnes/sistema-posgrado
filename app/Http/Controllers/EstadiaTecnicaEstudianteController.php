<?php

namespace App\Http\Controllers;

use App\Models\Estadia_Tecnica;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EstadiaTecnicaEstudianteController extends Controller
{
    public function index()
    {
        return view('estadia.index');
    }

    /**
     * @param $tipo - el nombre del documento
     * @param $id - el id de la estadia
     */
    public function getDocument(Request $request)
    {
        $estadia = Estadia_Tecnica::find($request->id);

        if($estadia == null) {
            return redirect()->back();
        }
        
        return response()->file(storage_path($estadia->ruta_oficio_presentacion)."$request->tipo.pdf");
    }

    public function test()
    {
        return \PDF::loadView('estadia.test')->stream();
    }

    public function create()
    {
        return view('estadia.crear');
    }

    public function store(Request $request)
    {
        // Validar datos del formulario
        $validate = $this->validate($request, [
            'nombre_empresa' => 'required|string|max:255',
            'asesor' => 'required|string|max:255',
            'puesto_asesor' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'nombre_proyecto' => 'required|string|max:255',
            'desde' => 'required|date',
            'hasta' => 'required|date'
        ]);

        // Obtener id del estudiante autenticado
        $estudiante_id = Auth::user()->id;
        $estudiante_id = Estudiante::where('usuario_id', $estudiante_id)->pluck('id');
        $estudiante = Estudiante::find($estudiante_id)[0];

        // Crear nuevo registro
        $estadia = new Estadia_Tecnica;
        $estadia->estudiante_id = $estudiante_id[0];
        $estadia->estatus = 'Preparando';
        $estadia->nombre_empresa = $request->nombre_empresa;
        $estadia->asesor = $request->asesor;
        $estadia->puesto_asesor = $request->puesto_asesor;
        $estadia->area = $request->area;
        $estadia->nombre_proyecto = $request->nombre_proyecto;
        $estadia->desde = $request->desde;
        $estadia->hasta = $request->hasta;

        // Obtener string con la fecha en formato dia/mes/año
        setlocale(LC_TIME, 'es_MX.UTF-8');
        $fecha = strftime("%d/%B/%Y");
        
        // Generar pdf
        $pdf = \PDF::loadView('estadia.carta', [
            'fecha' => $fecha,
            'asesor' => $request->asesor,
            'puesto_asesor' => $request->puesto_asesor,
            'nombre_empresa' => $request->nombre_empresa,
            'estudiante' => $estudiante,
            'area' => $request->area,
            'nombre_proyecto' => $request->nombre_proyecto,
            'desde' => $request->desde,
            'hasta' => $request->hasta,
        ]);

        // Guardar pdf
        Storage::makeDirectory('estudiantes/'.$estudiante->numero_control.'/estadia-tecnica');
        $pdf->save(storage_path('app/estudiantes/'.$estudiante->numero_control.'/estadia-tecnica'.'/').'oficio-presentacion.pdf');

        // Guardar datos en el nuevo registro
        $estadia->ruta_oficio_presentacion = 'app/estudiantes/'.$estudiante->numero_control.'/estadia-tecnica'.'/';
        $estadia->save();

        // Devolver el pdf en el navegador
        return redirect()->route('estadia-estudiante-status');
    }

    public function status()
    {
        // Obtener id del estudiante autenticado
        $estudiante_id = Auth::user()->id;
        $estudiante_id = Estudiante::where('usuario_id', $estudiante_id)->pluck('id');
        $estadia = Estadia_Tecnica::where('estudiante_id', $estudiante_id)->pluck('id');
        $estadia = Estadia_Tecnica::find($estadia)[0];

        return view('estadia.estatusEstudiante', [
            'estadia' => $estadia
        ]);
    }

    public function edit()
    {
        // Obtener id del estudiante identificado
        $estudiante_id = Auth::user()->id;
        $estudiante_id = Estudiante::where('usuario_id', $estudiante_id)->pluck('id');

        // Obtener estadia del estudiante
        $estadia = Estadia_Tecnica::where('estudiante_id', $estudiante_id)->pluck('id');
        $estadia = Estadia_Tecnica::find($estadia)[0];

        return view('estadia.modificar', [
            'estadia' => $estadia
        ]);
    }

    public function update(Request $request)
    {
        // Validar datos del formulario
        $validate = $this->validate($request, [
            'nombre_empresa' => 'required|string|max:255',
            'asesor' => 'required|string|max:255',
            'puesto_asesor' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'nombre_proyecto' => 'required|string|max:255',
            'desde' => 'required|date',
            'hasta' => 'required|date'
        ]);

        // Obtener id del estudiante autenticado
        $estudiante_id = Auth::user()->id;
        $estudiante_id = Estudiante::where('usuario_id', $estudiante_id)->pluck('id');
        $estudiante = Estudiante::find($estudiante_id)[0];

        // Obtener registro
        $estadia = Estadia_Tecnica::where('estudiante_id', $estudiante_id)->pluck('id');
        $estadia = Estadia_Tecnica::find($estadia)[0];
        $estadia->estudiante_id = $estudiante_id[0];
        $estadia->estatus = 'Preparando';
        $estadia->nombre_empresa = $request->nombre_empresa;
        $estadia->asesor = $request->asesor;
        $estadia->puesto_asesor = $request->puesto_asesor;
        $estadia->area = $request->area;
        $estadia->nombre_proyecto = $request->nombre_proyecto;
        $estadia->desde = $request->desde;
        $estadia->hasta = $request->hasta;

        // Obtener string con la fecha en formato dia/mes/año
        setlocale(LC_TIME, 'es_MX.UTF-8');
        $fecha = strftime("%d/%B/%Y");
        
        // Generar pdf
        $pdf = \PDF::loadView('estadia.carta', [
            'fecha' => $fecha,
            'asesor' => $request->asesor,
            'puesto_asesor' => $request->puesto_asesor,
            'nombre_empresa' => $request->nombre_empresa,
            'estudiante' => $estudiante,
            'area' => $request->area,
            'nombre_proyecto' => $request->nombre_proyecto,
            'desde' => $request->desde,
            'hasta' => $request->hasta,
        ]);

        // Guardar pdf
        Storage::makeDirectory('estudiantes/'.$estudiante->numero_control.'/estadia-tecnica');
        $pdf->save(storage_path('app/estudiantes/'.$estudiante->numero_control.'/estadia-tecnica'.'/').'oficio-presentacion.pdf');

        // Guardar datos en el nuevo registro
        $estadia->ruta_oficio_presentacion = 'app/estudiantes/'.$estudiante->numero_control.'/estadia-tecnica'.'/';
        $estadia->save();

        // Devolver el pdf en el navegador
        return redirect()->route('estadia-estudiante-status');
    }

    public function send(Request $request)
    {
        // Obtener id del estudiante autenticado
        $estudiante_id = Auth::user()->id;
        $estudiante_id = Estudiante::where('usuario_id', $estudiante_id)->pluck('id');
        $estudiante = Estudiante::find($estudiante_id);

        // Crear nuevo registro
        $estadia = Estadia_Tecnica::where('estudiante_id', $estudiante_id)->pluck('id');
        $estadia = Estadia_Tecnica::find($estadia)[0];
        $estadia->estatus = "Pendiente";
        $estadia->save();

        return redirect()->route('estadia-estudiante-status');
    }
}
