<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/general/navbar.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Prompt:wght@600&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="../../../img/icono.png" type="image/x-icon">
        <title>Cursea - Cambiar imagen</title>
        <?php
            session_start();
            if((!isset($_SESSION['tema'])) || ($_SESSION['tema'] == "claro")){
                echo '<link rel="stylesheet" href="cambiar_datos.css">';
            }else if($_SESSION['tema'] == "oscuro"){
                echo '<link rel="stylesheet" href="cambiar_datos_osc.css">';
            }
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
            <section class="sec-logo">
                <img src="/img/cursea-logo-blanco.png" alt="Logo" class="img-logo">
            </section>
            <!-- Espacio en blanco -->
            <section class="sect-spa1"></section>
            <!-- Menu Principal -->
            <nav class="nav-home" onclick="window.location.href = '/index.php';">
                <img src="/img/home-menu.png" alt="home" class="img-navbar-home img-here">
            </nav>
            <!-- Buscar -->
            <nav class="nav-search">
                <img src="/img/search-menu.png" alt="search" class="img-navbar-search">
            </nav>
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


                    require_once("../../../DB/crud.php");
            ?>
        </header>

        <main>
            <article class="art-cambiar-datos">
                    <form class="form-cambiar-datos" action="cambiar_datos_post.php" method="post">
                        <label for="nombre">Nuevo nombre</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Nuevo nombre">
                        <label for="email">Nuevo correo electrónico</label>
                        <input type="email" name="email" id="email" placeholder="Nuevo correo electrónico">
                        <label for="password">Nueva contraseña</label>
                        <input type="password" name="password" id="password" placeholder="Nueva contraseña">
                    </form>
                        <label for="Confirmar">Contraseña actual</label>
                        <input type="password" id="confirmar">
            </article>

            <article class="art-cambiar-img">
                <h2 class="h2-actual subtitulo">Imagen actual</h2>
                <img src="/general/imagen_usuario.php" alt="Imagen actual" class="img-actual">
                
                <form action="cambiar_datos_post.php" method="post" id="form" enctype="multipart/form-data">
                    <label for="input-imagen" class="lab-file contenido">Seleccionar imagen...</label>
                    <input type="file" name="image" accept="image/*" id="input-imagen" class="input-file" onchange="seleccionarImg()">

                    <img class="img-nueva" id="img">
                </form>

                <p class="p-error contenido" id="p-error"></p>

                <article class="art-btns">
                    <button class="btn-submit"  onclick="cambiarImg()">Guardar</button>
                    <button class="btn-submit btn-cancel" onclick="window.location.href = '../cuenta.php';">Cancelar</button>
                </article>
            </article>
        </main>
        <script src="cambiar_datos.js"></script>
    </body>
</html>