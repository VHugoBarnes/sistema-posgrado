<h4>H.Matamoros, Tam., {{ $fecha }}</h4>
<h2>Asunto: Cambio de {{ $asunto }}</h2>
<h3>Nombre del estudiante: {{ $tesis->estudiante->usuario->nombre }} {{ $tesis->estudiante->usuario->apellidos }}</h3>
<h3>Número de control: {{ $tesis->estudiante->numero_control }}</h3>
<h3>Generacion: {{ $tesis->estudiante->generacion }}</h3>
<h3>Programa: {{ $tesis->estudiante->programa[0]->nombre }}</h3>
<h3>Linea de investigacion: {{ $tesis->estudiante->lineas[0]->nombre }}</h3>
<h3>Director: {{ $tesis->director_usuario->nombre }} {{ $tesis->director_usuario->apellidos }}</h3>
<h3>Miembros del comité tutorial:</h3>
<ul>
    @if ($tesis->codirector != null)
        <li>Codirector: {{ $tesis->codirector_usuario->nombre }} {{ $tesis->codirector_usuario->apellidos }}</li>
    @endif
    @if ($tesis->secretario != null)
        <li>Secretario: {{ $tesis->secretario_usuario->nombre }} {{ $tesis->secretario_usuario->apellidos }}</li>
    @endif
    @if ($tesis->vocal != null)
        <li>Vocal: {{ $tesis->vocal_usuario->nombre }} {{ $tesis->vocal_usuario->apellidos }}</li>
    @endif
</ul>

<h3>Titulo anterior: {{ $tesis->titulo }}</h3>
<h3>Objetivo general anterior: {{ $tesis->objetivo_general }}</h3>
<h3>Objetivo especifico anterior: {{ $tesis->objetivo_especifico }}</h3>

<h3>Nuevo titulo propuesto: {{ $titulo_nuevo }}</h3>
<h3>Nuevo objetivo general: {{ $objetivo_general_nuevo }}</h3>
<h3>Nuevo objetivo especifico: {{ $objetivo_especifico_nuevo }}</h3>
<h3>Justificación: {{ $justificacion }}</h3>