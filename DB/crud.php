<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "cursea";

    $conn = new mysqli($server, $user, $password, $database);

    if($conn->connect_errno){
        die ("Conexión fallida: " . $conn->connect_error);
    }

    function sentencia($sql){
        global $conn;

        $res = $conn->query($sql);
        return $res;
    }

?>