<?php

    session_start();

    if(!isset($_SESSION['logged'])){

        header("Location: ../ajustes\cuenta\logout.php");

    }else if(!isset($_SESSION['admin'])){

        header("Location: ../ajustes\cuenta\logout.php");

    }

?>



<!DOCTYPE html>

    <html lang="es">

    <head>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Cursea Admin</title>

        <link rel="shortcut icon" href="/img/icono_osc.png" type="image/png">


    </head>

    <body>

        <br><br><br><br><br><br><br><br><br><br><br>

        <a href="agregar_curso.php">Agregar/Modificar Curso</a><br><br>

        <a href="agregar_video.php">Agregar/Modificar Video</a><br><br>

        <a href="agregar_texto.php">Agregar/Modificar Texto</a>

        

        <a class="a" href="/index.php">Volver al index</a>

    </body>



    <style>

        body{

            display: flex;

            justify-content: center;

            align-items: center;

            flex-direction: column;

            background-color: #0f0f0f;

        }



        form{

            margin-top: 20%;

            display: flex;

            justify-content: center;

            align-items: center;

            flex-direction: column;

        }



        input{

            margin-top: 10px;

        }



        a{

            color: white;

            font-family: monospace;

            margin: auto;

        }



        .a{

            position: fixed;

            margin: 0px;

            padding: 0px;

            left: 10px;

            bottom: 10px;

        }

    </style>

</html>