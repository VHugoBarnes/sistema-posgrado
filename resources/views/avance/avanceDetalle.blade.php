<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver detalle de la presencación de avance') }}
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

          <h1 class="text-2xl text-gray-800 font-bold">
            {{$nombre_estudiante}}
          </h1>

          <!-- Comité -->
          <div class="space-y-2 my-4 py-4">
            <h2 class="text-xl text-gray-700 font-bold">
              Comité tutorial
            </h2>
            <ul class="list-disc ml-4 text-base text-gray-600">
              <li>
                <span class="font-bold text-lg">Director: </span>{{$director}}
              </li>
              <li>
                <span class="font-bold text-lg">Codirector: </span>{{$codirector}}
              </li>
              <li>
                <span class="font-bold text-lg">Secretario: </span>{{$secretario}}
              </li>
              <li>
                <span class="font-bold text-lg">Vocal: </span>{{$vocal}}
              </li>
            </ul>
          </div>

          <!-- Presentación de avance -->
          <div class="space-y-2 my-4 py-4">
            <h2 class="text-xl text-gray-700 font-bold">
              Presentación del avance en
            </h2>
            <p class="text-gray-600 text-base">
              Fecha y hora en la que el estudiante presentará su avance.
            </p>
            <div class="my-2">
            <span class="font-mono text-base text-gray-600 bg-gray-200 p-2 rounded">
              {{$fecha_hora}}
            </span>
            </div>
            @if($role == 'Coordinador')
            <div class="pt-4 pb-4">
              <h3 class="text-lg text-gray-600 font-bold">
                Editar fecha
              </h3>
              <form method="POST" action="{{ route('presentacion-avance.editar-fecha', ['estudiante_id' => $estudiante_id]) }}">
                @csrf

                <!-- Fecha -->
                <div class="mt-2">
                  <x-label for="fecha" class="text-gray-600 font-light" :value="__('Fecha')" />
                  <x-input id="fecha" class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="date" name="fecha" required autofocus />
                </div>

                <!-- hora -->
                <div class="mt-2">
                  <x-label for="hora" class="text-gray-600 font-light" :value="__('Hora')" />
                  <x-input id="hora" class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="texto" name="hora" required />
                </div>

                <div class="flex items-center justify-end mt-2">
                  <x-button class="mb-1 w-full bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">
                      {{ __('Editar fecha') }}
                  </x-button>
                </div>
                        
              </form>
            </div>
            @endif
          </div>

          <!-- Documento de avance -->
          <div class="space-y-2 my-4 py-4">
            <h2 class="text-xl text-gray-700 font-bold">
              Documento de avance
            </h2>
            @if($avance_subido)
              <p class="text-gray-600 text-base">
                Haz clic abajo para descargar el documento de avance presentado por el estudiante.
              </p>
              <div class="my-2">
                <a href="{{ route('presentacion-avance.ver-reporte-alumno', ['estudiante_id' => $estudiante_id]) }}" class="text-white hover:text-gray-100 text-lg bg-blue-500 hover:bg-blue-400 transition duration-300 py-2 px-6 rounded">
                  Descargar documento
                </a>
              </div>
            @else
              <p class="text-gray-600 italic text-base">
                El estudiante aún no ha subido su documento de avance
              </p>
            @endif
          </div>

          {{-- Enviar comentario --}}
          @if ($avance_subido && ($es_director || $es_secretario || $es_vocal))
            <div class="space-y-2 my-4 py-4">
              <h2 class="text-xl text-gray-700 font-bold">
                Enviar comentarios al estudiante
              </h2>
              <p class="text-gray-600 text-base">
                Escribe un comentario al estudiante sobre el documento que subió.
              </p>
              <form action="{{route('presentacion-avance.enviar-comentario-comite', ['estudiante_id' => $estudiante_id])}}" method="post">
                @csrf
                <x-input id="comentario" class="md:w-2/5 w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none" type="text" name="comentario" required autofocus />
                <input type="submit" value="Enviar" class="mb-1 bg-blue-500 text-gray-200 rounded hover:bg-blue-400 px-4 py-2 focus:outline-none block mt-4">
              </form>
            </div>
          @endif

          <!-- Evaluación de avance -->
          @if ($avance_subido && ($es_director || $es_secretario || $es_vocal))
          <div class="space-y-2 my-4 py-4">
            <h2 class="text-xl text-gray-700 font-bold">
              Evaluar documento de avance
            </h2>
            <p class="text-gray-600 text-base">
              Contesta las siguientes preguntas para evaluar al estudiante. Una vez evaluado el estudiante tiene la posibilidad de actualizar la calificación hasta que el coordinador genere el documento de evaluación.
            </p>
            <!-- Formulario de preguntas -->
            <!-- Hola :D -->
            <form action="{{route('presentacion-avance.evaluar-reporte', ['estudiante_id' => $estudiante_id])}}" method="post" class="space-y-2 border border-gray-300 rounded-xl p-4">
              @csrf
              <!-- Pregunta 1 -->
              <div class="flex items-center space-x-4">
                <label for="pregunta_1" class="font-bold text-base text-gray-600 md:w-3/5">
                  1. Estructura y claridad del documento
                </label>
                <x-input id="pregunta_1" class="md:w-2/5 w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none" type="number" name="pregunta_1" required autofocus min="0" max="100" />
              </div>

              <!-- Pregunta 2 -->
              <div class="flex items-center space-x-4">
                <label for="pregunta_2" class="font-bold text-base text-gray-600 md:w-3/5">
                  2. Amplitud y actualidad de la información utilizada.
                </label>
                <x-input id="pregunta_2" class="md:w-2/5 w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none" type="number" name="pregunta_2" required autofocus min="0" max="100" />
              </div>

              <!-- Pregunta 3 -->
              <div class="flex items-center space-x-4">
                <label for="pregunta_3" class="font-bold text-base text-gray-600 md:w-3/5">
                  3. Grado de avance con respecto al informe anterior.
                </label>
                <x-input id="pregunta_3" class="md:w-2/5 w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none" type="number" name="pregunta_3" required autofocus min="0" max="100" />
              </div>

              <!-- Pregunta 4 -->
              <div class="flex items-center space-x-4">
                <label for="pregunta_4" class="font-bold text-base text-gray-600 md:w-3/5">
                  4. Nivel técnico empleado en el informe.
                </label>
                <x-input id="pregunta_4" class="md:w-2/5 w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none" type="number" name="pregunta_4" required autofocus min="0" max="100" />
              </div>

              <!-- Pregunta 5 -->
              <div class="flex items-center space-x-4">
                <label for="pregunta_5" class="font-bold text-base text-gray-600 md:w-3/5">
                  5. Asertividad en la explicación de la aportación en el avance.
                </label>
                <x-input id="pregunta_5" class="md:w-2/5 w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none" type="number" name="pregunta_5" required autofocus min="0" max="100" />
              </div>

              <!-- Pregunta 6 -->
              <div class="flex items-center space-x-4">
                <label for="pregunta_6" class="font-bold text-base text-gray-600 md:w-3/5">
                  6. Nivel de propuesta de las actividades futuras.
                </label>
                <x-input id="pregunta_6" class="md:w-2/5 w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none" type="number" name="pregunta_6" required autofocus min="0" max="100" />
              </div>

              <!-- Pregunta 7 -->
              <div class="flex items-center space-x-4">
                <label for="pregunta_7" class="font-bold text-base text-gray-600 md:w-3/5">
                  7. Apreciación general de la información recibida.
                </label>
                <x-input id="pregunta_7" class="md:w-2/5 w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none" type="number" name="pregunta_7" required autofocus min="0" max="100" />
              </div>

              <!-- Pregunta 8 -->
              <div class="flex items-center space-x-4">
                <label for="pregunta_8" class="font-bold text-base text-gray-600 md:w-3/5">
                  8. Grado de avance con respecto al cronograma propuesto en el anteproyecto.
                </label>
                <x-input id="pregunta_8" class="md:w-2/5 w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none" type="number" name="pregunta_8" required autofocus min="0" max="100" />
              </div>

              <div class="flex items-center justify-end my-8">
                <x-button class="mb-1 w-full bg-blue-500 text-gray-200 rounded hover:bg-blue-400 px-4 py-2 focus:outline-none">
                    {{ __('Evaluar') }}
                </x-button>
              </div>

            </form>
          </div>
          @endif

          <!-- Generar reporte -->
          @if($role == 'Coordinador')
          <div class="space-y-2 my-4 py-4">
            <h2 class="text-xl text-gray-700 font-bold">
              Generar acta de calificación
            </h2>
            @if($calificaciones_hechas)
            <p class="text-gray-600 text-base">
              Da clic en el botón de abajo para generar un pdf con la evaluación por el comité tutorial. Posteriormente puedes subir el documento con las firmas o con las correcciones necesarias para que el jefe del posgrado pueda firmarlo y sellarlo.
            </p>
            <div class="my-2">
            <form action="{{route('presentacion-avance.generar-documento', ['estudiante_id' => $estudiante_id])}}" method="post">
              @csrf
              <button type="submit" class="text-white hover:text-gray-100 text-lg bg-blue-500 hover:bg-blue-400 transition duration-300 py-2 px-6 rounded">
                Generar documento
              </button>
            </form>
            </div>
            @else
            <p class="text-gray-600 text-base">
              El comité tutorial aún no ha terminado de evaluar el avance de este estudiante, vuelve más tarde para generar el documento.
            </p>
            @endif
          </div>
          @endif

          <!-- Subir documento firmado -->
          @if($documento_generado)
          <div class="space-y-2 my-4 py-4">
            <h2 class="text-xl text-gray-700 font-bold">
              Subir acta de calificación firmado
            </h2>
            <p class="text-gray-600 text-base">
              Sube aquí el archivo de evaluación generado con las firmas y/o sellos correspondientes.
            </p>
            <div class="my-2">
              <form action="{{route('presentacion-avance.obtener-documento', ['estudiante_id' => $estudiante_id])}}" method="get">
                @csrf
                <button type="submit" class="text-white hover:text-gray-100 text-lg bg-blue-500 hover:bg-blue-400 transition duration-300 py-2 px-6 rounded">
                  Descargar documento
                </button>
              </form>
            </div>
            <div class="py-4">
              <form action="{{ route('presentacion-avance.sellar-documento', ['estudiante_id' => $estudiante_id]) }}" method="post" enctype="multipart/form-data" class="space-y-2 border border-gray-300 rounded-xl p-4">
                @csrf
                <div class="flex flex-col space-y-2">
                <label class="text-lg text-gray-600 -mt-4" for="documento_firmado">Sube aquí el documento</label>
                <input type="file" name="documento_firmado" id="documento_firmado">
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
        
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
