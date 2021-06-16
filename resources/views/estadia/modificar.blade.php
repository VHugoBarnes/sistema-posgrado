<form action="{{ route('estadia-estudiante-modificar') }}" method="POST">
    @method('PUT')
    @csrf

    <label for="nombre_empresa">Nombre de la empresa</label>
    <input type="text" name="nombre_empresa" id="" value="{{ $estadia->nombre_empresa }}">

    <label for="asesor">Nombre completo del asesor</label>
    <input type="text" name="asesor" id="" value="{{ $estadia->asesor }}">

    <label for="puesto_asesor">Puesto del asesor</label>
    <input type="text" name="puesto_asesor" id="" value="{{ $estadia->puesto_asesor }}">

    <label for="area">Área</label>
    <input type="text" name="area" id="" value="{{ $estadia->area }}">

    <label for="nombre_proyecto">Nombre del proyecto</label>
    <input type="text" name="nombre_proyecto" value="{{ $estadia->nombre_proyecto }}">

    <label for="desde">Fecha de inicio</label>
    <input type="date" name="desde" id="" value="{{ $estadia->desde }}">

    <label for="hasta">Fecha de finalización</label>
    <input type="date" name="hasta" value="{{ $estadia->hasta }}">

    <input type="submit" value="Modificar oficio">

</form>