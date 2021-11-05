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
                   @foreach ($tesis as $t) @endforeach
                    <form action="{{ route('SubirRevision')}}" method="POST" enctype="multipart/form-data">
                  

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
                            <button class="btn boton1"><a href="">Revisar documento</a></button>

                             <div class="form-group">   
                             <select name="estado_liberacion_tesis" id="estado_liberacion_tesis" class="form-control">
                                <option value="1">Aprobar documento</option>
                                <option value="0">Rechazar documento</option>
                                </select>
                              </div>
                            
                            <x-label for="comentario_liberacion_tesis" class="text-gray-600 font-light" :value="__('Comentarios:')" />
                            <textarea name="comentario_liberacion_tesis" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea></div>
                            <br>
                            <br>
                            <br>
                        

                         <div>
                            <x-label for="tesis_ultima_version" class="text-gray-600 font-light" :value="__('2. Tesis última versión')" />
                            <button class="btn boton2">Revisar documento</button>
                            <div class="form-group">   
                             <select name="estado_tesis_ultima_version" id="estado_tesis_ultima_version" class="form-control">
                                <option value="1">Aprobar documento</option>
                                <option value="0">Rechazar documento</option>
                                </select>
                              </div>

                            <x-label for="comentario_tesis_ultima_version" class="text-gray-600 font-light" :value="__('Comentarios:')" />
                            <textarea name="comentario_tesis_ultima_version" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea></div>
                            <br>
                            <br>
                            <br>


                        <div>
                            <x-label for="constancia_plagio" class="text-gray-600 font-light" :value="__('3. Constancia de no plagio')" />
                            <button class="btn boton1">Revisar documento</button>
                            <div class="form-group">   
                             <select name="estado_constancia_plagio" id="estado_constancia_plagio" class="form-control">
                                <option value="1">Aprobar documento</option>
                                <option value="0">Rechazar documento</option>
                                </select>
                              </div>

                            <x-label for="comentario_constancia_plagio" class="text-gray-600 font-light" :value="__('Comentarios:')" />
                            <textarea name="comentario_constancia_plagio" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea></div>
                            <br>
                            <br>
                            <br>


                        <div>
                            <x-label for="estadia" class="text-gray-600 font-light" :value="__('4. Estadía técnica')" />
                            <button class="btn boton2">Revisar documento</button>
                            <div class="form-group">   
                             <select name="estado_estadia" id="estado_estadia" class="form-control">
                                <option value="1">Aprobar documento</option>
                                <option value="0">Rechazar documento</option>
                                </select>
                              </div>

                            <x-label for="comentario_estadia" class="text-gray-600 font-light" :value="__('Comentarios:')" />
                            <textarea name="comentario_estadia" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea></div>
                            <br>
                            <br>
                            <br>


                        <div>
                            <x-label for="articulo" class="text-gray-600 font-light" :value="__('5. Publicación de artículo')" />
                            <button class="btn boton1">Revisar documento</button>
                            <div class="form-group">   
                             <select name="estado_articulo" id="estado_articulo" class="form-control">
                                <option value="1">Aprobar documento</option>
                                <option value="0">Rechazar documento</option>
                                </select>
                              </div>

                            <x-label for="comentario_articulo" class="text-gray-600 font-light" :value="__('Comentarios:')" />
                            <textarea name="comentario_articulo" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea></div>
                            <br>
                            <br>
                            <br>


                        <div>
                            <x-label for="evaluacion_desemp" class="text-gray-600 font-light" :value="__('6. Evaluación del desempeño del becario')" />
                            <button class="btn boton2">Revisar documento</button>
                            <div class="form-group">   
                             <select name="estado_evaluacion_desemp" id="estado_evaluacion_desemp" class="form-control">
                                <option value="1">Aprobar documento</option>
                                <option value="0">Rechazar documento</option>
                                </select>
                              </div>

                            <x-label for="comentario_evaluacion_desemp" class="text-gray-600 font-light" :value="__('Comentarios:')" />
                            <textarea name="comentario_evaluacion_desemp" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea></div>
                            <br>
                            <br>
                            <br>


                        <div>
                            <x-label for="cvu" class="text-gray-600 font-light" :value="__('7. CVU Conacyt actualizado')" />
                            <button class="btn boton1">Revisar documento</button>
                            <div class="form-group">   
                             <select name="estado_cvu" id="estado_cvu" class="form-control">
                                <option value="1">Aprobar documento</option>
                                <option value="0">Rechazar documento</option>
                                </select>
                              </div>

                            <x-label for="comentario_cvu" class="text-gray-600 font-light" :value="__('Comentarios:')" />
                            <textarea name="comentario_cvu" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea></div>
                            <br>
                            <br>
                            <br>


                        <div>
                            <x-label for="numero_cvu" class="text-gray-600 font-light" :value="__('8. Número de CVU + contraseña')" />
                            <button class="btn boton2">Revisar documento</button>
                            <div class="form-group">   
                             <select name="estado_numero_cvu" id="estado_numero_cvu" class="form-control">
                                <option value="1">Aprobar documento</option>
                                <option value="0">Rechazar documento</option>
                                </select>
                              </div>

                            <x-label for="comentario_numero_cvu" class="text-gray-600 font-light" :value="__('Comentarios:')" />
                            <textarea name="comentario_numero_cvu" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea></div>
                            <br>
                            <br>
                            <br>


                        <div>
                            <x-label for="encuesta_egresado" class="text-gray-600 font-light" :value="__('9. Encuesta de egresado')" />
                            <button class="btn boton1">Revisar documento</button>
                            <div class="form-group">   
                             <select name="estado_encuesta_egresado" id="estado_encuesta_egresado" class="form-control">
                                <option value="1">Aprobar documento</option>
                                <option value="0">Rechazar documento</option>
                                </select>
                              </div>

                            <x-label for="comentario_encuesta_egresado" class="text-gray-600 font-light" :value="__('Comentarios:')" />
                            <textarea name="comentario_encuesta_egresado" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea></div>
                            <br>
                            <br>
                            <br>


                        <div>
                            <x-label for="validacion_ingles" class="text-gray-600 font-light" :value="__('10. Validación del idioma inglés')" />
                            <button class="btn boton2">Revisar documento</button>
                            <div class="form-group">   
                             <select name="estado_validacion_ingles" id="estado_validacion_ingles" class="form-control">
                                <option value="1">Aprobar documento</option>
                                <option value="0">Rechazar documento</option>
                                </select>
                              </div>

                            <x-label for="comentario_validacion_ingles" class="text-gray-600 font-light" :value="__('Comentarios:')" />
                            <textarea name="comentario_validacion_ingles" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea></div>

                            <x-label for="estudiante_id" class="text-gray-600 font-light" :value="__('ID del Estudiante:')" />
                            <textarea name="estudiante_id" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="1"></textarea></div>
                   

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