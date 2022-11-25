<?php

    require_once("../DB/crud.php");

    $id_comentario = $_POST['id_comentario'];
    $id_video = $_POST['id_video'];

    $sql = "DELETE FROM comentario WHERE id='$id_comentario'";
    sentencia($sql);

    header("Location: video.php?id=$id_video");

?>