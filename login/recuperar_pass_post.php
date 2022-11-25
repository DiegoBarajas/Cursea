<?php
    $id = $_POST['id'];
    $password = $_POST['password'];    
    $pass_enc = password_hash($password, PASSWORD_DEFAULT);

    require_once("../DB/crud.php");

    $sql = "UPDATE usuario SET password='$pass_enc' WHERE id = '$id'";
    sentencia($sql);

    header("Location: /login/login.php");
?>