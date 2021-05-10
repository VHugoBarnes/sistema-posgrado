<x-guest-layout>
@foreach ($tesis as $t)
    <div class="container mx-auto bg-gray-200 m-8 w-1/2 rounded">
        <h1 class="font-sans text-blue-500 font-bold p-2"><a href="{{ route('tesis-detalle', ['id'=>$t->id]) }}">{{ $t->titulo }}</a></h1>
        <h2 " class="text-blue-400 p-2">Estudiante: {{ $t->estudiante->usuario->nombre }} {{ $t->estudiante->usuario->apellidos }}</h2>
        
        @if ($t->director != null)
            <h2 class="text-blue-400 p-2">Director: {{ $t->director()->first()->nombre }}</h2>
        @else
            <h2 class="text-red-300 p-2">Director: No hay director</h2>
        @endif
        
        @if ($t->codirector != null)
            <h2 class="text-blue-400 p-2">Codirector: {{ $t->codirector()->first()->nombre }}</h2>
        @else
            <h2 class="text-red-300 p-2">Codirector: No hay codirector</h2>
        @endif
        
        @if ($t->secretario != null)
            <h2 class="text-blue-400 p-2">Secretario: {{ $t->secretario()->first()->nombre }}</h2>
        @else
            <h2 class="text-red-300 p-2">Secretario: No hay secretario</h2>
        @endif
        
        @if ($t->vocal != null)
            <h2 class="text-blue-400 p-2">Vocal: {{ $t->vocal()->first()->nombre }}</h2>
        @else
            <h2 class="text-red-300 p-2">Vocal: No hay vocal</h2>
        @endif

    </div>
@endforeach
</x-guest-layout>