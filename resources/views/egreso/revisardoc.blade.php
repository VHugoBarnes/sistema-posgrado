<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Documentacion de Egreso') }}
        </h2>
    </x-slot>
    <form action="{{ route('SubirRevision')}}" method="POST" enctype="multipart/form-data">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                   
                    <form action="{{ route('SubirRevision')}}" method="POST" enctype="multipart/form-data">
                  

                    <style>
                    
                    .btn {
                    width: 100%;
                    background-color: inherit;
                    padding: 7px 68px;
                    font-size: 15px;
                    cursor: pointer;
                    text-align: center;
                    }


                    /* Azul */
                    
                    .boton1 {
                    width: 100%;
                    border-color: #2196F3;
                    color: dodgerblue;
                    background-color: white;
                    }

                    .boton1:hover {
                    background: #2196F3;
                    color: white;
                    }
                    /* Morado */

                    .boton2 {
                    width: 100%;
                    border-color: #8B5CF6;
                    color: #8B5CF6;
                    background-color: white;
                    }

                    .boton2:hover {
                    background: #8B5CF6;
                    color: white;
                    }

                    </style>
                        @csrf
                   
                        

                        <div>
                          
                           <x-label for="estudiante_id" class="text-gray-600 font-light" :value="__('Estudiante ID:')"/>
                         
                            <textarea name="estudiante_id" rows="1"  readonly=»readonly» ><?php echo $usuario_id; ?></textarea>
                            <br>
                            <br>
                            <br>
                            </div>

                            <div>
                            <x-label for="liberacion_tesis" class="text-gray-600 font-light" :value="__('1. Liberación de tesis')" />
                            <x-button class="boton1"><a  class=" btn" href="{{ url('/storage/')}}/<?php echo $usuario_id ?>{{('/liberaciontesis/liberaciontesis.pdf')}}">Revisar documento   </a></x-button>
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
                            <x-button class="boton2"><a  class=" btn"  href="{{ url('/storage/')}}/<?php echo $usuario_id ?>{{('/tesis/tesis.pdf')}}">Revisar documento   </a></x-button>
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
                            <x-button class="boton1"><a  class=" btn" href="{{ url('/storage/')}}/<?php echo $usuario_id ?>{{('/plagio/plagio.pdf')}}">Revisar documento   </a></x-button>
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
                            <x-button class="boton2"><a  class=" btn" href="{{ url('/storage/')}}/<?php echo $usuario_id ?>{{('/estadia/estadia.pdf')}}">Revisar documento   </a></x-button>                            <div class="form-group">   
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
                            <x-button class="boton1"><a  class=" btn" href="{{ url('/storage/')}}/<?php echo $usuario_id ?>{{('/articulo/articulo.pdf')}}">Revisar documento   </a></x-button>
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
                            <x-button class="boton2"><a  class=" btn" href="{{ url('/storage/')}}/<?php echo $usuario_id ?>{{('/evaluacion/evaluacion.pdf')}}">Revisar documento   </a></x-button>                            <div class="form-group">   
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
                            <x-button class="boton1"><a  class=" btn" href="{{ url('/storage/')}}/<?php echo $usuario_id ?>{{('/cvu/cvu.pdf')}}">Revisar documento   </a></x-button>
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
                            <x-button class="boton2"><a  class=" btn" href="{{ url('/storage/')}}/<?php echo $usuario_id ?>{{('/numerocvu/numerocvu.pdf')}}">Revisar documento   </a></x-button>                            <div class="form-group">   
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
                            <x-button class="boton1"><a  class=" btn" href="{{ url('/storage/')}}/<?php echo $usuario_id ?>{{('/encuesta/encuesta.pdf')}}">Revisar documento   </a></x-button>
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
                            <x-button class="boton2"><a  class=" btn" href="{{ url('/storage/')}}/<?php echo $usuario_id ?>{{('/ingles/ingles.pdf')}}">Revisar documento   </a></x-button>                            <div class="form-group">   
                             <select name="estado_validacion_ingles" id="estado_validacion_ingles" class="form-control">
                                <option value="1">Aprobar documento</option>
                                <option value="0">Rechazar documento</option>
                                </select>
                              </div>

                            <x-label for="comentario_validacion_ingles" class="text-gray-600 font-light" :value="__('Comentarios:')" />
                            <textarea name="comentario_validacion_ingles" class="w-full mt-2 mb-2 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea></div>

                           
                   

                        <div>
                            

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