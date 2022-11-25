<?php
    require_once("../DB/crud.php");
    session_start();

    $curso = $_GET['curso'];


    if(!isset($_SESSION['id'])){
        header("Location: informacion_curso.php?id=$curso");
    }

    $usuario = $_SESSION['id'];
    $sql = "DELETE FROM favoritos WHERE id_curso='$curso' AND id_usuario='$usuario'";
    sentencia($sql);

    header("Location: informacion_curso.php?id=$curso");
?>