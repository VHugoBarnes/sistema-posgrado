<x-app-layout>
  <x-slot name="header">
    @if(getUserRole(Auth::user()) == "Administrador" || (getUserRole(Auth::user()) == "Coordinador"))
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Programar fecha y hora de presentación de avance') }}
        </h2>
    @endif

    @if(getUserRole(Auth::user()) == "Estudiante")
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver horario de la presentación') }}
        </h2>
    @endif

  </x-slot>

  <div class="py-12">
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
        <div class="p-6 bg-white border-b border-gray-200">
        <form method="POST" action="{{ route('presentacion-avance.programar-fecha') }}">
                        @csrf

                        <!-- Numero de control -->
                        <div>
                            <x-label for="numero_control" class="text-gray-600 font-light" :value="__('Número de control y estudiante')" />
                            <select id="numero_control" name="numero_control" class="w-full mt-2 mb-2 border bg-white rounded px-3 py-2 outline-none">
                                @foreach ($estudiantes as $key => $estudiante)
                                  <option value="{{ $estudiante['usuario']['id'] }}" >
                                      {{ $estudiante['numero_control'] . " - " . $estudiante['usuario']['nombre'] . " " . $estudiante['usuario']['apellidos'] }}
                                  </option>
                                  @endforeach
                                  </select>
                        </div>

                        <!-- Fecha -->
                        <div class="mt-4">
                            <x-label for="fecha" class="text-gray-600 font-light" :value="__('Fecha')" />

                            <x-input id="fecha" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="date" name="fecha" required autofocus />
                        </div>

                        <!-- hora -->
                        <div class="mt-4">
                            <x-label for="hora" class="text-gray-600 font-light" :value="__('Hora')" />

                            <x-input id="hora" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="texto" name="hora" required />
                        </div>

                        <!-- Comentarios -->
                        <div class="mt-4">
                            <x-label for="comentarios" class="text-gray-600 font-light" :value="__('Comentarios')" />

                            <x-input id="comentarios" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="texto" name="comentarios" required />
                        </div>

                        @if(getUserRole(Auth::user()) == "Administrador" || (getUserRole(Auth::user()) == "Coordinador"))
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="mb-1 w-full bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">
                                {{ __('Asignar fecha') }}
                            </x-button>
                           
                            
                        </div>
                        
                        <div class="flex items-center justify-end mt-4">
                        <x-button class="mb-1 w-full bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">
                                {{ __('Editar') }}
                            </x-button>
                        </div>
                        @endif
                    </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
