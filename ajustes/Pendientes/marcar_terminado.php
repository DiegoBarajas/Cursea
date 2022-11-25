<?php
    session_start();
    require_once("../../DB/crud.php");

    if(!isset($_SESSION['id'])){
        header("Location: /index.php");
    }

    $usuario = $_SESSION['id'];
    $curso = $_GET['curso'];

    $sql = "UPDATE status_curso SET status = '1' WHERE id_usuario = '$usuario' AND id_curso = '$curso'";
    sentencia($sql);

    $consulta = "SELECT * FROM usuario WHERE id='$usuario'";
    $res = sentencia($consulta);
    $row = $res->fetch_assoc();


    $pend = ($row['cursos_pendientes'])-1;
    $ter = ($row['cursos_terminados'])+1;

    $sql = "UPDATE usuario SET cursos_pendientes = '$pend', cursos_terminados = '$ter' WHERE id = '$usuario'";
    sentencia($sql);

    header("Location: pendientes.php");

?>