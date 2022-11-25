<?php

    session_start();

    date_default_timezone_set("America/Mexico_City");

    $fecha = date('d-m-y');
    require_once("../DB/crud.php");

    if(!isset($_SESSION['id'])){
        echo'Primero debes iniciar sesion <br><a href="/login/login.php">Inciar Sesión</a>';
    }else{
        $id_usuario = $_SESSION['id'];

        $comentario = $_POST['comentario'];
        $id_video = $_POST['id_video'];
    
        $sql = "INSERT INTO comentario(id_usuario, id_video, comentario, fecha, editado) VALUES ('$id_usuario', '$id_video', '$comentario', '$fecha', false)";
        sentencia($sql);


        header("Location: video.php?id=$id_video");
    }
?>