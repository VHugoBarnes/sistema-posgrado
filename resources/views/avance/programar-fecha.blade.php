<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Programar fecha y hora de presentación de avance') }}
      </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
              
              <form method="POST" action="{{ route('presentacion-avance.programar-fecha') }}">
                @csrf

                <!-- Numero control -->
                <div>
                    <x-label for="numero_control" class="text-gray-600 font-light" :value="__('Numero de Control')" />

                    <x-input id="numero_control" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="numero_control"  autofocus />
                </div>

                <!-- Fecha -->
                <div class="mt-4">
                    <x-label for="fecha" class="text-gray-600 font-light" :value="__('Fecha')" />

                    <x-input id="fecha" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="date" name="fecha" required autofocus />
                </div>

                <!-- Hora -->
                <div class="mt-4">
                    <x-label for="hora" class="text-gray-600 font-light" :value="__('Hora')" />

                    <x-input id="hora" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="hora" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="mb-1 w-full bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">
                        {{ __('Asignar fecha') }}
                    </x-button>
                </div>
            </form>

            </div>
        </div>
      </div>
    </div>
</x-app-layout>