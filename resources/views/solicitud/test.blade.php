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
            margin-top: 0.42cm;
            margin-left: 2.5cm;
            margin-bottom: 2cm;
            margin-right: 2cm;
        }

        * {
            font-family: 'Montserrat';
        }

        header {
            position: fixed;
            top: 40px;
            left: 0px;
            right: 0px;
        }

        #datos-cabecera {
            line-height: 5px;
            padding-top: 1.6rem;
        }

        #gris {
            color: #737373;
            font-weight: bold;
        }

        footer {
            display: inline-block;
            position: fixed;
            bottom: 0px;
            left: 0px;
            right: 0px;
        }

        footer>img {
            margin-left: 0.5rem;
        }


        #datos-lugar {
            margin-left: 0.5rem;
            font-size: 7pt;
            display: inline-block;
        }

        main {
            /* position: fixed; */
            padding-top: 200px;
        }

        #lugar-fecha {
            line-height: 5px;
        }

        #destinatario {
            line-height: 5px;
        }

        table {
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

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
            <img src="{{ public_path('assets/logo-tec-matamoros.png') }}" alt="" width="57" height="60">
            <img src="{{ public_path('assets/libre-plastico.jpg') }}" alt="" width="79" height="45">
            <img src="{{ public_path('assets/sgi.jpg') }}" alt="" width="49" height="49">
            <div id="datos-lugar">
                Avenida Lauro Villar, km 6.5, C.P. 87490, A.P. 339 <br />
                Heroica Matamoros, Tamaulipas, México, <br />
                Tels. 8688140952, 8688140953, 8688140667 ext. 398 y 399 <br />
                depi_matamoros@tecnm.mx <br />
                www.tecnm.mx | www.matamoros.tecnm.mx <br />
            </div>
            <img src="{{ public_path('assets/mexico-2021.jpg') }}" alt="" width="107" height="126">
        </div>
    </footer>

    <main>
        <div id="lugar-fecha" align="right">
            <p>H. Matamoros, Tam., 15/abril/2021</p>
            <p>Asunto: SOLICITUD DE CAMBIO DE TEMA DE TESIS</p>
        </div>
        <div id="destinatario">
            <p>C. IRMA LETICIA GARCÍA TREVIÑO</p>
            <p>PRESIDENTE DEL CONSEJO DE POSGRADO</p>
            <p>PRESENTE</p>
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
                    <td colspan="2">Linea de investigacion</td>
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
                    <td>Objetivo general anterior</td>
                    <td>Nuevo objetivo general:</td>
                </tr>
                <tr>
                    <td>Objetivos específicos anteriores:</td>
                    <td>Nuevos objetivos específicos</td>
                </tr>
                <tr>
                    <td colspan="2">Justificación: <br><br></td>
                </tr>
                <tr>
                    <td colspan="2">
                        Nostrud id minim commodo Lorem dolor aliquip nulla esse Lorem. Velit officia nostrud irure eiusmod tempor sunt non laboris. Reprehenderit ex nostrud nostrud cupidatat est nisi tempor aliquip occaecat veniam ut.
                        Nostrud id minim commodo Lorem dolor aliquip nulla esse Lorem. Velit officia nostrud irure eiusmod tempor sunt non laboris. Reprehenderit ex nostrud nostrud cupidatat est nisi tempor aliquip occaecat veniam ut.
                        Nostrud id minim commodo Lorem dolor aliquip nulla esse Lorem. Velit officia nostrud irure eiusmod tempor sunt non laboris. Reprehenderit ex nostrud nostrud cupidatat est nisi tempor aliquip occaecat veniam ut.

                    </td>
                </tr>
            </table>
        </div>
        <div>
            Adipisicing sunt dolore et est irure ullamco quis cillum incididunt sit est nisi. Non reprehenderit cupidatat est consequat reprehenderit exercitation. Laboris velit velit ullamco consectetur in proident. Enim ullamco ullamco laboris aliqua ex. Occaecat et amet officia consectetur id.

Velit adipisicing voluptate non ut dolor anim. Officia voluptate labore mollit aliqua sit nisi culpa mollit. Lorem magna aute et laboris do esse reprehenderit elit amet proident ad quis do. Eu dolore incididunt commodo in duis quis consequat reprehenderit in anim.

Do id sint aliquip et aliquip in commodo duis adipisicing nulla fugiat ad aute tempor. Labore veniam ad minim cillum ad. Anim velit reprehenderit magna id duis id non. Laborum incididunt est velit laborum culpa. Nostrud laboris aute exercitation veniam ex mollit. Velit esse excepteur aliquip esse aliqua cillum duis commodo.

Occaecat eu Lorem culpa enim ipsum et esse adipisicing irure. Nulla reprehenderit laborum sit labore excepteur est duis do do. Quis anim occaecat reprehenderit labore voluptate ex ullamco nostrud consequat deserunt excepteur sit nisi. Nostrud pariatur elit adipisicing cillum commodo magna do. Sit laborum proident eu aliquip voluptate. Adipisicing excepteur est eiusmod anim cillum est labore dolore consequat officia esse. Ad ad excepteur cillum veniam laboris voluptate amet ex in.

Veniam officia fugiat fugiat officia occaecat voluptate consectetur non fugiat sint excepteur. Eiusmod ex do do deserunt sint. Do elit laboris qui nisi eu minim deserunt enim aliquip excepteur. Sit elit ullamco excepteur anim enim consequat duis exercitation velit qui veniam culpa duis voluptate. Nulla nulla ea ipsum et esse veniam. Adipisicing magna qui sint aliquip velit velit fugiat ex commodo velit sint cillum aute nisi. Eiusmod officia esse nostrud ullamco eiusmod cupidatat eu culpa veniam occaecat ullamco magna ipsum ipsum.

Elit voluptate consectetur ea ex quis velit laboris proident fugiat fugiat. Consectetur elit fugiat ullamco ad elit velit dolor et commodo. Veniam qui ullamco excepteur aliquip dolor quis sunt ad amet. In sunt minim excepteur fugiat irure eiusmod magna duis adipisicing proident nulla. Sunt tempor occaecat incididunt cupidatat proident fugiat fugiat ullamco nostrud labore cillum. Ullamco pariatur voluptate Lorem pariatur id velit fugiat mollit enim ad. Esse elit culpa minim tempor excepteur non dolore officia.

Nulla occaecat nisi aute laborum occaecat ea aute. Consequat elit consequat ipsum incididunt et in duis ipsum do. Eiusmod esse est eiusmod aute ad cupidatat aliquip sunt ut laboris in eiusmod sint culpa. Dolore id dolore minim consequat cillum cupidatat elit qui ullamco.

Fugiat nisi occaecat incididunt ad adipisicing do reprehenderit magna officia ut commodo esse mollit ipsum. Cupidatat occaecat esse nisi fugiat adipisicing ut enim do qui excepteur esse Lorem ullamco. Sunt est amet cillum et ea ad consequat esse. Labore proident cillum non cillum qui pariatur duis esse pariatur fugiat qui reprehenderit.

Magna ad exercitation laboris ut et. Anim cillum nostrud velit commodo et. Non minim ullamco deserunt laborum nostrud aliqua commodo do id aliqua nostrud tempor id officia. Incididunt dolore quis reprehenderit sunt culpa elit adipisicing sit esse voluptate proident sit.

Lorem qui labore ea sunt enim. Adipisicing officia reprehenderit voluptate sunt exercitation minim id deserunt laborum. Ex tempor ullamco do ex dolor aliquip elit aliquip voluptate id.
Lorem qui labore ea sunt enim. Adipisicing officia reprehenderit voluptate sunt exercitation minim id deserunt laborum. Ex tempor ullamco do ex dolor aliquip elit aliquip voluptate id.
Lorem qui labore ea sunt enim. Adipisicing officia reprehenderit voluptate sunt exercitation minim id deserunt laborum. Ex tempor ullamco do ex dolor aliquip elit aliquip voluptate id.
Lorem qui labore ea sunt enim. Adipisicing officia reprehenderit voluptate sunt exercitation minim id deserunt laborum. Ex tempor ullamco do ex dolor aliquip elit aliquip voluptate id.
Lorem qui labore ea sunt enim. Adipisicing officia reprehenderit voluptate sunt exercitation minim id deserunt laborum. Ex tempor ullamco do ex dolor aliquip elit aliquip voluptate id.
        </div>
        <div id="pie">
            <h4>ATENTAMENTE</h4>
            <div id="firmas">
                <div id="firma1">
                    <p>________________________</p>
                    <p>(Nombre y firma del director de tesis)</p>
                </div>
                <div id="firma2">
                    <p>________________________</p>
                    <p>(Nombre y firma del estudiante)</p>
                </div>
            </div>
        </div>
    </main>

</body>

</html>
