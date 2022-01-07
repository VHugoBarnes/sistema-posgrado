<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Ver horario de la presentación de avance') }}
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
    @if (session('message'))
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-{{ session('color') }}-300 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-{{ session('color') }}-300 border-b border-gray-200">
              <p id="session" class="text-{{ session('color') }}-700">{{ session('message') }}</p>
            </div>
          </div>
        </div>
      </div>
    @endif
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200 divide-y divide-gray-200">

          {{-- Main --}}
          @if ($avance == false)
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              No tienes programada una fecha aún, vuelve más tarde.
            </h2>
          @else
            <div class="space-y-2 my-4 py-4">
              <h2 class="text-xl text-gray-700 font-bold">
                Asignado para:
              </h2>
              <div class="py-2">
                <p class="text-gray-600 text-base">
                  En la fecha
                  <span class="font-mono text-base text-gray-600 bg-gray-200 p-2 rounded">
                      {{ $avance->fecha }} y hora {{ $avance->hora }}
                  </span>
                </p>
                <p class="mt-4 text-gray-600 font-bold">
                  Comentarios del coordinador:
                  <span class="italic font-normal">
                      "{{ $avance->comentarios }}"
                  </span>
                </p>
              </div>
            </div>
          @endif

          {{-- Descargar documento de avance --}}
          @if($documento_subido == true)
          <div class="space-y-2 my-4 py-4">
            <h2 class="text-xl text-gray-700 font-bold">
              Descargar documento de avance
            </h2>
            <p class="text-gray-600 text-base">
              Haz clic en el botón de abajo para descargar el documento que subiste.
            </p>
            <div class="my-2">
              <a href="{{ route('presentacion-avance.obtener-reporte') }}" class="text-white hover:text-gray-100 text-lg bg-blue-500 hover:bg-blue-400 transition duration-300 py-2 px-6 rounded">
                Descargar documento
              </a>
            </div>
          </div>
          @endif

          {{-- Subir documento de avance --}}
          @if ($avance == true)
            <div class="space-y-2 my-4 py-4">
              <h2 class="text-xl text-gray-700 font-bold">
                Subir documento de avance
              </h2>
              <p class="text-gray-600 text-base">
                Sube aquí el documento de avance para que el comité tutorial y los directivos puedan
                evaluarlo.
              </p>
              <div class="py-4">
                <form action="{{ route('presentacion-avance.enviar-reporte') }}" method="post" enctype="multipart/form-data" class="space-y-2 border border-gray-300 rounded-xl p-4">
                  @csrf
                  <div class="flex flex-col space-y-2">
                    <input type="file" name="reporte" id="documento_firmado" accept=".pdf,.docx">
                    <div class="block">
                      <button type="submit" class="text-white hover:text-gray-100 text-base bg-blue-500 hover:bg-blue-400 transition duration-300 py-2 px-6 rounded" accept=".pdf,.docx">
                          Subir documento
                      </button>
                      </div>
                  </div>
                </form>
              </div>
            </div>
          @endif

          {{-- Evaluaciones documentos --}}
          @if(($comentario_director != '') || ($comentario_secretario != '') || ($comentario_vocal != ''))
            <div class="space-y-2 my-4 py-4">
              <h2 class="text-xl text-gray-700 font-bold">
                Comentarios del comité sobre tu documento:
              </h2>
              <p class="text-gray-600 text-base">
                Debajo aparecerán algunos comentarios que los miembros de tu comité han echo sobre tu documento
              </p>
              {{-- Director --}}
              @if($comentario_director != '')
                <div>
                  <h4 class="text-lg text-gray-600 font-medium">
                    Director:
                  </h4>
                  <p class="text-gray-500 text-base italic">
                    "{{ $comentario_director }}"
                  </p>
                </div>
              @endif
              {{-- Secretario --}}
              @if($comentario_secretario != '')
                <div>
                  <h4 class="text-lg text-gray-600 font-medium">
                    Secretario:
                  </h4>
                  <p class="text-gray-500 text-base italic">
                    "{{ $comentario_secretario }}"
                  </p>
                </div>
              @endif
              {{-- Vocal --}}
              @if($comentario_vocal != '')
                <div>
                  <h4 class="text-lg text-gray-600 font-medium">
                    Vocal:
                  </h4>
                  <p class="text-gray-500 text-base italic">
                    "{{ $comentario_vocal }}"
                  </p>
                </div>
              @endif
            </div>
          @endif

          {{-- Documento de evaluación generado --}}
          @if($documento_evaluacion_generado == true)
            <div class="space-y-2 my-4 py-4">
              <h2 class="text-xl text-gray-700 font-bold">
                Tu documento de evaluación
              </h2>
              <p class="text-gray-600 text-base">
                Haz clic abajo para descargar el documento de evaluación que se generó apartir de las evaluaciones de tu comité tutorial.
              </p>
              <div class="my-2">
                <a href="{{ route('presentacion-avance.obtener-documento-estudiante') }}" class="text-white hover:text-gray-100 text-lg bg-blue-500 hover:bg-blue-400 transition duration-300 py-2 px-6 rounded">
                  Descargar documento de evaluacion
                </a>
              </div>
            </div>
          @endif

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
