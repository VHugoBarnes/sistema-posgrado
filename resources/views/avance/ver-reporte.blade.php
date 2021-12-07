<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Ver reporte') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
        <form method="POST" action="{{ route('presentacion-avance.ver-reporte') }}">
                        @csrf
                        <!-- buscar por nombre y numero de control -->
                        <div>
                            <x-label for="busqueda" class="text-gray-600 font-light" :value="__('Nombre del estudiante')" />
                            <x-input id="busqueda" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="busqueda"  autofocus />
                        </div>
                    </form>
       <!-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">Pendiente de subir reporte</h2> -->
        
        <div class="flex items-center justify-end mt-4">
          <x-button class="mb-1 w-full bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">
          {{ __('Buscar alumno') }}
          </x-button>                  
        </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>