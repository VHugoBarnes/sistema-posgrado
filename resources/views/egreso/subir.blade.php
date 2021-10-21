<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Documentacion de Egreso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form action="{{ route('guardar-egreso') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div>
                            <x-label for="liberacion_tesis" class="text-gray-600 font-light" :value="__('1. Liberación de tesis')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="liberacion_tesis" :value="old('liberacion_tesis')"/>
                        </div>
                         <div>
                            <x-label for="tesis_ultima_version" class="text-gray-600 font-light" :value="__('2. Tesis última versión')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="tesis_ultima_version" :value="old('tesis_ultima_version')"/>                        </div>
                        <div>
                            <x-label for="constancia_plagio" class="text-gray-600 font-light" :value="__('3. Constancia de no plagio')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="constancia_plagio" :value="old('constancia_plagio')"/>                        </div>
                        <div>
                            <x-label for="estadia" class="text-gray-600 font-light" :value="__('4. Estadía técnica')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="estadia" :value="old('estadia')"/>                        </div>
                        <div>
                            <x-label for="articulo" class="text-gray-600 font-light" :value="__('5. Publicación de artículo')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="articulo" :value="old('articulo')"/>                        </div>
                        <div>
                            <x-label for="evaluacion_desemp" class="text-gray-600 font-light" :value="__('6. Evaluación del desempeño del becario')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="evaluacion_desemp" :value="old('evaluacion_desemp')"/>                        </div>
                        <div>
                            <x-label for="cvu" class="text-gray-600 font-light" :value="__('7. CVU Conacyt actualizado')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="cvu" :value="old('cvu')"/>                        </div>
                        <div>
                            <x-label for="numero_cvu" class="text-gray-600 font-light" :value="__('8. Número de CVU + contraseña')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="numero_cvu" :value="old('numero_cvu')"/>                        </div>
                        <div>
                            <x-label for="encuesta_egresado" class="text-gray-600 font-light" :value="__('9. Encuesta de egresado')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="encuesta_egresado" :value="old('encuesta_egresado')"/>                        </div>
                        <div>
                            <x-label for="validacion_ingles" class="text-gray-600 font-light" :value="__('10. Validación del idioma inglés')" />
                            <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="validacion_ingles" :value="old('validacion_ingles')"/>                        </div>
                        <div>
                            <x-label class="text-gray-600 font-light" :value="__('11. Actualizar Datos personales')" />
                           <!-- <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="nombre_empresa" :value="old('nombre_empresa')" autofocus required/>  -->                      </div>

                        

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