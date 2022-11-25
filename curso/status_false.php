<?php

    session_start();
    require_once("../DB/crud.php");
    
    if(!isset($_SESSION['id'])){
        header("Location: /index.php");
    }

    $id_video = $_GET['video'];
    $id_usuario = $_SESSION['id'];
    $this_vid = $_GET['this'];

    $sql = "SELECT * FROM status_video WHERE id_usuario='$id_usuario' AND id_video='$id_video';";
    $res = sentencia($sql);
    $row = $res->fetch_assoc();

    if($res->num_rows < 1){
        $sql = "INSERT INTO status_video(id_usuario, id_video, status) VALUES ('$id_usuario', '$id_video', true);";
        $res = sentencia($sql);
    }else{
        if($row['status']){
            $sql = "UPDATE status_video SET status = false WHERE id_usuario='$id_usuario' AND id_video='$id_video'";
            $res = sentencia($sql);
        }else if(!$row['status']){
            $sql = "UPDATE status_video SET status = true WHERE id_usuario='$id_usuario' AND id_video='$id_video'";
            $res = sentencia($sql);
        }
    }
 
    header("Location: video.php?id=$this_vid");
?>