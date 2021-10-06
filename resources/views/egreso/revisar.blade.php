<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Documentacion de estudiantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @foreach ($tesis as $t)
                    <div>
               
                        <h1 class="text-blue-400 p-2"><b>Estudiante:</b> {{ $t->estudiante->usuario->nombre }} {{ $t->estudiante->usuario->apellidos }}</h1>
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
                            <button class="btn">Revisar documentacion</button>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>