<?php
    require_once("../DB/crud.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $num = $_GET['num'];
        
        $sql = "SELECT img$num FROM texto WHERE id='$id'";
        
        $res = sentencia($sql);

        if($res->num_rows > 0){
            $row = $res->fetch_assoc();
        
            //Render image
            header("Content-type: image/jpg"); 
            echo $row['img'.$num];
        }
    }else{
        header("Location: ../index.php");
    }

?>