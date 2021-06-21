<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar infraestructura') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('actualizar-infraestructura') }}">
                        @method('PUT')
                        @csrf

                        <input type="hidden" name="id" value="{{ $infraestructura->id }}">

                        <!-- Nombre -->
                        <div>
                            <x-label for="nombre" class="text-gray-600 font-light" :value="__('Nombre')" />
                            <x-input id="nombre" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="nombre" value="{{ $infraestructura->nombre }}" required autofocus />
                        </div>

                        <!-- Tipo -->
                        <div>
                            <x-label for="tipo" class="text-gray-600 font-light" :value="__('Tipo')" />
                            <x-input id="tipo" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="tipo" value="{{ $infraestructura->tipo }}"  autofocus />
                        </div>

                        <!-- Caracteristicas -->
                        <div>
                            <x-label for="caracteristicas" class="text-gray-600 font-light" :value="__('Caracteristicas')" />
                            <x-input id="caracteristicas" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="caracteristicas" value="{{ $infraestructura->caracteristicas }}"  autofocus />
                        </div>

                        <!-- Observaciones -->
                        <div>
                            <x-label for="observaciones" class="text-gray-600 font-light" :value="__('Observaciones')" />
                            <x-input id="observaciones" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="observaciones" value="{{ $infraestructura->observaciones }}"  autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="mb-1 w-full bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">
                                {{ __('Editar') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
