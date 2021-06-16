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
            margin: 150px 50px 180px 50px;
        }

        * {
            font-family: 'Montserrat';
        }

        /*************************** HEADER ***************************/

        header {
            position: fixed;
            left: 0px;
            top: -150px;
            right: 0px;
            height: 150px;
            text-align: center;
            align-content: center;
        }

        #gris {
            color: #737373;
            font-weight: bold;
        }

        #header {
            align-content: center;
        }

        #titulo {
            font-size: 1.2rem;
            line-height: 0.8rem;
        }

        #subtitulo {
            font-size: 0.9rem;
        }

        #datos-centro {
            text-align: center;
        }

        /*************************** HEADER ***************************/

        /*************************** FOOTER ***************************/

        footer {
            display: inline-block;
            position: fixed;
            left: 0px;
            bottom: -180px;
            right: 0px;
            height: 150px;
        }

        footer>img {
            margin-left: 0.5rem;
        }

        #datos-lugar {
            margin-left: 0.5rem;
            font-size: 7pt;
            display: inline-block;
        }

        #itm {
            margin-right: 20px;
        }

        #libre-plastico {
            margin-right: 20px;
        }

        #sgi {
            margin-right: 20px;
        }

        #mexico-2021 {
            margin-left: 20px;
        }

        /*************************** FOOTER ***************************/

        /*************************** CONTENT ***************************/

        main {
            /* position: fixed; */
            /* padding-top: 100px; */
        }

        #lugar-fecha {
            line-height: 5px;
            margin-bottom: 50px;
        }

        #lugar-fecha > p {
            font-size: 10pt;
        }

        #destinatario {
            line-height: 2px;
        }

        #saludo {
            font-size: 10pt;
            line-height: 14px;
        }

        #saludo > p {
            text-align: justify;
        }

        table {
            width: 100%;
        }

        /* table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        } */

        /* #firmas {
            position: relative;
            display: inline-block;
            flex-direction: column;
        } */

        #firmas {
            margin-top: 80px;
        }

        /*************************** CONTENT ***************************/

    </style>
</head>

<body>

    <header>
        
        <table id="header">
            <tr>
                <td><img src="{{ public_path('assets/tecnm.svg') }}" alt="cabecera" width="100" id="img1"></td>
                <td>
                    <div id="datos-centro">
                        <p id="titulo"><b>DIVISIÓN DE ESTUDIOS DE POSGRADO E INVESTIGACIÓN</b></p>
                        <p id="subtitulo">OFICIO DE PRESENTACIÓN</p>
                    </div>
                </td>
                <td><img src="{{ public_path('assets/logo-tec-matamoros.png') }}" alt="cabecera" width="57" id="img2"></td>
            </tr>
        </table>
    </header>

    <footer>
        <div>
            <img src="{{ public_path('assets/logo-tec-matamoros.png') }}" alt="" width="57" height="60" id="itm">
            <img src="{{ public_path('assets/libre-plastico.jpg') }}" alt="" width="79" height="45"
                id="libre-plastico">
            <img src="{{ public_path('assets/sgi.jpg') }}" alt="" width="49" height="49" id="sgi">
            <div id="datos-lugar">
                Avenida Lauro Villar, km 6.5, C.P. 87490, A.P. 339 <br />
                Heroica Matamoros, Tamaulipas, México, <br />
                Tels. 8688140952, 8688140953, 8688140667 ext. 398 y 399 <br />
                depi_matamoros@tecnm.mx <br />
                www.tecnm.mx | www.matamoros.tecnm.mx <br />
            </div>
            <img src="{{ public_path('assets/mexico-2021.jpg') }}" alt="" width="107" height="126" id="mexico-2021">
        </div>
    </footer>

    <main>
        <div id="lugar-fecha" align="right">
            <p>H. Matamoros, Tam., {{ $fecha }}</p>
            <p>Oficio Núm: 081/DEPI/2019</p>
        </div>
        <div id="destinatario">
            <p><b>LIC. {{ $asesor }}</b></p>
            <p><b>{{ $puesto_asesor }}</b></p>
            <p><b>{{ $nombre_empresa }}</p>
        </div>
        <div id="saludo">
            <p>Por el presente me permito presentar al C. {{ $estudiante->usuario->nombre }} {{ $estudiante->usuario->apellidos }}, estudiante de la Maestría en Administración Industrial, con número de control {{ $estudiante->numero_control }} y número CVU {{ $estudiante->cvu }}, quien solicita la oportunidad de realizar su ESTADÍA TÉCNICA en el área de {{ $area }} donde se realizará el proyecto en su Empresa para realizar el proyecto "{{ $nombre_proyecto }}", durante el periodo comprendido de  {{ $desde }} a {{ $hasta }}, esto con la finalidad de complementar su formación académica. </p>
            <p>Sin otro asunto por el momento, me es grato refrendarle mi agradecimiento anticipado por su atención a la presente y a la vez un cordial saludo.</p>
        </div>
        <div id="pie">
            <h4>A T E N T A M E N T E</h4>
            <div id="firmas">
                <b>
                    M.C. CLAUDIO ALEJANDRO ALCALA SALINAS <br>
                    JEFE DE LA DIVISIÓN DE ESTUDIOS DE POSGRADO <br>
                    E INVESTIGACIÓN
                </b>
            </div>
        </div>
    </main>

</body>

</html>
