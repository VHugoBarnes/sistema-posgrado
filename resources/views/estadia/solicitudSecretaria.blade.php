<div>
    <h3>Nombre del estudiante: {{ $estadia->estudiante->usuario->nombre }} {{ $estadia->estudiante->usuario->apellidos }}</h3>
    <form action="{{ route('estadia-documento') }}" method="post">
        @csrf
        <input type="hidden" name="tipo" value="oficio-presentacion">
        <input type="hidden" name="id" value="{{ $estadia->id }}">
        <input type="submit" value="Obtener documento 'Oficio de presentación'">
    </form>
    <form action="{{ route('estadia-revision-individual', ['id' => $estadia->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="estadia_id" value="{{ $estadia->id }}">
        <input type="hidden" name="estatus" value="Sellado">

        <label for="documento_oficio">Sube el documento sellado</label>
        <input type="file" name="documento_oficio">
        <input type="submit" value="Sellar oficio">
    </form>
</div>