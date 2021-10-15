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
                              text-align: center;

                              }
                              
                              </style>
                                <tr>
                                  <th style="width: 33%">Estudiante</th>
                                  <th style="width: 33%">Número de control</th>
                                  <th></th>
                                  
                                </tr>
               @foreach ($tesis as $t) 
                    <div>
               
                      <!--  <h1 class="text-blue-400 p-2"><b>Estudiante:</b> {{ $t->estudiante->usuario->nombre }} {{ $t->estudiante->usuario->apellidos }}</h1>
                        <h1 class="text-blue-400 p-2"><b>Numero de control:</b> {{ $t->estudiante->numero_control }}</h1>
                        <style>
                            .btn {
                            background-color: blue;
                            border: none;
                            color: white;
                            padding: 10px 32px;
                            text-align: center;
                            font-size: 16px;
                            margin: 4px 2px;
                            opacity: 1;
                            transition: 0.3s;
                            }

                            .btn:hover {opacity: 0.6}
                            </style>
                            </head>
                            <body>
                            <button class="btn">Revisar documentacion</button> -->

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
                              text-align: center;

                              }
                              
                              </style>
                                <th style="width: 33%"></th>
                                  <th style="width: 33%"></th>
                                  <th></th>
                
                                <tr>
                                  <td>{{ $t->estudiante->usuario->nombre }} {{ $t->estudiante->usuario->apellidos }}</td>
                                  <td>{{ $t->estudiante->numero_control }}</td>
                                  <td> 
                                  <style>
                            .btn {
                            background-color: blue;
                            border: none;
                            color: white;
                            padding: 10px 32px;
                            text-align: center;
                            font-size: 16px;
                            margin: 4px 2px;
                            opacity: 1;
                            transition: 0.3s;
                            margin-top: 1%;
                            margin-bottom: 1%;
                            }

                            .btn:hover {opacity: 0.6}
                            </style>
                            </head>
                            <body>
                            <button class="btn"><a href="{{ route('egresorevisardoc')}}"> Documentación</a></button>
                            </td>
                        </tr>
                          @endforeach
                                
                          </table>
                    </div>
              
                </div>
            </div>
        </div>
    </div>
</x-app-layout>