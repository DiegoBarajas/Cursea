<?php
    require_once("../DB/crud.php");

    date_default_timezone_set("America/Mexico_City");

    $id_comentario = $_POST['id_comentario'];
    $comentario = $_POST['comentario'];
    $id_video = $_POST['id_video'];
    $fecha = date('d-m-y');

    $sql = "UPDATE comentario set comentario='$comentario', editado=true, fecha_edicion='$fecha' WHERE id='$id_comentario'";
    sentencia($sql);

    header("Location: video.php?id=$id_video");
?>