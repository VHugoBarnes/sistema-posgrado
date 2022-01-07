<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver todas las tesis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @foreach ($tesis as $t)
                    <div class="m-4 shadow-xl p-4 bg-gray-50">
                        <h1 class="text-2xl text-blue-600 hover:text-blue-800 font-bold p-2"><a href="{{ route('tesis-detalle', ['id'=>$t->id]) }}">{{ $t->titulo }}</a></h1>
                        <h2 class="text-gray-700 p-2 text-lg">
                            <span class="font-bold">Estudiante:</span>
                             {{ $t->estudiante->usuario->nombre }} {{ $t->estudiante->usuario->apellidos }}
                        </h2>
                        
                        @if ($t->director_usuario != null)
                            <h2 class="text-gray-700 p-2">Director: {{ $t->director_usuario()->first()->nombre }}</h2>
                        @else
                            <h2 class="text-gray-400 p-2">Director: No hay director</h2>
                        @endif
                        
                        @if ($t->codirector_usuario != null)
                            <h2 class="text-gray-700 p-2">Codirector: {{ $t->codirector_usuario()->first()->nombre }}</h2>
                        @else
                            <h2 class="text-gray-400 p-2">Codirector: No hay codirector</h2>
                        @endif
                        
                        @if ($t->secretario_usuario != null)
                            <h2 class="text-gray-700 p-2">Secretario: {{ $t->secretario_usuario()->first()->nombre }}</h2>
                        @else
                            <h2 class="text-gray-400 p-2">Secretario: No hay secretario</h2>
                        @endif
                        
                        @if ($t->vocal_usuario != null)
                            <h2 class="text-gray-700 p-2">Vocal: {{ $t->vocal_usuario()->first()->nombre }}</h2>
                        @else
                            <h2 class="text-gray-400 p-2">Vocal: No hay vocal</h2>
                        @endif
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>