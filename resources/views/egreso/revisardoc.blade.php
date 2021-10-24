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
                   <!-- @foreach ($tesis as $t) @endforeach-->
                    <form action="{{ route('egresorevisardoc', ['usuario_id'=>$t->estudiante->usuario_id]) }}" method="POST">
                  

                    <style>
                    
                    .btn {
                    width: 100%;
                    border: 2px solid black;
                    background-color: inherit;
                    padding: 7px 68px;
                    font-size: 15px;
                    cursor: pointer;
                    }


                    /* Azul */
                    
                    .boton1 {
                    border-color: #2196F3;
                    color: dodgerblue;
                    }

                    .boton1:hover {
                    background: #2196F3;
                    color: white;
                    }
                    /* Morado */

                    .boton2 {
                    border-color: #8B5CF6;
                    color: #8B5CF6;
                    }

                    .boton2:hover {
                    background: #8B5CF6;
                    color: white;
                    }

                    </style>
                        @csrf


                        <div>
                            <x-label for="liberacion_tesis" class="text-gray-600 font-light" :value="__('1. Liberación de tesis')" />
                            <button class="btn boton1"><a href="{{ route('archivo')}}">Revisar documento</a></button>
                             <!--<div class="form-check">
                            <input type="radio" value="1" class="form-check-input" name="estadoA" id="estadoA">
                            <label for="estadoA" class="form-check-label">
                                Aprobar documento </label>
                                <input type="radio" value="0" class="form-check-input" name="estadoR" id="estadoR">
                            <label for="estadoR" class="form-check-label">
                                Rechazar documento </label>
                            </div>-->
                            <x-label for="Comentarios" class="text-gray-600 font-light" :value="__('Comentarios:')" />
                            <textarea name="Comentarios" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea></div>
                            <br>
                            <br>
                            <br>
                        

                         <div>
                            <x-label for="tesis_ultima_version" class="text-gray-600 font-light" :value="__('2. Tesis última versión')" />
                            <button class="btn boton2">Revisar documento</button>
                            <!-- <div class="form-check">
                            <input type="radio" value="1" class="form-check-input" name="estadoA1" id="estadoA1">
                            <label for="estadoA1" class="form-check-label">
                                Aprobar documento </label>
                                <input type="radio" value="0" class="form-check-input" name="estadoR1" id="estadoR1">
                            <label for="estadoR1" class="form-check-label">
                                Rechazar documento </label></div>-->
                            <x-label for="Comentarios" class="text-gray-600 font-light" :value="__('Comentarios:')" />
                            <textarea name="Comentarios" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea></div>
                            <br>
                            <br>
                            <br>


                        <div>
                            <x-label for="constancia_plagio" class="text-gray-600 font-light" :value="__('3. Constancia de no plagio')" />
                            <button class="btn boton1">Revisar documento</button>
                             <!--<div class="form-check">
                            <input type="radio" value="1" class="form-check-input" name="estadoA2" id="estadoA2">
                            <label for="estadoA2" class="form-check-label">
                                Aprobar documento </label>
                                <input type="radio" value="0" class="form-check-input" name="estadoR2" id="estadoR2">
                            <label for="estadoR2" class="form-check-label">
                                Rechazar documento </label></div>-->
                            <x-label for="Comentarios" class="text-gray-600 font-light" :value="__('Comentarios:')" />
                            <textarea name="Comentarios" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea></div>
                            <br>
                            <br>
                            <br>


                        <div>
                            <x-label for="estadia" class="text-gray-600 font-light" :value="__('4. Estadía técnica')" />
                            <button class="btn boton2">Revisar documento</button>
                             <!--<div class="form-check">
                            <input type="radio" value="1" class="form-check-input" name="estadoA3" id="estadoA3">
                            <label for="estadoA3" class="form-check-label">
                                Aprobar documento </label>
                                <input type="radio" value="0" class="form-check-input" name="estadoR3" id="estadoR3">
                            <label for="estadoR3" class="form-check-label">
                                Rechazar documento </label></div>-->
                            <x-label for="Comentarios" class="text-gray-600 font-light" :value="__('Comentarios:')" />
                            <textarea name="Comentarios" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea></div>
                            <br>
                            <br>
                            <br>


                        <div>
                            <x-label for="articulo" class="text-gray-600 font-light" :value="__('5. Publicación de artículo')" />
                            <button class="btn boton1">Revisar documento</button>
                            <!-- <div class="form-check">
                            <input type="radio" value="1" class="form-check-input" name="estadoA4" id="estadoA4">
                            <label for="estadoA4" class="form-check-label">
                                Aprobar documento </label>
                                <input type="radio" value="0" class="form-check-input" name="estadoR4" id="estadoR4">
                            <label for="estadoR4" class="form-check-label">
                                Rechazar documento </label></div>-->
                            <x-label for="Comentarios" class="text-gray-600 font-light" :value="__('Comentarios:')" />
                            <textarea name="Comentarios" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea></div>
                            <br>
                            <br>
                            <br>


                        <div>
                            <x-label for="evaluacion_desemp" class="text-gray-600 font-light" :value="__('6. Evaluación del desempeño del becario')" />
                            <button class="btn boton2">Revisar documento</button>
                             <!--<div class="form-check">
                            <input type="radio" value="1" class="form-check-input" name="estadoA5" id="estadoA5">
                            <label for="estadoA5" class="form-check-label">
                                Aprobar documento </label>
                                <input type="radio" value="0" class="form-check-input" name="estadoR5" id="estadoR5">
                            <label for="estadoR5" class="form-check-label">
                                Rechazar documento </label></div>-->
                            <x-label for="Comentarios" class="text-gray-600 font-light" :value="__('Comentarios:')" />
                            <textarea name="Comentarios" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea></div>
                            <br>
                            <br>
                            <br>


                        <div>
                            <x-label for="cvu" class="text-gray-600 font-light" :value="__('7. CVU Conacyt actualizado')" />
                            <button class="btn boton1">Revisar documento</button>
                             <!--<div class="form-check">
                            <input type="radio" value="1" class="form-check-input" name="estadoA6" id="estadoA6">
                            <label for="estadoA6" class="form-check-label">
                                Aprobar documento </label>
                                <input type="radio" value="0" class="form-check-input" name="estadoR6" id="estadoR6">
                            <label for="estadoR6" class="form-check-label">
                                Rechazar documento </label></div>-->
                            <x-label for="Comentarios" class="text-gray-600 font-light" :value="__('Comentarios:')" />
                            <textarea name="Comentarios" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea></div>
                            <br>
                            <br>
                            <br>


                        <div>
                            <x-label for="numero_cvu" class="text-gray-600 font-light" :value="__('8. Número de CVU + contraseña')" />
                            <button class="btn boton2">Revisar documento</button>
                            <!-- <div class="form-check">
                            <input type="radio" value="1" class="form-check-input" name="estadoA7" id="estadoA7">
                            <label for="estadoA7" class="form-check-label">
                                Aprobar documento </label>
                                <input type="radio" value="0" class="form-check-input" name="estadoR7" id="estadoR7">
                            <label for="estadoR7" class="form-check-label">
                                Rechazar documento </label></div>-->
                            <x-label for="Comentarios" class="text-gray-600 font-light" :value="__('Comentarios:')" />
                            <textarea name="Comentarios" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea></div>
                            <br>
                            <br>
                            <br>


                        <div>
                            <x-label for="encuesta_egresado" class="text-gray-600 font-light" :value="__('9. Encuesta de egresado')" />
                            <button class="btn boton1">Revisar documento</button>
                             <!--<div class="form-check">
                            <input type="radio" value="1" class="form-check-input" name="estadoA8" id="estadoA8">
                            <label for="estadoA8" class="form-check-label">
                                Aprobar documento </label>
                                <input type="radio" value="0" class="form-check-input" name="estadoR8" id="estadoR8">
                            <label for="estadoR8" class="form-check-label">
                                Rechazar documento </label></div>-->
                            <x-label for="Comentarios" class="text-gray-600 font-light" :value="__('Comentarios:')" />
                            <textarea name="Comentarios" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea></div>
                            <br>
                            <br>
                            <br>


                        <div>
                            <x-label for="validacion_ingles" class="text-gray-600 font-light" :value="__('10. Validación del idioma inglés')" />
                            <button class="btn boton2">Revisar documento</button>
                             <!--<div class="form-check">
                            <input type="radio" value="1" class="form-check-input" name="estadoA9" id="estadoA9">
                            <label for="estadoA9" class="form-check-label">
                                Aprobar documento </label>
                                <input type="radio" value="0" class="form-check-input" name="estadoR9" id="estadoR9">
                            <label for="estadoR9" class="form-check-label">
                                Rechazar documento </label></div>-->
                            <x-label for="Comentarios" class="text-gray-600 font-light" :value="__('Comentarios:')" />
                            <textarea name="Comentarios" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea></div>

                        <div>
                            <!--<x-label class="text-gray-600 font-light" :value="__('11. Actualizar Datos personales')" /></div>-->
                           <!-- <x-input id="" class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="file" name="nombre_empresa" :value="old('nombre_empresa')" autofocus required/>  -->                      </div>

                        

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="mb-1 w-full bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">
                                {{ __('Enviar Documentos a revision') }}
                            </x-button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>