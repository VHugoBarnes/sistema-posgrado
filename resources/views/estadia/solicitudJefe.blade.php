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
        <form action="{{ route('estadia-por-firmar-individual', ['id' => $estadia->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="estadia_id" value="{{ $estadia->id }}">
            <input type="hidden" name="estatus" value="Firmado">

            <label for="documento_oficio">Sube el documento firmado</label>
            <input type="file" name="documento_oficio">
            <input type="submit" value="Firmar oficio">
        </form>
    </div>
</x-app-layout>