<?php
    //errores(FALSE);

    //Variables
    $hostname = "cursea.coe0irawvnp8.us-east-1.rds.amazonaws.com";
    $user = "curseadmin";
    $password = "curseadmin";
    $database = "cursea";

    /*

    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "cursea";

    */


    //Crear Conexion
    $conn = new mysqli($hostname, $user, $password, $database);
    $conn->set_charset("UTF8"); //Asignar tabla de caracteres

    //Comprobar si la conexion se realizo
    if($conn->connect_errno){
        die ("Conexión fallida: " . $conn->connect_error);
    }

    //Funcion para llamar en otros archivos para realizar una consulta SQL
    function sentencia($sql){
        global $conn;

        $res = $conn->query($sql);
        return $res; //Retornar el resultado de la consulta
    }

    function errores($enchufe){
        if(!$enchufe)
            error_reporting (0);
    }
?>