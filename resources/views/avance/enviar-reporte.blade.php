<x-app-layout>
  <x-slot name="header">
  @if(getUserRole(Auth::user()) == "Estudiante")
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Enviar reporte') }}
    </h2>
  @endif

  @if(getUserRole(Auth::user()) == "Administrador" || (getUserRole(Auth::user()) == "Coordinador"))
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Ver reporte') }}
    </h2>
  @endif
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
        <form method="POST" action="{{ route('presentacion-avance.enviar-reporte') }}">
                        @csrf

                        <!-- Numero de control -->
                        <div>
                            <x-label for="numero_control" class="text-gray-600 font-light" :value="__('Número de control y estudiante')" />
                            <x-input id="numero_control" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="numero_control"  autofocus />
                        </div>

                        <!-- Adjuntar reporte -->
                        <div>
                            <x-label for="reporte" class="text-gray-600 font-light" :value="__('Adjuntar reporte')" />

                            <x-input id="reporte" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="reporte"  autofocus />
                        </div>
                        @if(getUserRole(Auth::user()) == "Estudiante")
                        <!-- botones -->
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="mb-1 w-full bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">
                                {{ __('Enviar reporte') }}
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
