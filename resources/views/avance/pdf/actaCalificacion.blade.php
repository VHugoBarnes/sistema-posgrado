<html>

<head>
  <style>
    @font-face {
      font-family: 'Montserrat';
      src: url({{ storage_path('fonts/Montserrat/Montserrat-Regular.ttf') }}) format("truetype");
      font-weight: regular;
    }

    @font-face {
      font-family: 'Montserrat';
      src: url({{ storage_path('fonts/Montserrat/Montserrat-Bold.ttf') }}) format("truetype");
      font-weight: bold;
    }

    @page {
      /* size: 8.5in 11in; */
      margin: 0px 50px 100px 50px;
    }

    * {
      font-family: 'Montserrat';
    }

    table, tr, td {
      border-collapse: collapse;
    }

  </style>
</head>

<body>

  <table>
    <tr style="">
      <td style="padding: 0rem;">
        <img src="{{ public_path('assets/tecnm.svg') }}" alt="cabecera" style="width: 6rem">
      </td>
      <td style="text-align: center; width: 16rem; padding: 2rem; padding-left: 0rem;">
        <h2 style="font-size: 1rem; text-transform: capitalize;">
          División de estudios de posgrado e investigación
        </h2>
        <h3 style="font-weight: 400; font-size: 0.8rem;">
          Acta de calificación de Seminario II
        </h3>
      </td>
      <td style="padding: 0rem;">
        <img src="{{ public_path('assets/logo-tec-matamoros.png') }}" alt="cabecera imagen" style="width: 4rem">
      </td>
    </tr>
  </table>

  <p align="right" style="font-size: 14px;">
    Fecha <span style="text-decoration: underline;">{{$fecha}}</span>
  </p>
  <table style="font-size: 14px;">
    <tr style="">
      <td style="">
        Nombre del estudiante <span style="text-decoration: underline;">{{$estudiante_nombre}}</span>
      </td>
    </tr>
    <tr style="">
      <td style="">
        Número de control <span style="text-decoration: underline">{{$estudiante_numero_control}}</span>
      </td>
      <td style="">
        Semestre ______
      </td>
      <td style="">
        Periodo <span style="text-decoration: underline">2020-2022</span>
      </td>
    </tr>
    <tr style="">
      <td style="">
        Título de tema de tesis <span style="text-decoration: underline">{{$titulo_tesis}}</span>
      </td>
    </tr>
    <tr style="">
      <td style="">
        Programa educativo <span style="text-decoration: underline">{{$programa_educativo}}</span>
      </td>
    </tr>
  </table>

  <table style="border: 1px solid black; border-collapse: collapse; margin: 40px 0 0 0; font-size: 12px; width: 100%">
    <tr style="border: 1px solid black; border-collapse: collapse;">
      <th style="border: 1px solid black; border-collapse: collapse;">
        Criterios a evaluar
      </th>
      <th style="border: 1px solid black; border-collapse: collapse;">
        Director
      </th>
      <th style="border: 1px solid black; border-collapse: collapse;">
        Secretario
      </th>
      <th style="border: 1px solid black; border-collapse: collapse;">
        Vocal
      </th>
    </tr>
    <tr style="border: 1px solid black; border-collapse: collapse;">
      <td style="border: 1px solid black; border-collapse: collapse;">
      1. Estructura y claridad del documento.
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_dir[0]}}
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_sec[0]}}
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_voc[0]}}
      </td>
    </tr>
    <tr style="border: 1px solid black; border-collapse: collapse;">
      <td style="border: 1px solid black; border-collapse: collapse;">
        2. Amplitud y actualidad de la información utilizada.
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_dir[1]}}
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_sec[1]}}
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_voc[1]}}
      </td>
    </tr>
    <tr style="border: 1px solid black; border-collapse: collapse;">
      <td style="border: 1px solid black; border-collapse: collapse;">
        3. Grado de avance con respecto al informe anterior.
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_dir[2]}}
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_sec[2]}}
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_voc[2]}}
      </td>
    </tr>
    <tr style="border: 1px solid black; border-collapse: collapse;">
      <td style="border: 1px solid black; border-collapse: collapse;">
        4. Nivel técnico empleado en el informe.
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_dir[3]}}
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_sec[3]}}
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_voc[3]}}
      </td>
    </tr>
    <tr style="border: 1px solid black; border-collapse: collapse;">
      <td style="border: 1px solid black; border-collapse: collapse;">
        5. Asertividad en la explicación de la aportación en el avance.
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_dir[4]}}
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_sec[4]}}
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_voc[4]}}
      </td>
    </tr>
    <tr style="border: 1px solid black; border-collapse: collapse;">
      <td style="border: 1px solid black; border-collapse: collapse;">
        6. Nivel de propuesta de las actividades futuras.
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_dir[5]}}
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_sec[5]}}
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_voc[5]}}
      </td>
    </tr>
    <tr style="border: 1px solid black; border-collapse: collapse;">
      <td style="border: 1px solid black; border-collapse: collapse;">
        7. Apreciación general de la información recibida.
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_dir[6]}}
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_sec[6]}}
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_voc[6]}}
      </td>
    </tr>
    <tr style="border: 1px solid black; border-collapse: collapse;">
      <td style="border: 1px solid black; border-collapse: collapse;">
      8. Grado de avance con respecto al cronograma propuesto en el anteproyecto.
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_dir[7]}}
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_sec[7]}}
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$p_voc[7]}}
      </td>
    </tr>
    <tr style="border: 1px solid black; border-collapse: collapse;">
      <td style="border: 1px solid gray; border-collapse: collapse; text-align: right">
        Promedio:
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$dir_prom}}
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$sec_prom}}
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        {{$voc_prom}}
      </td>
    </tr>
    <tr style="border: 1px solid black; border-collapse: collapse;">
      <td style="border: 1px solid gray; border-collapse: collapse; text-align: right; font-weight: bold;">
        Calificación final:
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center" colspan="3">
        {{$calificacion_final}}
      </td>
    </tr>
  </table>

  <table style="border: 1px solid black; border-collapse: collapse; margin: 20px 0 0 0; font-size: 12px; width: 100%">
    <tr style="border: 1px solid black; border-collapse: collapse; text-align: center">
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        <p style="margin: 40px 0 -15px 0">
          ______________________
        </p>
        <p>
          (nombre y firma)
        </p>
        <p style="margin: -15px 0 0 0">
          Director
        </p>
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        <p style="margin: 40px 0 -15px 0">
          ______________________
        </p>
        <p>
          (nombre y firma)
        </p>
        <p style="margin: -15px 0 0 0">
          Secretario
        </p>
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        <p style="margin: 40px 0 -15px 0">
          ______________________
        </p>
        <p>
          (nombre y firma)
        </p>
        <p style="margin: -15px 0 0 0">
          Vocal
        </p>
      </td>
    </tr>
  </table>

  <table style="border: 1px solid black; border-collapse: collapse; margin: 30px 190px 0; font-size: 12px;">
    <tr style="border: 1px solid black; border-collapse: collapse; text-align: center">
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        <p style="margin: 40px 0 -15px 0">
          ______________________
        </p>
        <p style="margin: 15px 0 0 0">
          Mtro. Claudio Alejandro Alcalá <br> Salinas<br> Jefe de la División de Estudios<br> de Posgrado e Investigación
        </p>
      </td>
      <td style="border: 1px solid black; border-collapse: collapse; text-align: center">
        <p style="margin: 40px 0 -15px 0">
          ______________________
        </p>
        <p style="margin: 15px 0 0 0">
          Sello DEPI
        </p>
      </td>
    </tr>
  </table>

</body>

</html>
