@foreach ($solicitudes as $solicitud)
    <h1>Hecha por: {{ $solicitud->tesis->estudiante->usuario->nombre }} {{ $solicitud->tesis->estudiante->usuario->apellidos }}</h1>
    <p>Estatus: {{ $solicitud->estatus }}</p>
    <a href="{{ route('solicitud-numero', ['numero' => $solicitud->tesis->estudiante->numero_control]) }}">Ver documento de solicitud</a>
    <a href="{{ route('cambiar-estatus', ['id'=>$solicitud->id, 'estatus'=>'aprobar']) }}">Aprobar solicitud</a>
    <a href="{{ route('cambiar-estatus', ['id'=>$solicitud->id, 'estatus'=>'rechazar']) }}">Rechazar solicitud solicitud</a>
    <hr>
@endforeach