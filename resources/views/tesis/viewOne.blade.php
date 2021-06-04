<x-guest-layout>
    <div class="container mx-auto bg-gray-200 m-8 w-1/2 rounded">
        <h1 class="font-sans text-blue-500 font-bold p-2">{{ $tesis->titulo }}</h1>
        <h2 class="text-blue-400 p-2">Estudiante: {{ $tesis->estudiante->usuario->nombre }} {{ $tesis->estudiante->usuario->apellidos }}
        </h2>

        @if ($tesis->director_usuario != null)
            <h2 class="text-blue-400 p-2">Director: {{ $tesis->director_usuario()->first()->nombre }}</h2>
        @else
            <h2 class="text-red-300 p-2">Director: No hay director -
                {{-- SELECCIONAR UN DIRECTOR --}}
                @if ($tipo_usuario == 'Coordinador' || $tipo_usuario == 'Jefe Posgrado')
                <form action="{{ route('tesis-registro', ['id'=>$tesis->id, 'tipo'=>'director']) }}" method="POST">
                    @csrf
                    <select name="usuario_docente" id="">
                        @foreach ($docentes as $key => $docente)
                            <option value="{{ $docente->usuario->id }}" {{ $docente->usuario->id == $tesis->director ? 'selected="selected"' : '' }}>{{ $docente->usuario->nombre }} {{ $docente->usuario->apellidos }}</option>
                        @endforeach
                        <input type="submit" value="Seleccionar como director">
                    </select>
                </form>
                @endif
                {{-- SELECCIONAR UN DIRECTOR --}}
            </h2>
        @endif

        @if ($tesis->codirector_usuario != null)
            <h2 class="text-blue-400 p-2">Codirector: {{ $tesis->codirector_usuario()->first()->nombre }}</h2>
        @else
            <h2 class="text-red-300 p-2">Codirector: No hay codirector -
            </h2>
        @endif

        @if ($tesis->secretario_usuario != null)
            <h2 class="text-blue-400 p-2">Secretario: {{ $tesis->secretario_usuario()->first()->nombre }}</h2>
        @else
            <h2 class="text-red-300 p-2">Secretario: No hay secretario - <a href="{{ route('tesis-registro', ['id'=>$tesis->id, 'tipo'=>'secretario']) }}" class="text-blue-400">Ser secretario</a></h2>
        @endif

        @if ($tesis->vocal_usuario != null)
            <h2 class="text-blue-400 p-2">Vocal: {{ $tesis->vocal_usuario()->first()->nombre }}</h2>
        @else
            <h2 class="text-red-300 p-2">Vocal: No hay vocal - <a href="{{ route('tesis-registro', ['id'=>$tesis->id, 'tipo'=>'vocal']) }}" class="text-blue-400">Ser vocal</a></h2>
        @endif

    </div>
</x-guest-layout>
