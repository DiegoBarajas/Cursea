<?php
    require_once("../DB/crud.php");

    $sentencia = $_POST['sentencia'];

    $id = $_POST['id'];
    $new_id = $_POST['new_id'];
    $nombre = $_POST['nombre'];
    $id_curso = $_POST['id_curso'];
    $numero = $_POST['numero'];
    
    $texto1 = $_POST['texto1'];
    $texto2 = $_POST['texto2'];
    $texto3 = $_POST['texto3'];

    $i1 = $_FILES['img1']['tmp_name'];
    $i2 = $_FILES['img2']['tmp_name'];
    $i3 = $_FILES['img3']['tmp_name'];


    if($i1!=""){
        $img1 = addslashes(file_get_contents($i1));
    }else{
        $img1 = null;
    }

    if($i2!=""){
        $img2 = addslashes(file_get_contents($i2));
    }else{
        $img2 = null;
    }

    if($i3!=""){
        $img3 = addslashes(file_get_contents($i3));
    }else{
        $img3 = null;
    }

    if($sentencia == "INSERT"){
        if(($nombre && $id_curso && $numero) == ""){
            echo "Debes llenar los campos (nombre, id_curso, numero)";
        }else{
            $sql = "INSERT INTO texto (nombre, id_curso, numero, texto1, texto2, texto3, img1, img2, img3) VALUES ('$nombre', '$id_curso','$numero', '$texto1', '$texto2', '$texto3', '$img1', '$img2', '$img3')";
            if(sentencia($sql)){
                echo "Exito!";
                echo '<br><a href="admin.php">Admin</a>';
            }else{
                echo "ERROR: " . $conn->error;
            }
        }
    }else if($sentencia == "UPDATE"){
        if($id == ""){
            echo "DEBES LLENAR EL CAMPO (Id del curso)";
        }else{


            if($new_id != ""){
                $sql = "UPDATE texto SET id='$new_id' WHERE id='$id'";
                sentencia($sql);
                echo 'ID MODIFICADO!<br>';
            }

            
            if($nombre != ""){
                $sql = "UPDATE texto SET nombre='$nombre' WHERE id='$id'";
                sentencia($sql);
                echo 'nombre MODIFICADO!<br>';
            }

            
            if($id_curso != ""){
                $sql = "UPDATE texto SET id_curso='$id_curso' WHERE id='$id'";
                sentencia($sql);
                echo 'id_curso MODIFICADO!<br>';
            }

            
            if($numero != ""){
                $sql = "UPDATE texto SET numero='$numero' WHERE id='$id'";
                sentencia($sql);
                echo 'numero MODIFICADO!<br>';
            }

            
            if($texto1 != ""){
                $sql = "UPDATE texto SET texto1='$texto1' WHERE id='$id'";
                sentencia($sql);
                echo 'texto1 MODIFICADO!<br>';
            }
            if($texto2 != ""){
                $sql = "UPDATE texto SET texto2='$texto2' WHERE id='$id'";
                sentencia($sql);
                echo 'texto2 MODIFICADO!<br>';
            }
            if($texto3 != ""){
                $sql = "UPDATE texto SET texto3='$texto3' WHERE id='$id'";
                sentencia($sql);
                echo 'texto3 MODIFICADO!<br>';
            }

            $sql = "UPDATE texto SET img1='$img1', img2='$img2', img3='$img3' WHERE id='$id'";
            sentencia($sql);

        }
    }else if($sentencia == "DELETE"){
        if($id == ""){
            echo "DEBES ESCRIBIR IN id";
        }else{
            $sql = "DELETE FROM texto WHERE id='$id'";
            sentencia($sql);
            echo "EL TEXTO $id SE HA ELIMINADO CORRECTAMENTE";
        }    
    }

?>