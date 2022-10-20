<?php
    require_once("../DB/crud.php");

    $email = $_POST['login_correo_electronico'];
    $password = $_POST['login_contrasena'];

    //Sentencia SQL
    $sent = "SELECT * FROM usuario";
    $result = sentencia($sent);

    //Recorrido DB
    $band=false;
    if( $result->num_rows > 0 ){
        while( $row = $result->fetch_assoc() ){
            if( ($row['email'] == $email) && (password_verify($password, $row['password'])) ){
                
                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['tema'] = $row['tema'];
                $_SESSION['logged'] = "si";
                $_SESSION['password'] = $password;
                $band=true;

                header('Location: ' . "../index.php");
            }
        }
    }

    if(!$band){
        echo "
            <h1>Correo y/o contraseña incorrectos</h1>
            <h2>Intentalo nuevamente</h2>
            <a href='login.php'>Volver</a>
        ";
    }

    //Cerrar conexión
    $conn->close();

?>
