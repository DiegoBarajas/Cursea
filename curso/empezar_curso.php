<?php
    session_start();
    require_once("../DB/crud.php");

    $video = $_GET['video'];
    $curso = $_GET['curso'];

    $tipo = sentencia("SELECT * FROM curso WHERE id='$curso'")->fetch_assoc()['tipo_curso'];

    if(!isset($_SESSION['id'])){
        header("Location: $tipo.php?id=$video");
    }else{
        $usuario = $_SESSION['id'];
    }

    $consulta = "SELECT * FROM status_curso WHERE id_curso='$curso' AND id_usuario='$usuario'";

    $res = sentencia($consulta);
    if($res->num_rows == 0){
        $insercion = "INSERT INTO status_curso(id_usuario, id_curso, status) VALUES ('$usuario', '$curso', 0)";
        $consulta = "SELECT * FROM usuario WHERE id='$usuario'";

        $res = sentencia($consulta);
        $pendientes = $res->fetch_assoc()['cursos_pendientes'];
        $pendientes++;
        $upd = "UPDATE usuario SET cursos_pendientes = '$pendientes' WHERE id='$usuario'";

        sentencia($insercion);
        sentencia($upd);
    }

    header("Location: $tipo.php?id=$video");
?>