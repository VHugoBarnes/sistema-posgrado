<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Revision de Documentacion de Egreso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form action="{{ route('egreso-estudiantes') }}" method="POST">
                        @csrf


                        <div>
                            <x-label for="nombre_empresa" class="text-gray-600 font-light" :value="__('1. Liberación de tesis')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="nombre_empresa" :value="old('nombre_empresa')" autofocus required/>
                        </div>
                        <div>
                            <x-label for="nombre_empresa" class="text-gray-600 font-light" :value="__('2. Tesis última versión')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="nombre_empresa" :value="old('nombre_empresa')" autofocus required/>                        </div>
                        <div>
                            <x-label for="nombre_empresa" class="text-gray-600 font-light" :value="__('3. Constancia de no plagio')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="nombre_empresa" :value="old('nombre_empresa')" autofocus required/>                        </div>
                        <div>
                            <x-label for="nombre_empresa" class="text-gray-600 font-light" :value="__('4. Estadía técnica')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="nombre_empresa" :value="old('nombre_empresa')" autofocus required/>                        </div>
                        <div>
                            <x-label for="nombre_empresa" class="text-gray-600 font-light" :value="__('5. Publicación de artículo')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="nombre_empresa" :value="old('nombre_empresa')" autofocus required/>                        </div>
                        <div>
                            <x-label for="nombre_empresa" class="text-gray-600 font-light" :value="__('6. Evaluación del desempeño del becario')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="nombre_empresa" :value="old('nombre_empresa')" autofocus required/>                        </div>
                        <div>
                            <x-label for="nombre_empresa" class="text-gray-600 font-light" :value="__('7. CVU Conacyt actualizado')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="nombre_empresa" :value="old('nombre_empresa')" autofocus required/>                        </div>
                        <div>
                            <x-label for="nombre_empresa" class="text-gray-600 font-light" :value="__('8. Número de CVU + contraseña')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="nombre_empresa" :value="old('nombre_empresa')" autofocus required/>                        </div>
                        <div>
                            <x-label for="nombre_empresa" class="text-gray-600 font-light" :value="__('9. Encuesta de egresado')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="nombre_empresa" :value="old('nombre_empresa')" autofocus required/>                        </div>
                        <div>
                            <x-label for="nombre_empresa" class="text-gray-600 font-light" :value="__('10. Validación del idioma inglés')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="nombre_empresa" :value="old('nombre_empresa')" autofocus required/>                        </div>
                        <div>
                            <x-label for="nombre_empresa" class="text-gray-600 font-light" :value="__('11. Datos personales actualizados')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="nombre_empresa" :value="old('nombre_empresa')" autofocus required/>                        </div>

                        

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="mb-1 w-full bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">
                                {{ __('Enviar Documentos a revision') }}
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