<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cursea - Error correo no encontrado</title>
        <link rel="shortcut icon" href="../img/icon.png" type="image/x-icon">
        <link rel="stylesheet" href="/general/navbar.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Prompt:wght@600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="error.css">
    </head>
    <body>
        
<?php

    require_once("../DB/crud.php");
    require_once("../mail/mail.php");
    $email = $_POST['email'];

    $sent = "SELECT * FROM usuario where email = '$email' AND activa = '1'";
    $res = sentencia($sent);

    if($res->num_rows > 0){
        $id = $res->fetch_assoc()['id'];

        $subject = "Recuperacion";
        $body = "
            <h3>Recuperar Contraseña</h3>
            <a href='cursea.ga/login/recuperar_pass.php?id=".$id."'>Recuperar Contraseña</a>
        ";

        sendMail($email, $subject, $body);
        header("Location: check_email_recuperacion.html");
    }else{
        ?>
            <article>
                <h3 class="subtitulo">Correo no encontrado</h3>
                <h3 class="subtitulo">Verfica la direccion de correo electronico e intentalo de nuevo</h3>
                <button class="contenido" onclick="window.location.href='login.php'">Volver a intentar</button>
            </article>
        <?php
    }
?>
    
    </body>
</html>