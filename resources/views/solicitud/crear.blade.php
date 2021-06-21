<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitud cambio de tesis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('modificar-tesis').'?asunto='.$asunto }}">
                        @csrf

                        <!-- Título de la tesis class="block mt-1 w-full disabled:opacity-50"-->
                        <div>
                            <x-label for="titulo" class="text-gray-600 font-light" :value="__('Título de la tesis')" />
                            <x-input id="titulo" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50 disabled:opacity-50" type="text" name="titulo" value="{{ $tesis->titulo }}"  autofocus required disabled/>
                        </div>
                        <!-- Título NUEVO de la tesis -->
                        <div class="pt-2">
                            <x-label for="titulo_nuevo" class="text-gray-600 font-light" :value="__('Título nuevo de la tesis')" />
                            <x-input id="titulo_nuevo" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="titulo_nuevo" :value="old('titulo')"  autofocus required />
                        </div>
                        <!-- Objetivo General -->
                        <div class="pt-8">
                            <x-label for="objetivo_general" class="text-gray-600 font-light" :value="__('Objetivo general')" />
                            <x-input id="objetivo_general" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50 disabled:opacity-50" type="text" name="objetivo_general" value="{{ $tesis->objetivo_general }}"  autofocus required disabled/>
                        </div>
                        <!-- Objetivo General NUEVO-->
                        <div class="pt-2">
                            <x-label for="objetivo_general_nuevo" class="text-gray-600 font-light" :value="__('Objetivo general nuevo')" />
                            <x-input id="objetivo_general_nuevo" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="objetivo_general_nuevo" :value="old('objetivo_general')"  autofocus required />
                        </div>
                        <!-- Objetivo Especifico -->
                        <div class="pt-8">
                            <x-label for="objetivo_especifico" class="text-gray-600 font-light" :value="__('Objetivo específico')" />
                            <x-input id="objetivo_especifico" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50 disabled:opacity-50"  type="text" name="objetivo_especifico" value="{{ $tesis->objetivo_especifico }}"  autofocus required disabled/>
                        </div>
                        <!-- Objetivo Especifico NUEVO -->
                        <div class="pt-2">
                            <x-label for="objetivo_especifico_nuevo" class="text-gray-600 font-light" :value="__('Objetivo específico nuevo')" />
                            <x-input id="objetivo_especifico_nuevo" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50"type="text" name="objetivo_especifico_nuevo" :value="old('objetivo_especifico')"  autofocus required />
                        </div>
                        <!-- Justificación -->
                        <div class="pt-2">
                            <x-label for="justificacion" class="text-gray-600 font-light" :value="__('Justificación')" />
                            <textarea id="justificacion" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" name="justificacion" :value="old('justificacion')"  autofocus required></textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="mb-1 w-full bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">
                                {{ __('Solicitar cambio') }}
                            </x-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>