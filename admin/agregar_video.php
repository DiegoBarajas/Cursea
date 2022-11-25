<?php
    session_start();

    if(!isset($_SESSION['admin'])){
        header("Location: ../ajustes\cuenta\logout.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cursea Admin - Agregar/Modificar Video</title>
        <link rel="shortcut icon" href="/img/icono_admin.png" type="image/x-icon">
        <link rel="stylesheet" href="admin_form.css">
    </head>
    <body>
        <h1>Subir/Actualizar Video</h1>
        <form action="subir_video.php" method="post">
            <section>
                <label>UPDATE</label>
                <input type="radio" name="sentencia" value="UPDATE" class="si">
            </section>
            <section>
                <label>INSERT</label>
                <input type="radio" name="sentencia" value="INSERT" class="si" required>
            </section>
            <section>
                <label>DELETE</label>
                <input type="radio" name="sentencia" value="DELETE" class="si" required>
            </section>

            <input type="text" name="id" placeholder="Id del curso (UDP)">
            <input type="text" name="new_id" placeholder="Nuevo ID del curso (UPD)">
            <input type="text" name="nombre" placeholder="Nombre del Video">
            <input type="text" name="id_curso" placeholder="ID del Curso">
            <input type="text" name="numero" placeholder="Número de video">
            <input type="text" name="recurso" placeholder="Recurso">

            <input type="submit" value="Subir">
        </form>
        <a href="/index.php">Volver al index</a>
        <a class="atras" href="admin.php">Atras</a>
    </body>

    <style>
        
    </style>
</html>