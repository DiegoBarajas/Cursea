<?php
    require_once("../DB/crud.php");

    $sentencia = $_POST['sentencia'];

    $id = $_POST['id'];
    $new_id = $_POST['new_id'];
    $nombre = $_POST['nombre'];
    $numero = $_POST['numero'];
    $id_curso = $_POST['id_curso'];
    $recurso = $_POST['recurso'];

    if($sentencia == "INSERT"){
        if(($nombre && $numero && $id_curso) != ""){
            $sql = "INSERT INTO video (nombre, id_curso, numero, recurso) VALUES ('$nombre', '$id_curso', '$numero', '$recurso')";
            if(sentencia($sql)){
                echo "Exito!";
                echo '<br><a href="admin.php">Admin</a>';
            }else{
                echo "ERROR: " . $conn->error;
            }
        }else{
            echo "DEBES LLENAR TODOS LOS CAMPOS (nombre, id_curso, numero, recurso)";
        }
    }else if($sentencia == "UPDATE"){
        if($id == ""){
            echo "DEBES LLENAR EL CAMPO (Id del curso)";
        }else{
            if(($new_id == "") && ($nombre == "") && ($numero == "") && ($id_curso == "") && ($recurso == "")){
                echo "Debes escribir sobre algun campo para modificar";
            }else{


                if($new_id != ""){
                    $sql = "UPDATE video set id='$new_id' WHERE id='$id'";
                    sentencia($sql);
                    echo 'id MODIFICADA!<br>';
                }

                if($nombre != ""){
                    $sql = "UPDATE video set nombre='$nombre' WHERE id='$id'";
                    sentencia($sql);
                    echo 'nombre MODIFICADA!<br>';
                }

                if($numero != ""){
                    $sql = "UPDATE video set numero='$numero' WHERE id='$id'";
                    sentencia($sql);
                    echo 'numero MODIFICADA!<br>';
                }

                if($id_curso != ""){
                    $sql = "UPDATE video set id_curso='$id_curso' WHERE id='$id'";
                    sentencia($sql);
                    echo 'id_curso MODIFICADA!<br>';
                }

                if($recurso != ""){
                    $sql = "UPDATE video set recurso='$recurso' WHERE id='$id'";
                    sentencia($sql);
                    echo 'recurso MODIFICADA!<br>';
                }
            }
        }
    }else if($sentencia == "DELETE"){
        if($id == ""){
            echo "DEBES ESCRIBIR IN id";
        }else{
            $sql = "DELETE FROM video WHERE id='$id'";
            sentencia($sql);
            echo "EL VIDEO $id SE HA ELIMINADO CORRECTAMENTE";
        }
    }
?>