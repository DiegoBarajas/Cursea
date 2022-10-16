<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cursea - Cerrar Sesión</title>
    </head>
    
    <?php
        session_start();
        session_destroy();
    ?>
    
    <body>
        <h1>La sesión se cerró correctamente</h1>
        <a href="../../index.php">Volver a la pantalla principal</a>
    </body>
</html>

