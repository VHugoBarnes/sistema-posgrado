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
            margin: 280px 50px 180px 50px;
        }

        * {
            font-family: 'Montserrat';
        }

        /*************************** HEADER ***************************/

        header {
            position: fixed;
            left: 0px;
            top: -180px;
            right: 0px;
            height: 150px;
            text-align: center;
            align-content: center;
        }

        #datos-cabecera {
            line-height: 5px;
            padding-top: 1.6rem;
        }

        #gris {
            color: #737373;
            font-weight: bold;
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

        #destinatario {
            line-height: 2px;
        }

        #saludo {
            margin-bottom: 30px;
            line-height: 14px;
        }

        table {
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        h4 {
            letter-spacing: 4px;
        }

        /* #firmas {
            position: relative;
            display: inline-block;
            flex-direction: column;
        } */

        .firma {
            text-align: center;
            padding-top: 50px;
            line-height: 5px;
        }

        /*************************** CONTENT ***************************/

    </style>
</head>
<body>

    <header>
        <div>
            <img src="{{ public_path('assets/cabecera.jpg') }}" alt="cabecera">
            <div id="datos-cabecera" align="right">
                <p id="gris">Instituto Tecnológico de Matamoros</p>
                <p id="division-estudios">División de Estudios de Posgrado e Investigación</p>
            </div>
        </div>
    </header>

    <footer>
        <div>
            <img src="{{ public_path('assets/logo-tec-matamoros.png') }}" alt="" width="57" height="60" id="itm">
            <img src="{{ public_path('assets/libre-plastico.jpg') }}" alt="" width="79" height="45" id="libre-plastico">
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
            <p>H. Matamoros, Tam., 15/abril/2021</p>
            <p><b>ASUNTO:</b> SOLICITUD DE CAMBIO DE TEMA DE TESIS</p>
        </div>
        <div id="destinatario">
            <p><b>C. IRMA LETICIA GARCÍA TREVIÑO</b></p>
            <p><b>PRESIDENTE DEL CONSEJO DE POSGRADO</b></p>
            <p><b>PRESENTE</p>
        </div>
        <div id="saludo">
            <p>Por medio de la presente, se solicita el cambio de tema de tesis. Se anexo el protocolo de investigación del nuevo tema de tesis propuesto.</p>
        </div>
        <div id="tabla">
            <table>
                <tr>
                    <td colspan="2">Nombre del estudiante: </td>
                </tr>
                <tr>
                    <td>No de Control:</td>
                    <td>Generación: </td>
                </tr>
                <tr>
                    <td colspan="2">Programa: </td>
                </tr>
                <tr>
                    <td colspan="2">Linea de investigacion:</td>
                </tr>
                <tr>
                    <td colspan="2">Director de tesis:</td>
                </tr>
                <tr>
                    <td colspan="2">Miembros de comité tutorial:<br><br><br><br><br><br></td>
                </tr>
                <tr>
                    <td>Titulo anterior:</td>
                    <td>Nuevo título propuesto:</td>
                </tr>
                <tr>
                    <td>Objetivo general anterior:</td>
                    <td>Nuevo objetivo general:</td>
                </tr>
                <tr>
                    <td>Objetivos específicos anteriores:</td>
                    <td>Nuevos objetivos específicos:</td>
                </tr>
                <tr>
                    <td colspan="2">Justificación: <br><br></td>
                </tr>
            </table>
        </div>     
        <div id="pie">
            <h4>ATENTAMENTE</h4>
            <div id="firmas">
                <table>
                    <tr>
                        <td class="firma">
                            <p>________________________</p>
                            <p>(Nombre y firma del director de tesis)</p>
                        </td>
                        <td class="firma">
                            <p>________________________</p>
                            <p>(Nombre y firma del estudiante)</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </main>

</body>

</html>
