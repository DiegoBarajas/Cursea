<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cursea - Error al iniciar sesion</title>
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

    $email = $_POST['login_correo_electronico'];
    $password = $_POST['login_contrasena'];

    //Sentencia SQL
    $sent = "SELECT * FROM usuario where email = '$email'";
    $res = sentencia($sent);

    if($res->num_rows > 0){
        $row = $res->fetch_assoc();
        if(password_verify($password, $row['password'])){
            if($row['activa'] == 1){
                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['tema'] = $row['tema'];
                $_SESSION['logged'] = "si";
                $_SESSION['password'] = $password;
                if($row['admin']==1){
                    $_SESSION['admin']=1;
                }

                header("Location: /index.php");
            }else{
                header("Location: /login/check_email.html");
            }
        }else{
            ?>
                <article>
                    <h3 class="subtitulo">Contraseña incorrecta</h3>
                    <h3 class="subtitulo">por favor, intentalo nuevamente :)</h3>
                    <button class="contenido" onclick="window.location.href='login.php'">Volver a intentar</button>
                </article>
            <?php
        }
    }else{
        ?>
            <article>
                <h3 class="subtitulo">Correo incorrecto</h3>
                <h3 class="subtitulo">por favor, intentalo nuevamente :)</h3>
                <button class="contenido" onclick="window.location.href='login.php'">Volver a intentar</button>
            </article>
        <?php
    }

    /*if($result){

    }

    //Recorrido DB
    $band=false;
    if( $result->num_rows > 0 ){
        while( $row = $result->fetch_assoc() ){
            if( ($row['email'] == $email) && (password_verify($password, $row['password']))){
                
                if($row['activa']==1){
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['nombre'] = $row['nombre'];
                    $_SESSION['tema'] = $row['tema'];
                    $_SESSION['logged'] = "si";
                    $_SESSION['password'] = $password;
                    $band=true;

                    //header('location: cursea.ga');
                }else{
                    header('Location: activar_cuenta.html');
                }
                    
            }
        }
    }

    if(!$band){
    ?>
        <article>
            <h3 class="subtitulo">Correo o contraseña incorrectos</h3>
            <h3 class="subtitulo">por favor, intentalo nuevamente :)</h3>
            <button class="contenido" onclick="window.location.href='login.php'">Volver al inicio</button>
        </article>
    <?php
    }*/

?>

    
</body>
</html>