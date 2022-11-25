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

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Cursea Admin - Agregar/Modificar Curso</title>

        <link rel="shortcut icon" href="/img/icono_admin.png" type="image/x-icon">

        <link rel="stylesheet" href="admin_form.css">

    </head>

    <body>

        <form action="subir_curso.php" method="post" enctype="multipart/form-data">

            <h1>Agregar/Modificar Curso</h1>



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



            <input type="text" name="id" placeholder="ID del Curso a modificar (SOLO UPDATE)">

            <input type="text" name="new_id" placeholder="Nuevo ID del Curso (SOLO UPDATE)">

            <input type="text" name="nombre" id="" placeholder="Nombre del Curso">

            <textarea name="descripcion" id="" cols="100" rows="10" placeholder="Descripcion del Curso"></textarea>

            <input type="file" name="imagen" id="" accept="image/*" >

            <input type="text" name="duracion" id="" placeholder="Duracion">

            <input type="text" name="categoria" id="" placeholder="Categoria">

            <input type="text" name="tipo_curso" id="" placeholder="Tipo de Curso">

            <input type="text" name="fecha_subido" placeholder="Fecha de Subida">

            <input type="text" name="ultima_modificacion" placeholder="Ultima modificaion (SOLO UPDATE)">

            <input type="submit" value="Subir Curso">

        </form>

        <a href="/index.php">Volver al index</a>

        <a class="atras" href="admin.php">Atras</a>

    </body>

</html>