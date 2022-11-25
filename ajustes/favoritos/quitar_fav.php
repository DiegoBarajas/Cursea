<?php

    session_start();
    require_once("../../DB/crud.php");

    if(!isset($_SESSION['id'])){
        header("Location: /index.php");
    }

    $id = $_GET['id'];

    $sql = "DELETE FROM favoritos WHERE id='$id'";
    sentencia($sql);

    header("Location: favoritos.php");

?>