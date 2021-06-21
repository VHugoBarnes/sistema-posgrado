<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver una') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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
                            <select name="usuario_docente" class="w-full mt-2 mb-2 border bg-white rounded px-3 py-2 outline-none" id="">
                                @foreach ($docentes as $key => $docente)
                                    <option value="{{ $docente->usuario->id }}" {{ $docente->usuario->id == $tesis->director ? 'selected="selected"' : '' }}>{{ $docente->usuario->nombre }} {{ $docente->usuario->apellidos }}</option>
                                @endforeach
                                <input class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="submit" value="Seleccionar como director">
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
            </div>
        </div>
    </div>
</x-app-layout>