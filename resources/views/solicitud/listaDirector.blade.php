@foreach ($solicitudes as $solicitud)
    <h1>Hecha por: {{ $solicitud->tesis->estudiante->usuario->nombre }} {{ $solicitud->tesis->estudiante->usuario->apellidos }}</h1>
    <p>Estatus: {{ $solicitud->estatus }}</p>
    <a href="{{ route('solicitud-numero', ['numero' => $solicitud->tesis->estudiante->numero_control]) }}">Ver documento de solicitud</a>

    {{-- HACER FORMULARIO EN LUGAR DE LINK, METHOD="POST" --}}
    <form method="post" action="{{ route('cambiar-status-director', ['id'=>$solicitud->id, 'estatus'=>'aprobar']) }}" enctype="multipart/form-data">
        @csrf
        <label for="archivo_firmado">Subir documento firmado</label>
        <input type="file" name="archivo_firmado" id="">
        <input type="submit" value="Aprobar solicitud">
    </form>
    <form method="post" action="{{ route('cambiar-status-director', ['id'=>$solicitud->id, 'estatus'=>'rechazar']) }}">
        @csrf
        <input type="submit" value="Rechazar solicitud">
    </form>
    
    {{-- HACER INPUT DE COMENTARIOS, SIN EL REQUIRED, VALUE="comentarios" --}}
    {{-- HACER FORMULARIO EN LUGAR DE LINK, METHOD="POST" --}}
    <hr>
@endforeach