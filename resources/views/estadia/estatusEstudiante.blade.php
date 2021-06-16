<div>
    <h1>Estatus: {{ $estadia->estatus }}</h1>
    <form action="{{ route('estadia-documento') }}" method="post">
        @csrf
        <input type="hidden" name="tipo" value="oficio-presentacion">
        <input type="hidden" name="id" value="{{ $estadia->id }}">
        <input type="submit" value="Obtener documento 'Oficio de presentación'">
    </form>
    <br>
    @if ($estadia->estatus == 'Preparando' || $estadia->estatus == 'Rechazada')
        <a href="{{ route('estadia-estudiante-modificar') }}">Editar oficio de estadia</a>
        <form action="{{ route('estadia-estudiante-enviar') }}" method="post">
            @csrf
            <input type="submit" value="Enviar oficio">
        </form>
    @endif
</div>