<?php
    $email = $_GET['email'];

    require_once("../DB/crud.php");

    $sql = "UPDATE usuario SET activa = '1' WHERE email = '$email'";
    $res = sentencia($sql);

    $consulta = "SELECT * FROM usuario WHERE email = '$email' AND activa = '1'";
    $result = sentencia($consulta);
    $row = $result->fetch_assoc();



    header("location: /login/login.php");

?>