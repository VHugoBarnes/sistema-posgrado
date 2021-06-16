<form action="{{ route('estadia-estudiante-solicitud') }}" method="POST">
    @csrf

    <label for="nombre_empresa">Nombre de la empresa</label>
    <input type="text" name="nombre_empresa" id="">

    <label for="asesor">Nombre completo del asesor</label>
    <input type="text" name="asesor" id="">

    <label for="puesto_asesor">Puesto del asesor</label>
    <input type="text" name="puesto_asesor" id="">

    <label for="area">Área</label>
    <input type="text" name="area" id="">

    <label for="nombre_proyecto">Nombre del proyecto</label>
    <input type="text" name="nombre_proyecto">

    <label for="desde">Fecha de inicio</label>
    <input type="date" name="desde" id="">

    <label for="hasta">Fecha de finalización</label>
    <input type="date" name="hasta">

    <input type="submit" value="Solicitar carta presentación">

</form>