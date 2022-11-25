<?php
    require_once("../DB/crud.php");
    session_start();

    $curso = $_GET['curso'];

    if(!isset($_SESSION['id'])){
        header("Location: informacion_curso.php?id=$curso");
    }

    $usuario = $_SESSION['id'];

    $sql = "SELECT *FROM favoritos WHERE id_curso = '$curso' AND id_usuario = '$usuario'";
    $cons = sentencia($sql);
    if($cons->num_rows == 0){
        $sql = "INSERT INTO favoritos (id_curso, id_usuario) VALUES ($curso, $usuario)";
        sentencia($sql);
    }


    header("Location: informacion_curso.php?id=$curso");
?>