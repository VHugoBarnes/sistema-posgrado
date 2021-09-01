<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar estadia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form action="{{ route('estadia-estudiante-solicitud') }}" method="POST">
                        @csrf

                        <div>
                            <x-label for="nombre_empresa" class="text-gray-600 font-light" :value="__('Nombre empresa')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="nombre_empresa" :value="old('nombre_empresa')" autofocus required/>
                        </div>

                        <div>
                            <x-label for="asesor" class="text-gray-600 font-light" :value="__('Nombre asesor')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="asesor" :value="old('asesor')" autofocus required/>
                        </div>

                        <div>
                            <x-label for="puesto_asesor" class="text-gray-600 font-light" :value="__('Puesto asesor')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="puesto_asesor" :value="old('puesto_asesor')" autofocus required/>
                        </div>

                        <div>
                            <x-label for="area" class="text-gray-600 font-light" :value="__('Área')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="area" :value="old('area')" autofocus required/>
                        </div>

                        <div>
                            <x-label for="nombre_proyecto" class="text-gray-600 font-light" :value="__('Nombre del proyecto')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="nombre_proyecto" :value="old('nombre_proyecto')" autofocus required/>
                        </div>

                        <div>
                            <x-label for="desde" class="text-gray-600 font-light" :value="__('Fecha de inicio')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="date" name="desde" :value="old('desde')" autofocus required/>
                        </div>

                        <div>
                            <x-label for="hasta" class="text-gray-600 font-light" :value="__('Fecha de finalización')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="date" name="hasta" :value="old('hasta')" autofocus required/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="mb-1 w-full bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">
                                {{ __('Registrar') }}
                            </x-button>
                        </div>

                    </form>
                    <!--<form action="{{ route('estadia-estudiante-solicitud') }}" method="POST">
                        @csrf

                        <label for="nombre_empresa">Nombre de la empresa</label>
                        <input type="text" name="nombre_empresa" id="">

                        <label for="asesor">Nombre completo del asesor</label>
                        <input type="text" name="asesor" id="">

                        <label for="puesto_asesor">Puesto del asesor</label>
                        <input type="text" name="puesto_asesor" id="">

                        <label for="area">Área</label>
                        <input type="text" name="area" id="">

                        <label for="nombre_proyecto">Nombre del proyecto</label>
                        <input type="text" name="nombre_proyecto">

                        <label for="desde">Fecha de inicio</label>
                        <input type="date" name="desde" id="">

                        <label for="hasta">Fecha de finalización</label>
                        <input type="date" name="hasta">

                        <input type="submit" value="Solicitar carta presentación">

                    </form> -->

                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>