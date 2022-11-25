<!DOCTYPE html>

<html lang="es">

    <head>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Cursea - Cerrar Sesión</title>

        <link rel="shortcut icon" href="/img/icon.png" type="image/png">
        
        <link rel="stylesheet" href="/general/navbar.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Prompt:wght@600&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="/login/error.css">

    </head>

    

    <?php

        session_start();

        session_unset();

        session_destroy();

    ?>

    

    <body>

        <article>

            <h3 class="subtitulo">Tu sesión ha finalizado!</h3>

            <h3 class="subtitulo">Hasta luego</h3>

            <button class="contenido" onclick="window.location.href='/index.php'">Volver al index</button>

        </article>

    </body>

</html>



