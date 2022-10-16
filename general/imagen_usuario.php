<?php

    require_once("../DB/crud.php");
    session_start();

    $id = $_SESSION['id'];

    
    $sql = "SELECT foto FROM usuario WHERE id='$id'";
    $res = sentencia($sql);

    if($res->num_rows > 0){
        $row = $res->fetch_assoc();
    
        //Render image
        header("Content-type: image/jpg"); 
        echo $row['foto'];
    }

    if($row['foto'] == null){
        $sql = "SELECT image FROM images WHERE id = 1";
        $res = sentencia($sql);

        $imgData = $res->fetch_assoc();
        
        //Render image
        header("Content-type: image/jpg"); 
        echo $imgData['image']; 
    }

?>