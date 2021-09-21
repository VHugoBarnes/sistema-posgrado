<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>
    @if (session('status'))
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-yellow-400 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-yellow-400 border-b border-gray-200">
                    <p id="session">{{ session('status') }}</p>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Bienvenido al Sistema de Posgrado!
                </div>
            </div>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-xl font-semibold">Noticias</h1>

            <div class="mt-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
                <!--Card 1-->
                <div class="rounded overflow-hidden shadow-lg">
                <img class="w-full" src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1052&q=80">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Presentación del Sistema</div>
                    <p class="text-gray-700 text-base">
                        Presentación del sistema de posgrado
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">HOY</span>
                </div>
                </div>
                <!--Card 2-->
                <div class="rounded overflow-hidden shadow-lg">
                <img class="w-full" src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1052&q=80">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Reunión con estudiantes</div>
                    <p class="text-gray-700 text-base">
                    Temas:
                        Requisitos de egreso,
                        Presentación de avances de tesis,
                        Registro de tesis
                        y Fechas importantes
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">26 MARZO 2021</span>
                </div>
                </div>

                <!--Card 3-->
                <div class="rounded overflow-hidden shadow-lg">
                <img class="w-full" src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1052&q=80">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Reunión con estudiantes</div>
                    <p class="text-gray-700 text-base">
                    Temas:
                        Presentación de coordinadora - Dra. Wendy Aracely Sánchez Gómez,
                        Capacitación para encuestadores - Investigación Dra. Corina Ocegueda Mercado
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">26 FEBRERO 2021</span>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    

</x-app-layout>
