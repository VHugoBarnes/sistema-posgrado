<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <form action="{{ route('archivo')}}" method="POST" enctype="multipart/form-data">
        <?php
        header('content-type: application/pdf');
        readfile('C:/xampp/htdocs/sistema-posgrado/storage/app/public/2/liberaciontesis/X2VClpb5COeKjYlGaB50jU6BB4VG7XpPztOljjqT.pdf');
        ?>
    </body>
</html>