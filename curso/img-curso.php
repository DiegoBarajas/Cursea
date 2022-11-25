<?php
    require_once("../DB/crud.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        
        $sql = "SELECT imagen FROM curso WHERE id='$id'";
        
        $res = sentencia($sql);

        if($res->num_rows > 0){
            $row = $res->fetch_assoc();
        
            //Render image
            header("Content-type: image/jpg"); 
            echo $row['imagen'];
        }

        if($row['foto'] == null){
            echo "No hay foto";
        }
    }else{
        header("Location: ../index.php");
    }

?>