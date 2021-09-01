<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitud estadia técnica') }}
        </h2>
    </x-slot>
    @foreach ($estadias as $estadia)
        <div>
            <h2 class="text-3xl text-center font-bold mb-6">Estadia {{ $estadia->id }}</h2>
            <h3><a href="{{ route('estadia-por-firmar-individual', ['id'=>$estadia->id]) }}">Nombre del estudiante: {{ $estadia->estudiante->usuario->nombre }} {{ $estadia->estudiante->usuario->apellidos }}</a></h3>
        </div>
    @endforeach
</x-app-layout>