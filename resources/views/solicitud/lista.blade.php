@foreach ($solicitudes as $solicitud)
    <h1>Hecha por: {{ $solicitud->tesis->estudiante->usuario->nombre }} {{ $solicitud->tesis->estudiante->usuario->apellidos }}</h1>
    <a href="{{ route('solicitud-numero', ['numero' => $solicitud->tesis->estudiante->numero_control]) }}">Ver documento de solicitud</a>
    <hr>
@endforeach