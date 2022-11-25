<!DOCTYPE html>

<html lang="es">

    <head>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/general/navbar.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Prompt:wght@600&display=swap" rel="stylesheet">

        <link rel="shortcut icon" href="/img/icon.png" type="image/png">
        
        <title>Cursea - Cambiar datos</title>

        <?php

            session_start();

            $password_act = $_SESSION['password'];



            if(!isset($_SESSION['logged'])){

                header("Location: /index.php");

            }



            if((!isset($_SESSION['tema'])) || ($_SESSION['tema'] == "claro")){

                echo '<link rel="stylesheet" href="cambiar_datos.css">';

            }else if($_SESSION['tema'] == "oscuro"){

                echo '<link rel="stylesheet" href="cambiar_datos_osc.css">';

            }



            require_once("../../../DB/crud.php");



            $id = $_SESSION['id'];



            $sql = "SELECT * FROM usuario WHERE id = $id;";

            $res = sentencia($sql);

            $row = $res->fetch_assoc();



            $nombre = $row['nombre'];

            $email = $row['email'];

        ?>

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



        <main>

            <article class="art-cambiar-datos">

                <h1 class="h1-titulo titulo">Cambiar información</h1>

                    <form class="form-cambiar-datos" action="cambiar_datos_post.php" method="post" id="form" enctype="multipart/form-data">



                        <input type="file" name="image" accept="image/*" id="input-imagen" class="input-file" onchange="seleccionarImg()">



                        <label for="nombre" class="lab-form subtitulo">*Nuevo nombre (<u><?php echo $nombre ?></u>)</label>

                        <input name="nombre" type="text" class="input-form contenido" id="nombre" placeholder="Nuevo nombre">



                        <label for="email" class="lab-form subtitulo">*Nuevo correo electrónico (<u><?php echo $email ?></u>)</label>

                        <input name="email" type="email" class="input-form contenido" id="email" placeholder="Nuevo correo electrónico">



                        <label for="password" class="lab-form subtitulo">*Nueva contraseña</label>

                        <input name="password" type="password" class="input-form contenido" id="password" placeholder="Nueva contraseña">

                        <pre class="p-error contenido" id="p-error"> </pre>

                    </form>



                    <section class="sect-conf">

                        <label for="Confirmar" class="lab-form subtitulo">Contraseña actual</label>

                        <input type="password" class="input-form contenido" id="confirmar" name="conf" placeholder="Ingresa tu contraseña actual">

                        <p class="p-msg contenido">Los campos marcados con * requieren confirmar tu contraseña</p>

                    </section>



            </article>



            <article class="art-cambiar-img">

                <h2 class="h2-actual subtitulo">Imagen actual</h2>

                <label class="lab-img" for="input-imagen"><img src="/general/imagen_usuario.php" alt="Imagen actual" class="img-actual"></label>

                <p class="p-cambiar-img subtitulo">Cambiar Imagen</p>

                <label for="input-imagen" class="lab-file contenido">Elegir nueva imagen...</label>

                <img class="img-nueva" id="img" src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/33317768-c51f-4faf-9465-413805cf1a46/d4x2xn5-382daeeb-50d5-4956-8179-537abdfad2d5.png/v1/fill/w_900,h_800,strp/fondo_png_vacio_by_juuliidev_d4x2xn5-fullview.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3siaGVpZ2h0IjoiPD04MDAiLCJwYXRoIjoiXC9mXC8zMzMxNzc2OC1jNTFmLTRmYWYtOTQ2NS00MTM4MDVjZjFhNDZcL2Q0eDJ4bjUtMzgyZGFlZWItNTBkNS00OTU2LTgxNzktNTM3YWJkZmFkMmQ1LnBuZyIsIndpZHRoIjoiPD05MDAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.UMHAd4VAE4X2NSjQwmcqsJ1pMX1PkshpKM-ZjDGkw7U">



                <article class="art-btns">

                    <button class="btn-submit"  onclick="cambiarImg('<?php echo $password_act ?>')">Guardar</button>

                    <button class="btn-submit btn-cancel" onclick="window.location.href = '../cuenta.php';">Cancelar</button>

                </article>

            </article>

        </main>

        <script src="cambiar_datos.js"></script>

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

    </body>

</html>