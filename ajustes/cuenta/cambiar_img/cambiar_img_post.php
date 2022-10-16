<?php

    require_once("../../../DB/crud.php");
    session_start();
    $id = $_SESSION['id'];

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

            $sql = "UPDATE usuario SET foto = '$imgContent' WHERE id=$id";
            sentencia($sql);
        }

        header("Location: /ajustes/cuenta/cambiar_img/cambiar_img.php");
?>