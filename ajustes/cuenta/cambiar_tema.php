<?php
    require_once("../../DB/crud.php");

    session_start();
    $tema = $_POST['tema'];
    $id = $_SESSION['id'];

// - - - Base de datos - - - //
    $sql = "UPDATE usuario SET tema = '$tema' WHERE id = $id";

    if(sentencia($sql) === TRUE ){
        $_SESSION['tema'] = $tema;
        //Cerrar conexión

        header('Location: ' . "cuenta.php");
    }else{
        echo "Ha ocurrido un error:" . $conn->error;
    }
?>