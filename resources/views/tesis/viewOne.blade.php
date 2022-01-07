<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver tesis de ' . $tesis->estudiante->usuario->nombre . ' ' . $tesis->estudiante->usuario->apellidos) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl text-blue-600 font-bold p-2">{{ $tesis->titulo }}</h1>
                    <h2 class="text-gray-700 p-2 text-xl">
                        <span class="font-bold">Estudiante: </span>
                        {{ $tesis->estudiante->usuario->nombre }} {{ $tesis->estudiante->usuario->apellidos }}
                    </h2>

                    <div class="space-y-2 my-4">
                        <!-- Director -->
                        <div class="flex items-center pl-2 text-lg">
                            @if ($tesis->director_usuario != null)
                            <h2 class="text-gray-700 w-56">Director: {{ $tesis->director_usuario()->first()->nombre }}</h2>
                            @else
                                <h2 class="text-gray-400 w-56">Director: No hay director -</h2>
                            @endif
                            {{-- SELECCIONAR UN DIRECTOR --}}
                            @if ($tipo_usuario == 'Coordinador' || $tipo_usuario == 'Jefe Posgrado')
                            <form action="{{ route('tesis-registro', ['id'=>$tesis->id, 'tipo'=>'director']) }}" method="POST" class="flex items-center space-x-2">
                                @csrf
                                <select name="usuario_docente" class="w-80 text-sm border bg-white rounded h-8 outline-none" id="">
                                    @foreach ($docentes as $key => $docente)
                                        <option value="{{ $docente->usuario->id }}" {{ $docente->usuario->id == $tesis->director ? 'selected="selected"' : '' }}>{{ $docente->usuario->nombre }} {{ $docente->usuario->apellidos }}</option>
                                    @endforeach
                                </select>
                                <input class="w-56 mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-900 focus:outline-none cursor-pointer text-sm" type="submit" value="Seleccionar como director">
                            </form>
                            @endif
                            {{-- SELECCIONAR UN DIRECTOR --}}
                        </div>
                        
                        <!-- Codirector -->
                        <div class="flex items-center pl-2 text-lg">
                            @if ($tesis->codirector_usuario != null)
                                <h2 class="text-gray-700 w-56">Codirector: {{ $tesis->codirector_usuario()->first()->nombre }}</h2>
                            @else
                                <h2 class="text-gray-400 w-56">Codirector: No hay codirector
                                </h2>
                            @endif
                            {{-- SELECCIONAR UN CODIRECTOR --}}
                            @if ($tipo_usuario == 'Coordinador' || $tipo_usuario == 'Jefe Posgrado')
                            <form action="{{ route('tesis-registro', ['id'=>$tesis->id, 'tipo'=>'codirector']) }}" method="POST" class="flex items-center space-x-2">
                                @csrf
                                <select name="usuario_docente" class="w-80 text-sm border bg-white rounded h-8 outline-none" id="">
                                    @foreach ($docentes as $key => $docente)
                                        <option value="{{ $docente->usuario->id }}" {{ $docente->usuario->id == $tesis->codirector ? 'selected="selected"' : '' }}>{{ $docente->usuario->nombre }} {{ $docente->usuario->apellidos }}</option>
                                    @endforeach
                                </select>
                                <input class="w-56 mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-900 focus:outline-none cursor-pointer text-sm" type="submit" value="Seleccionar como codirector">
                            </form>
                            @endif
                            {{-- SELECCIONAR UN CODIRECTOR --}}
                        </div>

                        <!-- Secretario -->
                        <div class="flex items-center pl-2 text-lg">
                            @if ($tesis->secretario_usuario != null)
                                <h2 class="text-gray-700 w-56">Secretario: {{ $tesis->secretario_usuario()->first()->nombre }}</h2>
                            @else
                                <h2 class="text-gray-400 w-56">Secretario: No hay secretario
                            </h2>
                            @endif
                            {{-- SELECCIONAR UN SECRETARIO --}}
                            @if ($tipo_usuario == 'Coordinador' || $tipo_usuario == 'Jefe Posgrado')
                            <form action="{{ route('tesis-registro', ['id'=>$tesis->id, 'tipo'=>'secretario']) }}" method="POST" class="flex items-center space-x-2">
                                @csrf
                                <select name="usuario_docente" class="w-80 text-sm border bg-white rounded h-8 outline-none" id="">
                                    @foreach ($docentes as $key => $docente)
                                        <option value="{{ $docente->usuario->id }}" {{ $docente->usuario->id == $tesis->secretario ? 'selected="selected"' : '' }}>{{ $docente->usuario->nombre }} {{ $docente->usuario->apellidos }}</option>
                                    @endforeach
                                </select>
                                <input class="w-56 mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-900 focus:outline-none cursor-pointer text-sm" type="submit" value="Seleccionar como secretario">
                            </form>
                            @endif
                            {{-- SELECCIONAR UN SECRETARIO --}}
                        </div>

                        <!-- Vocal -->
                        <div class="flex items-center pl-2 text-lg">
                            @if ($tesis->vocal_usuario != null)
                                <h2 class="text-gray-700 w-56">Vocal: {{ $tesis->vocal_usuario()->first()->nombre }}</h2>
                            @else
                                <h2 class="text-gray-400 w-56">Vocal: No hay vocal</h2>
                            @endif
                            {{-- SELECCIONAR UN VOCAL --}}
                            @if ($tipo_usuario == 'Coordinador' || $tipo_usuario == 'Jefe Posgrado')
                            <form action="{{ route('tesis-registro', ['id'=>$tesis->id, 'tipo'=>'vocal']) }}" method="POST" class="flex items-center space-x-2">
                                @csrf
                                <select name="usuario_docente" class="w-80 text-sm border bg-white rounded h-8 outline-none" id="">
                                    @foreach ($docentes as $key => $docente)
                                        <option value="{{ $docente->usuario->id }}" {{ $docente->usuario->id == $tesis->vocal ? 'selected="selected"' : '' }}>{{ $docente->usuario->nombre }} {{ $docente->usuario->apellidos }}</option>
                                    @endforeach
                                </select>
                                <input class="w-56 mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-900 focus:outline-none cursor-pointer text-sm" type="submit" value="Seleccionar como vocal">
                            </form>
                            @endif
                            {{-- SELECCIONAR UN VOCAL --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>