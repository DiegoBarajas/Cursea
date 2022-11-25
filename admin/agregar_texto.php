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
        <h1>Subir/Actualizar Texto</h1>
        <form action="subir_texto.php" method="post" enctype="multipart/form-data">
            <section>
                <label>UPDATE</label>
                <input required type="radio" name="sentencia" id="sen" value="UPDATE" class="si">
            </section>

            <section>
                <label>INSERT</label>
                <input required type="radio" name="sentencia" id="sen" value="INSERT" class="si">
            </section>

            <section>
                <label>DELETE</label>
                <input required type="radio" name="sentencia" id="sen" value="DELETE" class="si">
            </section>

            <input type="text" name="id" placeholder="ID actual del texto (UPD)">
            <input type="text" name="new_id" placeholder="Nuevo ID (UPD)">
            <input type="text" name="nombre" placeholder="Nombre del texto">
            <input type="text" name="id_curso" placeholder="ID del Curso">
            <input type="text" name="numero" placeholder="Número">

            <textarea name="texto1" cols="100" rows="10"></textarea>
            <input type="file" name="img1" accept="img/*">
            <textarea name="texto2" cols="100" rows="10"></textarea>
            <input type="file" name="img2" accept="img/*">
            <textarea name="texto3" cols="100" rows="10"></textarea>
            <input type="file" name="img3" accept="img/*">

            <input type="submit" value="Subir">
        </form>
        <a href="/index.php">Volver al index</a>
        <a class="atras" href="admin.php">Atras</a>
    </body>
</html>