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
                            <x-label for="nombre" :value="__('Nombre')" />

                            <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus />
                        </div>

                        <!-- Impacto -->
                        <div>
                            <x-label for="impacto" :value="__('Impacto')" />

                            <textarea name="impacto" class="block font-medium text-sm text-gray-700"></textarea>
                        </div>

                        <!-- Parte Grupo Proyectos -->
                        <div>
                            <x-label for="part_grupos_proyectos" :value="__('Parte Grupo Proyectos')" />

                            <textarea name="part_grupos_proyectos" class="block font-medium text-sm text-gray-700"></textarea>
                        </div>

                        <!-- Servicios prestados -->
                        <div>
                            <x-label for="servicios_prestados" :value="__('Servicios prestados')" />

                            <textarea name="servicios_prestados" class="block font-medium text-sm text-gray-700"></textarea>
                        </div>

                        <!-- Datos relevantes -->
                        <div>
                            <x-label for="datos_relevantes" :value="__('Datos relevantes')" />

                            <textarea name="datos_relevantes" class="block font-medium text-sm text-gray-700"></textarea>
                        </div>

                        <!-- ORIENTACIÓN -->
                        <div class="mt-4">
                            <x-label for="orientacion" :value="__('Orientación')" />

                            <input type="checkbox" name="orientacion" />
                        </div>

                        <!-- Justificación Orientación -->
                        <div>
                            <x-label for="justificacion_orientacion" :value="__('Justificación Orientación')" />

                            <textarea name="justificacion_orientacion" class="block font-medium text-sm text-gray-700"></textarea>
                        </div>

                        <!-- Linea de investigación -->
                        <div class="mt-4">
                            <x-label for="lineas_investigacion" :value="__('Linea de investigación')" />

                            <select id="lineas_investigacion" name="lineas_investigacion" class="block font-medium text-sm text-gray-700">
                                @foreach ($lineas as $key => $linea)
                                    <option value="{{ $linea->id }}" >
                                        {{ $linea->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Crear') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
