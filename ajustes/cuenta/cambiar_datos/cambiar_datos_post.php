<?php
    error_reporting(0);
    require_once("../../../DB/crud.php");
    session_start();
    $id = $_SESSION['id'];


    $sql = "SELECT * FROM usuario WHERE id=$id";
    $res = sentencia($sql);
    $row = $res->fetch_assoc();

    if(!isset($_POST['nombre']) || ($_POST['nombre'] === "")){
        $nombre = $row['nombre'];  
    }else{
        $nombre = $_POST['nombre'];  
        $_SESSION['nombre'] = $_POST['nombre'];  
    }

    if(!isset($_POST['email']) || ($_POST['email'] === "")){
        $email = $row['email'];    
    }else{
        $email = $_POST['email'];
    }

    if(!isset($_POST['password']) || ($_POST['password'] === "")){
        $password_enc = $row['password'];
    }else{
        $password = $_POST['password'];  
        $_SESSION['password'] = $_POST['password'];  
        $password_enc = password_hash($password, PASSWORD_DEFAULT);
    }

    $sql = "UPDATE usuario SET nombre = '$nombre', email='$email', password='$password_enc' WHERE id=$id";

    sentencia($sql);


    if($_FILES["image"]["tmp_name"]){
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false){
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

                $sql = "UPDATE usuario SET foto = '$imgContent' WHERE id=$id";
                sentencia($sql);
        }
    }
        

    header("Location: /ajustes/cuenta/cambiar_datos/cambiar_datos.php");
?>