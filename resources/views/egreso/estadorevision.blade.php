<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Estado de revisión de la Documentación') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <table  style="width: 100%">
                            <style>
                              table{
                              border-collapse: collapse;
                              border-spacing: 0;
                              width: 100%;
                              border: 1px solid #ddd;
                              }
                               th{
                               padding: 1px;
                               text-align: center;
                              }
                              td{
                              padding: 1px;
                              text-align: left;

                              }
                              
                              </style>
                                <tr>
                                  <th style="width: 33%">Documento</th>
                                  <th style="width: 33%">Comentarios</th>
                                  <th>Estado de Revisión</th>
                                  
                                </tr>
                    <div>
                        
                            <table  style="width: 100%">
                            <style>
                              table{
                              border-collapse: collapse;
                              border-spacing: 0;
                              width: 100%;
                              border: 1px solid #ddd;
                              }
                               th{
                               padding: 1px;
                               text-align: center;
                              
                              }
                              .left{
                              padding: 5px;
                              text-align: left;
                              border-bottom: 1px solid #ddd;
                              border-right: 1px solid #ddd;
                              

                              }
                              .center{
                              padding: 5px;
                              text-align: center;
                              border-bottom: 1px solid #ddd;
                              border-right: 1px solid #ddd;
                              

                              }
                              .centerultimo{
                              padding: 5px;
                              text-align: center;
                              border-bottom: 1px solid #ddd;
                              
                             
                              

                              } 
                              .aprobada{
                              color: green;
                              font-weight: bold;
                                
                              }

                              .rechazada{
                                color: red;
                                font-weight: bold;
                              }

                              .norevisada{
                                color: gray;
                                font-weight: bold;
                              }

                              .comentarionulo{
                                color: gray;
                              }
                              
                              </style>
                                <th style="width: 33%"></th>
                                  <th style="width: 33%"></th>
                                  <th></th>
               
                                <tr> 
                                  
                                  <td class="left">1. Liberación de tesis</td>
                                  @foreach($comentarios as $c)
                                  
                                  <?php if($c->comentario_liberacion_tesis == Null){?>
                                    <td class="center"><a class='comentarionulo'><i>Sin Comentarios...</i></a></td>
                                  <?php }else{?>
                                    <td class="center"> <a>{{$c->comentario_liberacion_tesis}}</a></td>
                                  <?php } ?>

                                  <?php if($c->estado_liberacion_tesis == 'Aprobado'){?>
                                    <td class="centerultimo"><a class='aprobada'> {{$c->estado_liberacion_tesis}}</a></td>
                                  <?php }elseif($c->estado_liberacion_tesis == 'Rechazado'){?>
                                    <td class="centerultimo"><a class='rechazada'> {{$c->estado_liberacion_tesis}}</a></td>
                                  <?php }else{?>
                                    <td class="centerultimo"> <a class='norevisada'>Aun no revisado</a></td>
                                 <?php } ?>
                                   @endforeach   
                                 </tr>
                                
                                 <tr>
                                  <td class="left">2. Tesis última versión</td>
                                  @foreach($comentarios as $c)
                                  
                                  <?php if($c->comentario_tesis_ultima_version == Null){?>
                                    <td class="center"><a class='comentarionulo'><i>Sin Comentarios...</i></a></td>
                                  <?php }else{?>
                                    <td class="center"> <a>{{$c->comentario_tesis_ultima_version}}</a></td>
                                  <?php } ?>

                                  <?php if($c->estado_tesis_ultima_version == 'Aprobado'){?>
                                    <td class="centerultimo"><a class='aprobada'> {{$c->estado_tesis_ultima_version}}</a></td>
                                  <?php }elseif($c->estado_tesis_ultima_version == 'Rechazado'){?>
                                    <td class="centerultimo"><a class='rechazada'> {{$c->estado_tesis_ultima_version}}</a></td>
                                  <?php }else{?>
                                    <td class="centerultimo"> <a class='norevisada'>Aun no revisado</a></td>
                                 <?php } ?>
                                  @endforeach
                                 </tr>

                                 <tr>
                                  <td class="left">3. Constancia de no plagio</td>
                                  @foreach($comentarios as $c)

                                  <?php if($c->comentario_constancia_plagio == Null){?>
                                    <td class="center"><a class='comentarionulo'><i>Sin Comentarios...</i></a></td>
                                  <?php }else{?>
                                    <td class="center"> <a>{{$c->comentario_constancia_plagio}}</a></td>
                                  <?php } ?>

                                  <?php if($c->estado_constancia_plagio == 'Aprobado'){?>
                                    <td class="centerultimo"><a class='aprobada'> {{$c->estado_constancia_plagio}}</a></td>
                                  <?php }elseif($c->estado_constancia_plagio == 'Rechazado'){?>
                                    <td class="centerultimo"><a class='rechazada'> {{$c->estado_constancia_plagio}}</a></td>
                                  <?php }else{?>
                                    <td class="centerultimo"> <a class='norevisada'>Aun no revisado</a></td>
                                 <?php } ?>
                                  @endforeach
                                 </tr>

                                 <tr>
                                  <td class="left">4. Estadía técnica</td>
                                  @foreach($comentarios as $c)

                                  <?php if($c->comentario_estadia == Null){?>
                                    <td class="center"><a class='comentarionulo'><i>Sin Comentarios...</i></a></td>
                                  <?php }else{?>
                                    <td class="center"> <a>{{$c->comentario_estadia}}</a></td>
                                  <?php } ?>

                                  <?php if($c->estado_estadia == 'Aprobado'){?>
                                    <td class="centerultimo"><a class='aprobada'> {{$c->estado_estadia}}</a></td>
                                  <?php }elseif($c->estado_estadia == 'Rechazado'){?>
                                    <td class="centerultimo"><a class='rechazada'> {{$c->estado_estadia}}</a></td>
                                  <?php }else{?>
                                    <td class="centerultimo"> <a class='norevisada'>Aun no revisado</a></td>
                                 <?php } ?>
                                  @endforeach
                                 </tr>

                                 <tr>
                                  <td class="left">5. Publicación de artículo</td>
                                  @foreach($comentarios as $c)

                                  <?php if($c->comentario_articulo == Null){?>
                                    <td class="center"><a class='comentarionulo'><i>Sin Comentarios...</i></a></td>
                                  <?php }else{?>
                                    <td class="center"> <a>{{$c->comentario_articulo}}</a></td>
                                  <?php } ?>

                                  <?php if($c->estado_articulo == 'Aprobado'){?>
                                    <td class="centerultimo"><a class='aprobada'> {{$c->estado_articulo}}</a></td>
                                  <?php }elseif($c->estado_articulo == 'Rechazado'){?>
                                    <td class="centerultimo"><a class='rechazada'> {{$c->estado_articulo}}</a></td>
                                  <?php }else{?>
                                    <td class="centerultimo"> <a class='norevisada'>Aun no revisado</a></td>
                                 <?php } ?>
                                  @endforeach
                                 </tr>

                                 <tr>
                                  <td class="left">6. Evaluación del desempeño del becario</td>
                                  @foreach($comentarios as $c)

                                  <?php if($c->comentario_evaluacion_desemp == Null){?>
                                    <td class="center"><a class='comentarionulo'><i>Sin Comentarios...</i></a></td>
                                  <?php }else{?>
                                    <td class="center"> <a>{{$c->comentario_evaluacion_desemp}}</a></td>
                                  <?php } ?>

                                  <?php if($c->estado_evaluacion_desemp == 'Aprobado'){?>
                                    <td class="centerultimo"><a class='aprobada'> {{$c->estado_evaluacion_desemp}}</a></td>
                                  <?php }elseif($c->estado_evaluacion_desemp == 'Rechazado'){?>
                                    <td class="centerultimo"><a class='rechazada'> {{$c->estado_evaluacion_desemp}}</a></td>
                                  <?php }else{?>
                                    <td class="centerultimo"> <a class='norevisada'>Aun no revisado</a></td>
                                 <?php } ?>
                                  @endforeach
                                 </tr>

                                 <tr>
                                  <td class="left">7. CVU Conacyt actualizado</td>
                                  @foreach($comentarios as $c)

                                  <?php if($c->comentario_cvu == Null){?>
                                    <td class="center"><a class='comentarionulo'><i>Sin Comentarios...</i></a></td>
                                  <?php }else{?>
                                    <td class="center"> <a>{{$c->comentario_cvu}}</a></td>
                                  <?php } ?>

                                  <?php if($c->estado_cvu == 'Aprobado'){?>
                                    <td class="centerultimo"><a class='aprobada'> {{$c->estado_cvu}}</a></td>
                                  <?php }elseif($c->estado_cvu == 'Rechazado'){?>
                                    <td class="centerultimo"><a class='rechazada'> {{$c->estado_cvu}}</a></td>
                                  <?php }else{?>
                                    <td class="centerultimo"> <a class='norevisada'>Aun no revisado</a></td>
                                 <?php } ?>
                                  @endforeach
                                 </tr>

                                 <tr>
                                  <td class="left">8. Número de CVU + contraseña</td>
                                  @foreach($comentarios as $c)

                                  <?php if($c->comentario_numero_cvu == Null){?>
                                    <td class="center"><a class='comentarionulo'><i>Sin Comentarios...</i></a></td>
                                  <?php }else{?>
                                    <td class="center"> <a>{{$c->comentario_numero_cvu}}</a></td>
                                  <?php } ?>

                                  <?php if($c->estado_numero_cvu == 'Aprobado'){?>
                                    <td class="centerultimo"><a class='aprobada'> {{$c->estado_numero_cvu}}</a></td>
                                  <?php }elseif($c->estado_numero_cvu == 'Rechazado'){?>
                                    <td class="centerultimo"><a class='rechazada'> {{$c->estado_numero_cvu}}</a></td>
                                  <?php }else{?>
                                    <td class="centerultimo"> <a class='norevisada'>Aun no revisado</a></td>
                                 <?php } ?>
                                  @endforeach
                                 </tr>
                                 
                                 <tr>
                                  <td class="left">9. Encuesta de egresado</td>
                                  @foreach($comentarios as $c)
                                  
                                  <?php if($c->comentario_encuesta_egresado == Null){?>
                                    <td class="center"><a class='comentarionulo'><i>Sin Comentarios...</i></a></td>
                                  <?php }else{?>
                                    <td class="center"> <a>{{$c->comentario_encuesta_egresado}}</a></td>
                                  <?php } ?>

                                  <?php if($c->estado_encuesta_egresado == 'Aprobado'){?>
                                    <td class="centerultimo"><a class='aprobada'> {{$c->estado_encuesta_egresado}}</a></td>
                                  <?php }elseif($c->estado_encuesta_egresado == 'Rechazado'){?>
                                    <td class="centerultimo"><a class='rechazada'> {{$c->estado_encuesta_egresado}}</a></td>
                                  <?php }else{?>
                                    <td class="centerultimo"> <a class='norevisada'>Aun no revisado</a></td>
                                 <?php } ?>
                                  @endforeach
                                 </tr>

                                 <tr>
                                  <td class="left">10. Validación del idioma inglés</td>
                                  @foreach($comentarios as $c)
                                  <?php if($c->comentario_validacion_ingles == Null){?>
                                    <td class="center"><a class='comentarionulo'><i>Sin Comentarios...</i></a></td>
                                  <?php }else{?>
                                    <td class="center"> <a>{{$c->comentario_validacion_ingles}}</a></td>
                                  <?php } ?>

                                  <?php if($c->estado_validacion_ingles == 'Aprobado'){?>
                                    <td class="centerultimo"><a class='aprobada'> {{$c->estado_validacion_ingles}}</a></td>
                                  <?php }elseif($c->estado_validacion_ingles == 'Rechazado'){?>
                                    <td class="centerultimo"><a class='rechazada'> {{$c->estado_validacion_ingles}}</a></td>
                                  <?php }else{?>
                                    <td class="centerultimo"> <a class='norevisada'>Aun no revisado</a></td>
                                  <?php } ?>
                                  @endforeach
                                 </tr>
                               
                              
                          </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>