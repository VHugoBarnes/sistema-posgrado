<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles 
        <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->

        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <!-- Footer -->
        <footer class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap md:text-left text-center order-first">
                <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                    <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">SEGUIMIENTO</h2>
                    <nav class="list-none mb-10">
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">Presentación de avance</a>
                    </li>
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">Reporte Cotacyt</a>
                    </li>
                    </nav>
                </div>
                <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                    <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">TESIS</h2>
                    <nav class="list-none mb-10">
                    <li>
                        <a class="text-gray-600 hover:text-gray-800" href="{{ url('/tesis') }}">Tesis</a>
                    </li>
                    <li>
                        <a class="text-gray-600 hover:text-gray-800" href="{{ url('/cambio-tema') }}">Cambio de Tema</a>
                    </li>
                    <li>
                        <a class="text-gray-600 hover:text-gray-800" href="{{ url('/cambio-titulo') }}">Modificación de título</a>
                    </li>
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">Modificación de objetivos</a>
                    </li>
                    </nav>
                </div>
                <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                    <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">EGRESO</h2>
                    <nav class="list-none mb-10">
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">Publicación</a>
                    </li>
                    <li>
                        <a class="text-gray-600 hover:text-gray-800" href="{{ url('/estadia-estudiante-solicitud') }}">Estadía Técnica</a>
                    </li>
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">Constancia no plagio</a>
                    </li>
                    </nav>
                </div>
                <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                    <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">ENLACES</h2>
                    <nav class="list-none mb-10">
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">Programación de avance de tesis</a>
                    </li>
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">Calendario MAI 2021</a>
                    </li>
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">Temas de Tésis Generación 20-22</a>
                    </li>
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">Temas de Tésis Gener 19-21</a>
                    </li>
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">Contacto</a>
                    </li>
                    </nav>
                </div>
            </div>
        </div>
        <div class="bg-gray-100">
            <div class="container px-5 py-6 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                <span class="ml-3 text-xl">SisPosgrado</span>
            </a>
            <p class="text-sm text-gray-500 sm:ml-6 sm:mt-0 mt-4">
                <a href="https://www.facebook.com/MAITecNMMatamoros" rel="noopener noreferrer" class="text-gray-600 ml-1" target="_blank">@MAITecNMMatamoros</a>
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                <a class="text-gray-500" href="https://www.facebook.com/MAITecNMMatamoros">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                </a>
            </span>
            </div>
        </div>
        </footer>
    </body>
</html>
