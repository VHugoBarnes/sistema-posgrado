<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Documentación de estudiantes') }}
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
                                  <th>Estado de Revision</th>
                                  
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
                              
                              </style>
                                <th style="width: 33%"></th>
                                  <th style="width: 33%"></th>
                                  <th></th>
               
                                <tr> 
                                  <td class="left">1. Liberación de tesis</td>
                                  @foreach ( $tesis as $t)
                                  <td class="center">{{ $t->comentariosdoc_egresos->estudiante_id }}</td> 
                                  @endforeach
                                  <td class="centerultimo">Estado <td>
                                      
                                 </tr>
                                
                                 <tr>
                                  <td class="left">2. Tesis última versión</td>
                                  <td class="center">swe</td>
                                  <td class="centerultimo">Estado <td>
                                 </tr>
                                 <tr>
                                  <td class="left">3. Constancia de no plagio</td>
                                  <td class="center">swe</td>
                                  <td class="centerultimo">Estado <td>
                                 </tr>
                                 <tr>
                                  <td class="left">4. Estadía técnica</td>
                                  <td class="center">swe</td>
                                  <td class="centerultimo">Estado <td>
                                 </tr>
                                 <tr>
                                  <td class="left">5. Publicación de artículo</td>
                                  <td class="center">swe</td>
                                  <td class="centerultimo">Estado <td>
                                 </tr>
                                 <tr>
                                  <td class="left">6. Evaluación del desempeño del becario</td>
                                  <td class="center">swe</td>
                                  <td class="centerultimo">Estado <td>
                                 </tr>
                                 <tr>
                                  <td class="left">7. CVU Conacyt actualizado</td>
                                  <td class="center">swe</td>
                                  <td class="centerultimo">Estado<td>
                                 </tr>
                                 <tr>
                                  <td class="left">8. Número de CVU + contraseña</td>
                                  <td class="center">swe</td>
                                  <td class="centerultimo">Estado <td>
                                 </tr>
                                 <tr>
                                  <td class="left">9. Encuesta de egresado</td>
                                  <td class="center">swe</td>
                                  <td class="centerultimo">Estado <td>
                                 </tr>
                                 <tr>
                                  <td class="left">10. Validación del idioma inglés</td>
                                  <td class="center">swe</td>
                                  <td class="centerultimo">Estado <td>
                                 </tr>
   
                          </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>