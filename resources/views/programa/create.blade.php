<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear programa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('crear-programa') }}">
                        @csrf

                        <!-- Nombre -->
                        <div>
                            <x-label for="nombre" class="text-gray-600 font-light" :value="__('Nombre')" />
                            <x-input id="nombre" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="nombre" :value="old('nombre')" required autofocus />
                        </div>

                        <!-- Impacto -->
                        <div>
                            <x-label for="impacto" class="text-gray-600 font-light" :value="__('Impacto')" />
                            <textarea name="impacto" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea>
                        </div>

                        <!-- Parte Grupo Proyectos -->
                        <div>
                            <x-label for="part_grupos_proyectos" class="text-gray-600 font-light" :value="__('Parte Grupo Proyectos')" />
                            <textarea name="part_grupos_proyectos" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"></textarea>
                        </div>

                        <!-- Servicios prestados -->
                        <div>
                            <x-label for="servicios_prestados" class="text-gray-600 font-light" :value="__('Servicios prestados')" />
                            <textarea name="servicios_prestados" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"></textarea>
                        </div>

                        <!-- Datos relevantes -->
                        <div>
                            <x-label for="datos_relevantes" class="text-gray-600 font-light" :value="__('Datos relevantes')" />
                            <textarea name="datos_relevantes" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"></textarea>
                        </div>

                        <!-- ORIENTACIÓN -->
                        <div class="flex items-center mb-4 mt-2">
                            <input type="checkbox" class="h-6 w-6 text-gray-700 border rounded mr-2" name="orientacion" />
                            <x-label for="orientacion" class="text-gray-600 font-light" :value="__('Orientación')" />
                        </div>

                        <!-- Justificación Orientación -->
                        <div>
                            <x-label for="justificacion_orientacion" class="text-gray-600 font-light" :value="__('Justificación Orientación')" />
                            <textarea name="justificacion_orientacion" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"></textarea>
                        </div>

                        <!-- Linea de investigación -->
                        <div class="mt-4">
                            <x-label for="lineas_investigacion" class="text-gray-600 font-light" :value="__('Linea de investigación')" />

                            <select id="lineas_investigacion" name="lineas_investigacion" class="w-full mt-2 mb-2 border bg-white rounded px-3 py-2 outline-none">
                                @foreach ($lineas as $key => $linea)
                                    <option value="{{ $linea->id }}" >
                                        {{ $linea->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="mb-1 w-full bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">
                                {{ __('Crear') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
