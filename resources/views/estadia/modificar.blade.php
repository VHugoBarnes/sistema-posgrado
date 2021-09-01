<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modificar estadia') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form action="{{ route('estadia-estudiante-modificar') }}" method="POST">
                        @method('PUT')
                        @csrf

                        <label for="nombre_empresa">Nombre de la empresa</label>
                        <input class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="nombre_empresa" id="" value="{{ $estadia->nombre_empresa }}">

                        <label for="asesor">Nombre completo del asesor</label>
                        <input class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="asesor" id="" value="{{ $estadia->asesor }}">

                        <label for="puesto_asesor">Puesto del asesor</label>
                        <input class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="puesto_asesor" id="" value="{{ $estadia->puesto_asesor }}">

                        <label for="area">Área</label>
                        <input class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="area" id="" value="{{ $estadia->area }}">

                        <label for="nombre_proyecto">Nombre del proyecto</label>
                        <input class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="nombre_proyecto" value="{{ $estadia->nombre_proyecto }}">

                        <label for="desde">Fecha de inicio</label>
                        <input class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="date" name="desde" id="" value="{{ $estadia->desde }}">

                        <label for="hasta">Fecha de finalización</label>
                        <input class="w-full mt-2 mb-3 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="date" name="hasta" value="{{ $estadia->hasta }}">

                        <button
                            type="submit"
                            class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline"
                        >Modificar oficio</button>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>