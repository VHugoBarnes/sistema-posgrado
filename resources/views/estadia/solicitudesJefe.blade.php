@foreach ($estadias as $estadia)
    <div>
        <h2>Estadia {{ $estadia->id }}</h2>
        <h3><a href="{{ route('estadia-por-firmar-individual', ['id'=>$estadia->id]) }}">Nombre del estudiante: {{ $estadia->estudiante->usuario->nombre }} {{ $estadia->estudiante->usuario->apellidos }}</a></h3>
    </div>
@endforeach