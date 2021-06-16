@foreach ($estadias as $estadia)
    <div>
        <h2>Estadía {{ $estadia->id }}</h2>
        <h3><a href="{{ route('estadia-revision-individual', ['id'=>$estadia->id]) }}">Nombre del estudiante: {{ $estadia->estudiante->usuario->nombre }} {{ $estadia->estudiante->usuario->apellidos }}</a></h3>
    </div>
@endforeach