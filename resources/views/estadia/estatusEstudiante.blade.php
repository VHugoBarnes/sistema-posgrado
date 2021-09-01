<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Estatus estudiante') }}
        </h2>
    </x-slot>
    <div>
        <h1 class="text-3xl text-center font-bold mb-6 mt-6">Estatus: {{ $estadia->estatus }}</h1>
        <form action="{{ route('estadia-documento') }}" method="post">
            @csrf
            <input type="hidden" name="tipo" value="oficio-presentacion">
            <input type="hidden" name="id" value="{{ $estadia->id }}">
            <button class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline" type="submit" value="Obtener documento 'Oficio de presentación'">Obtener documento 'Oficio de presentación'</button>
        </form>
        <br>
        @if ($estadia->estatus == 'Preparando' || $estadia->estatus == 'Rechazada')
            <a class="border border-yellow-500 bg-yellow-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline" href="{{ route('estadia-estudiante-modificar') }}">Editar oficio de estadia</a>
            <form action="{{ route('estadia-estudiante-enviar') }}" method="post">
                @csrf
                <button class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" type="submit" value="Enviar oficio">Enviar oficio</button>
            </form>
        @endif
    </div>
</x-app-layout>