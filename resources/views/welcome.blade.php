<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

    </head>
    <body class="antialiased">
        <!-- component -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
            <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                <div class="p-4 flex flex-row items-center justify-between">
                    <a href="#" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">SISTEMA DE POSGRADO</a>
                    <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
                    @if (Route::has('login'))
                        <div>
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">Dashboard</a>
                                <a class="text-sm text-gray-700">Hola {{ Auth::user()->nombre }}!</a>
                            @else
                                <a href="{{ route('login') }}" class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">Iniciar sesión</a>
                            @endauth
                        </div>
                    @endif
                </nav>
            </div>
        </div>

        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <x-auth-session-status class="mb-4 text-blue-600 my-8 p-4 bg-blue-200 rounded-lg" :status="session('message')" />

                <section class="text-gray-600 body-font">
                    <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
                        <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="{{ asset('/assets')}}/pixeltrue-welcome-1.svg" width="200" id="img1">
                        <div class="text-center lg:w-2/3 w-full">
                        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Maestría en Administración Industrial</h1>
                        @auth
                        <div class="flex justify-center">
                            <a href="{{ route('dashboard') }}" class="inline-flex text-white bg-purple-500 border-0 py-2 px-6 focus:outline-none hover:bg-purple-600 rounded text-lg">Ir al dashboard</a>
                        </div>
                        @else
                        <p class="mb-8 leading-relaxed">Bienvenido al Sistema de Posgrado, ingresa tus credenciales para iniciar sesión en el sistema. Si no cuentas con ellas registraste o ponte en contacto con la coordinación.</p>
                        <div class="flex justify-center">
                            <a href="{{ route('login') }}" class="inline-flex text-white bg-purple-500 border-0 py-2 px-6 focus:outline-none hover:bg-purple-600 rounded text-lg">Iniciar sesión</a>
                        </div>
                        @endif
                        </div>
                    </div>
                </section>
            </div>

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
                        <a class="text-gray-600 hover:text-gray-800">Tesis</a>
                    </li>
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">Cambio de Tema</a>
                    </li>
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">Modificación de título</a>
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
                        <a class="text-gray-600 hover:text-gray-800">Estadía Técnica</a>
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
