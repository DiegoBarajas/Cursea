<?php

    require_once("../DB/crud.php");

    $nombre = $_POST['Registro_nombre_completo'];
    $email = $_POST['Registro_correo'];
    $password = $_POST['Registro_contrasena'];

    //Sentencia SQL
    $sql = "SELECT * FROM usuario";
    $result = sentencia($sql);

    $bandera = false;
    $activa = false;

    while( $row = $result->fetch_assoc() ){
        if( ($row['email'] == $email) && ($row['activa'] == 1) ){
            $bandera = true;
        }else if(($row['activa'] == 0)){
            $activa = true;
        }
    }

    if(!$bandera){
        //Sentencia SQL
        if($activa){
            $sql = "UPDATE usuario SET nombre = '$nombre', contraseña='$password' WHERE email='$email'";
        }else{
            $sql = "INSERT INTO usuario (nombre, email, contraseña, premium, tarjeta, foto, tema, activa) VALUES ('$nombre', '$email', '$password', 'no', NULL, NULL, 'claro', 0)";
        }

        //Insercion
        if(sentencia($sql) === TRUE){
            header('Location: ' . "../index.php");
        }else{
            echo "ERROR: " . $sql . "<br>" . $conn->error;
        }
    }else{
        echo ("<h1>Ese correo ya esta registrada</h1><a href='login.php'>Volver</>");

    }

    $conn->close();
?>