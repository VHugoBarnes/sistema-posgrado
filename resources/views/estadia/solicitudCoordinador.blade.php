<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitud estadia técnica') }}
        </h2>
    </x-slot>
    
    <div>
        <h3 class="text-3xl text-center font-bold mb-6">Nombre del estudiante: {{ $estadia->estudiante->usuario->nombre }} {{ $estadia->estudiante->usuario->apellidos }}</h3>
        <form action="{{ route('estadia-documento') }}" method="post">
            @csrf
            <input type="hidden" name="tipo" value="oficio-presentacion">
            <input type="hidden" name="id" value="{{ $estadia->id }}">
            <input type="submit" value="Obtener documento 'Oficio de presentación'">
        </form>
        <form action="{{ route('estadia-individual', ['id' => $estadia->id]) }}" method="post">
            @csrf
            <input type="hidden" name="estadia_id" value="{{ $estadia->id }}">
            <input type="hidden" name="estatus" value="Aprovada">
            <input type="submit" value="Aprovar oficio">
        </form>
        <form action="{{ route('estadia-individual', ['id' => $estadia->id]) }}" method="post">
            @csrf
            <input type="hidden" name="estadia_id" value="{{ $estadia->id }}">
            <input type="hidden" name="estatus" value="Rechazada">
            <input type="submit" value="Rechazar oficio">
        </form>
    </div>
</x-app-layout>