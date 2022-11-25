<!DOCTYPE html>
<html lang="es">
    <!--    Iniciar sessions    -->
    <?php 

        require_once("../../DB/crud.php");


        session_start();
        if((!isset($_SESSION['logged'])) || ($_SESSION['logged'] == "no")){
            header('Location: ' . "../../login/login.php");
        }

        //Sentencia SQL
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM usuario WHERE id=$id";
        $result = sentencia($sql);

        //Recorrido DB
        $row = $result->fetch_assoc();

        //Variables 
        $nombre = $row['nombre'];
        $email = $row['email'];
        $password = $_SESSION['password'];
        $foto = $row['foto'];
        $tema = $_SESSION['tema'];
        
    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../general/navbar.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Prompt:wght@600&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="/img/icon.png" type="image/png">
        <?php
            if($tema == 'oscuro')
                echo '<link rel="stylesheet" href="cuenta_osc.css">';
            else if($tema == 'claro')
                echo '<link rel="stylesheet" href="cuenta.css">';
        ?>

        <title>Cursea - Información de Cuenta</title>
        <script src="cuenta.js"></script>
    </head>

    <body>
        <!-- NAV-BAR -->
        <header>
            <!-- Menu Hamburguesa -->
            <nav class="nav-ham">
                <label for="btn-menu" class="lab-ham">
                    <img src="/img/ham-menu.png" alt="menu" class="img-navbar-ham">
                </label>
            </nav>
            <!-- Logo -->
            <section class="sec-logo" onclick="window.location.href = '/index.php'">
                <img src="/img/cursea-logo-blanco.png" alt="Logo" class="img-logo">
            </section>
            <!-- Usuario -->

            <?php
                    if((!isset($_SESSION['logged']) || ($_SESSION['logged'] == "no"))){
                        echo '
                            <nav class="nav-user">
                                <a href="/login/login.php" class="nav-user">
                                    <img src="/img/user-menu.png" alt="user" class="img-navbar-user">
                                </a>
                            </nav>
                        ';
                    }else{
                        echo '
                            <nav class="nav-user">
                                <a href="/ajustes/ajustes.php" class="nav-user">
                                    <img src="/general/imagen_usuario.php" alt="user" class="img-navbar-user">
                                </a>
                            </nav>
                        ';
                    }


            ?>

            <!-- Buscar -->
            <nav class="nav-search" onclick="window.location.href='/busqueda/busqueda.php'">
                <img src="/img/search-menu.png" alt="search" class="img-navbar-search">
            </nav>
            
            <!-- Menu Principal -->
            <nav class="nav-home" onclick="window.location.href='/index.php'">
                <img src="/img/home-menu.png" alt="home" class="img-navbar-home">
            </nav>
            
        </header>
        

        <!-- Contenido -->
        <main>
            <section class="sect-titulo">
                <h1 class="h1-titulo titulo">Información de Cuenta</h1>
            </section>
            <section class="sect-blanco-1"></section>

            <section class="sect-contenido">
                <section class="sect-blanco-cont"></section>
                <article class="art">
                    <label class="lab subtitulo"  onclick="window.location.href = 'cambiar_datos/cambiar_datos.php';"><b>Foto de perfil: </b></label>
                    <img src="/general/imagen_usuario.php" alt="Imagen de Usuario" class="img-perfil" onclick="window.location.href = 'cambiar_datos/cambiar_datos.php';">
                </article>
                <article class="art">
                    <label class="lab subtitulo"  onclick="window.location.href = 'cambiar_datos/cambiar_datos.php';"><b>Nombre: </b></label>
                    <?php echo '<label class="lab-cont contenido">'.$nombre.'</label>'; ?>
                </article>
                <article class="art">
                    <label class="lab subtitulo"  onclick="window.location.href = 'cambiar_datos/cambiar_datos.php';"><b>Correo: </b></label>
                    <?php echo '<label class="lab-cont contenido">'.$email.'</label>'; ?>

                </article>
                <article class="art">
                    <label class="lab subtitulo"  onclick="window.location.href = 'cambiar_datos/cambiar_datos.php';"><b>Contraseña: </b></label>
                    <?php
                        $lenght= strlen($password);
                        $password_dec = "";
                        for( $i=0;$i<$lenght;$i++){
                            $password_dec .= "*";
                        }
                        echo '<label class="lab-cont contenido"  onclick="window.location.href = \'cambiar_datos/cambiar_datos.php\';">' . $password_dec . '</label>'; 
                     ?>
                </article>
                <article class="art">
                    <button id="btn-perfil" class="btn" onclick="window.location.href = 'cambiar_datos/cambiar_datos.php';">Cambiar Datos</button>
                </article>
                <article class="art">
                    <label class="lab subtitulo" for="switch-label" onclick="switchBtn();"><b>Tema: </b></label>

                    <div class="switch-button">
                        <!-- Checkbox -->
                        <input type="checkbox" name="switch" id="switch-label" class="switch-button__checkbox">
                        <!-- Botón -->
                        <label for="switch-label" class="switch-button__label" onclick="switchBtn();"></label>
                    </div>
                    <?php 
                        if(strlen($tema)<6){
                            echo '<label class="lab-switch contenido"><pre> '.$tema.'  </pre></label>';
                        }else{
                            echo '<label class="lab-switch contenido">'.$tema.'</label>';
                        }
                    ?>

                    <form action="cambiar_tema.php" method="post" name="form-tema" id="form_tema">
                        <input type="hidden" name="tema" id="hidden">
                    </form>

                </article>
                <article class="art-logout">
                    <button onclick="window.location.href='logout.php';" class="logout">Cerrar Sesion</button>
                </article>
                <section class="sect-blanco-cont"></section>

            </section>
            <section class="sect-blanco-2"></section>
        </main>

        <!--   Logica del checkbox   -->
        <script>
            var tema = <?= json_encode($tema) ?>;
            if(tema == 'oscuro'){
                document.getElementById('switch-label').checked = true;
            }
        </script>

        <!-- Menu Lateral -->

        <input type="checkbox"  id="btn-menu" class="hide">

        <div class="container-menu">

            <div class="cont-menu">

                <nav>

                    <p class="p-navbar">Personal</p>

                    <!-- Slot del menu lateral -->

                    <section class="sect-nav" onclick="window.location.href = '/ajustes/cuenta/cuenta.php';">

                        <section class="sect-nav-icon">

                            <img src="/img/user-menu.png" alt="img" class="sect-nav-img">

                        </section>

                        <section class="sect-nav-text">

                            <p class="nav-p">Mi Cuenta</p>

                        </section>

                    </section>

                    <!-- ------------------------ -->

                    <section class="sect-nav" onclick="window.location.href = '/ajustes/favoritos/favoritos.php';">

                        <section class="sect-nav-icon">

                            <img src="/img/curso/fav.png" alt="img" class="sect-nav-img">

                        </section>

                        <section class="sect-nav-text">

                            <p class="nav-p">Cusos favoritos</p>

                        </section>

                    </section>



                    <hr>

                    

                    <p class="p-navbar">Categorias</p>

                    <?php

                        $categoria = ["Fotografía", "Diseño", "Informática", "Matemáticas", "Idiomas"];

                        $foto = ["fotografia", "diseño", "informatica", "matematicas", "idioma"];

                        for($i=0;$i<5;$i++){

                    ?>

                    <!-- Slot del menu lateral -->

                    <section class="sect-nav" onclick="window.location.href = '/curso/categoria/categoria.php?categoria=<?php echo$categoria[$i] ?>';">

                        <section class="sect-nav-icon">

                            <img src="/img/categoria/<?php echo$foto[$i] ?>.png" alt="img" class="sect-nav-img">

                        </section>

                        <section class="sect-nav-text">

                            <p class="nav-p"><?php echo$categoria[$i] ?></p>

                        </section>

                    </section>

                    <!-- ------------------------ -->

                    <?php } ?>



                </nav>

            </div>

        </div>

        <div id="load">

            <div id="contenedor">
                <div class="contenedor-loader">
                    <div class="rueda"></div>
                </div>        
            </div>
            <h3 class="titulo car">Cargando contenido...</h3>
            
        </div>

    </body>
    <script src="/general/load.js"></script>
</html>