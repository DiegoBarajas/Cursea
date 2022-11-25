

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cursea - Correo Repetido</title>

    <link rel="stylesheet" href="/general/navbar.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Prompt:wght@600&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="/img/icono.png" type="image/x-icon">

    <link rel="stylesheet" href="error.css">

</head>

<body>

</body>

</html>



 <?php



    require_once("../DB/crud.php");



    $nombre = $_POST['Registro_nombre_completo'];
    $email = $_POST['Registro_correo'];
    $password = $_POST['Registro_contrasena'];
    $password_enc = password_hash($password, PASSWORD_DEFAULT);



    //Sentencia SQL

    $sql = "SELECT * FROM usuario WHERE email = '$email'";
    $result = sentencia($sql);
    if($result->num_rows == 0){
        $sql = "INSERT INTO usuario (nombre, email, password, premium, tarjeta, foto, tema, activa) VALUES ('$nombre', '$email', '$password_enc', 'no', NULL, NULL, 'claro', 0)";
        sentencia($sql);

        header('Location: mail_register.php?email='.$email);
    }else{
        $row = $result->fetch_assoc();

        if($row['activa'] == 0){
            $sql = "UPDATE usuario SET nombre = '$nombre', password='$password_enc' WHERE email='$email'";
            sentencia($sql);

            header('Location: mail_register.php?email='.$email);
        }else{
            ?>
            
            <article>
                <h3 class="subtitulo">Ese correo ya está registrado</h3>
                <h3 class="subtitulo">por favor, intentalo con otro</h3>
                <button class="contenido" onclick="window.location.href='login.php'">Volver al inicio</button>
            </article>

            <?php
        }
    }

?>   

