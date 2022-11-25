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
        header("Location: https://cdn-icons-png.flaticon.com/128/3177/3177440.png");
    }

?>