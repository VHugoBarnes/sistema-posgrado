<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar tesis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('guardar-tesis') }}">
                        @csrf

                        <!-- Título de la tesis -->
                        <div>
                            <x-label for="titulo" class="text-gray-600 font-light" :value="__('Título de la tesis')" />
                            <x-input id="titulo" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="titulo" :value="old('titulo')"  autofocus required />
                        </div>

                        <!-- Objetivo General -->
                        <div>
                            <x-label for="titulo" class="text-gray-600 font-light" :value="__('Objetivo general')" />
                            <textarea id="titulo" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" name="objetivo_general" :value="old('titulo')"  autofocus required ></textarea>
                        </div>

                        <!-- Objetivo Especifico -->
                        <div>
                            <x-label for="titulo" class="text-gray-600 font-light" :value="__('Objetivo específico')" />
                            <textarea id="titulo" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" name="objetivo_especifico" :value="old('titulo')"  autofocus required ></textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="mb-1 w-full bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">
                                {{ __('Registrar') }}
                            </x-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
