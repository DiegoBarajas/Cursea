<?php
    require_once("../DB/crud.php");

    $sentencia = $_POST['sentencia'];

    $id = $_POST['id']; //UPD
    $new_id=$_POST['new_id']; //UPD
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $duracion = $_POST['duracion'];
    $categoria = $_POST['categoria'];
    $tipo_curso = $_POST['tipo_curso'];
    $fecha_subido = $_POST['fecha_subido'];
    $ultima = $_POST['ultima_modificacion'];

    $img = $_FILES['imagen']['tmp_name'];
    if($img != ""){
        $imagen = addslashes(file_get_contents($img));
    }

    if($sentencia == "INSERT"){
        if(($nombre && $descripcion && $duracion && $categoria && $tipo_curso && $img && $fecha_subido) != ""){

            $sql = "INSERT INTO curso (nombre, descripcion, duracion, categoria, tipo_curso, imagen, fecha_subida) VALUES ('$nombre', '$descripcion', '$duracion', '$categoria', '$tipo_curso', '$imagen', '$fecha_subido')";
            if(sentencia($sql)){
                echo "Exito!";
                echo '<br><a href="admin.php">Admin</a>';
            }else{
                echo "ERROR: " . $conn->error;
            }

        }else{
            echo "DEBES LLENAR TODOS LOS CAMPOS OBLIGATORIOS (nombre, descripcion, duracion, categoria, tipo_curso, imagen, fecha_subida)";
        }
    }else if($sentencia == "UPDATE"){
        if($id == ""){
            echo "TIENES QUE LLENAR EL CAMPO 'ID DEL CURSO A MODIFICARL'";
        }else{
            if(($new_id == "") && ($nombre== "") && ($descripcion == "") && ($duracion== "") && ($categoria == "") && ($tipo_curso == "") && ($img == "") && ($fecha_subido == "") && ($ultima == "")){
                echo "DEBES MODIFICAR ALGUN VALOR COMO: nombre, nuevo ID, descripcion, ultima modificacion, etc";
            }else{

                if($new_id != ""){
                    $sql = "UPDATE curso SET id = '$new_id' WHERE id = '$id'";
                    sentencia($sql);
                    echo 'ID MODIFICADO!<br>';
                }

                if($nombre != ""){
                    $sql = "UPDATE curso SET nombre = '$nombre' WHERE id = '$id'";
                    sentencia($sql);
                    echo 'nombre MODIFICADO!<br>';
                }

                if($descripcion != ""){
                    $sql = "UPDATE curso SET descripcion = '$descripcion' WHERE id = '$id'";
                    sentencia($sql);
                    echo 'descripcion MODIFICADA!<br>';
                }

                if($duracion != ""){
                    $sql = "UPDATE curso SET duracion = '$duracion' WHERE id = '$id'";
                    sentencia($sql);
                    echo 'duracion MODIFICADO!<br>';
                }

                if($fecha_subido != ""){
                    $sql = "UPDATE curso SET fecha_subida = '$fecha_subido' WHERE id = '$id'";
                    sentencia($sql);
                    echo 'fecha_subido MODIFICADO!<br>';
                }

                if($tipo_curso != ""){
                    $sql = "UPDATE curso SET tipo_curso = '$tipo_curso' WHERE id = '$id'";
                    sentencia($sql);
                    echo 'tipo_curso MODIFICADA!<br>';
                }


                if($img != ""){
                    $sql = "UPDATE curso SET imagen = '$imagen' WHERE id = '$id'";
                    sentencia($sql);
                    echo 'imagen MODIFICADO!<br>';
                }

                if($nombre != ""){
                    $sql = "UPDATE curso SET nombre = '$nombre' WHERE id = '$id'";
                    sentencia($sql);
                    echo 'nombre MODIFICADO!<br>';
                }

                if($ultima != ""){
                    $sql = "UPDATE curso SET ultima_modificacion = '$ultima' WHERE id = '$id'";
                    sentencia($sql);
                    echo 'ultima_modificacion MODIFICADA!<br>';
                }

            }
        }
    }else if($sentencia == "DELETE"){
        if($id == ""){
            echo "DEBES ESCRIBIR IN id";
        }else{
            $sql = "DELETE FROM curso WHERE id='$id'";
            sentencia($sql);
            echo "EL CURSO $id SE HA ELIMINADO CORRECTAMENTE";
        }
    }
        
?>


<style>
    a{
        position: fixed;
        margin: 0px;
        padding: 0px;
        left: 10px;
        bottom: 10px;
    }
</style>
