<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver tesis donde soy parte del comité') }}
        </h2>
  </x-slot>

  <div class="py-12">
  @if (session('status'))
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-{{ session('color') }}-300 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-{{ session('color') }}-300 border-b border-gray-200">
                        <p id="session" class="text-{{ session('color') }}-700">{{ session('status') }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endif
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200 space-y-4">

          @foreach($estudiantes as $alumno)
              <div class="bg-gray-100 rounded-xl shadow-lg p-4 cursor-pointer">
                  <a href="{{route('presentacion-avance.comite-ver-reporte', ['estudiante_id' => $alumno['estudiante_id']])}}">
                  <h1 class="text-xl text-gray-700">{{ $alumno['nombre_estudiante'] }}</h1>
                  @if($alumno['tiene_avance'])
                      <a class="text-blue-500 underline" href="{{ route('presentacion-avance.ver-reporte-alumno', ['estudiante_id' => $alumno['estudiante_id']]) }}">Ver documento</a>
                  @else
                      <p class="text-gray-500 font-light">Sin documento de avance aún</p>
                  @endif
                  <p class="text-gray-500 font-light">
                    {{ $alumno['fecha_programada'] }}
                  </p>
                  </a>
              </div>
          @endforeach
        
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
