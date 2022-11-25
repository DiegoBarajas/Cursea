<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/general/navbar.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="/general/footer.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Prompt:wght@600&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="/img/icon.png" type="image/png">        
        <title>Cursea - Ajustes</title>
        <?php
            session_start();
            if((!isset($_SESSION['tema'])) || ($_SESSION['tema'] == "claro")){
                echo '<link rel="stylesheet" href="ajustes.css">';
            }else if($_SESSION['tema'] == "oscuro"){
                echo '<link rel="stylesheet" href="ajustes_osc.css">';
            }
        ?>

    </head>

    <body>
        <?php
            require_once("../DB/crud.php");

            if((!isset($_SESSION['logged'])) || ($_SESSION['logged'] == "no")){
                header('Location: ../login/login.php');
            }else{
                //Sentencia SQL
                $sql = "SELECT * FROM usuario WHERE id=" . $_SESSION['id'];
                $result = sentencia($sql);

                //Recorrido DB
                $row = $result->fetch_assoc();

                $pendientes = $row['cursos_pendientes'];
                $terminados = $row['cursos_terminados'];
                        
                //Cerrar conexión
                $conn->close();
            }

        ?>
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
            <article class="art-titulo">
                <h1 class="h1-titulo titulo">Ajustes de Cuenta</h1>
            </article>


            <article class="art-ajustes">
                <article class="art-datos" onclick="window.location.href = 'cuenta/cuenta.php'">
                    <section class="sect-icono">
                        <img src="../img/ajustes/personal.png" alt="Personal" class="img-icono">
                    </section>
                    <section class="sect-datos">
                        <h3 class="h3-nombre-dato subtitulo">Información de cuenta</h3>
                        <p class="p-desc-dato contenido">Nombre, imagen, correo, contraseña...</p>
                    </section>
                    <section class="sect-flecha">  
                        <img src="../img/ajustes/flecha.png" alt="Flecha" class="img-flecha">
                    </section>
                </article>

                <article class="art-datos" onclick="window.location.href = 'favoritos/favoritos.php'">
                    <section class="sect-icono">
                        <img src="../img/ajustes/favoritos.png" alt="Otro" class="img-icono">
                    </section>
                    <section class="sect-datos">
                        <h3 class="h3-nombre-dato subtitulo">Favoritos</h3>
                        <p class="p-desc-dato contenido">Mis cursos marcados como favoritos</p>
                    </section>
                    <section class="sect-flecha">  
                        <img src="../img/ajustes/flecha.png" alt="Flecha" class="img-flecha">
                    </section>
                </article>


                <article class="art-datos" onclick="window.location.href = 'Pendientes/pendientes.php'">
                    <section class="sect-icono">
                        <img src="../img/ajustes/pendiente.png" alt="Pendiente" class="img-icono">
                    </section>
                    <section class="sect-datos">
                        <h3 class="h3-nombre-dato subtitulo">Cursos pendientes</h3>
                        <?php echo '<p class="p-desc-dato contenido">' .$pendientes. ' Cursos pendientes</p>'; ?>
                    </section>
                    <section class="sect-flecha">  
                        <img src="../img/ajustes/flecha.png" alt="Flecha" class="img-flecha">
                    </section>
                </article>

                <article class="art-datos" onclick="window.location.href = 'Terminados/terminados.php'">
                    <section class="sect-icono">
                        <img src="../img/ajustes/terminado.png" alt="Terminado" class="img-icono">
                    </section>
                    <section class="sect-datos">
                        <h3 class="h3-nombre-dato subtitulo">Cursos terminados</h3>
                        <?php echo '<p class="p-desc-dato contenido">' .$terminados. ' Cursos terminados</p>'; ?>
                    </section>
                    <section class="sect-flecha">  
                        <img src="../img/ajustes/flecha.png" alt="Flecha" class="img-flecha">
                    </section>
                </article>

                <?php
                    if(isset($_SESSION['admin'])){
                ?>
                    <article class="art-datos-admin" onclick="window.location.href = '/admin/admin.php'">
                        <h2 class="h2-admin subtitulo">Admin</h2>
                    </article>
                <?php
                    }
                ?>
                
            </article>
        </main>
        <!-- Footer -->
        <footer>


            <section class="sect-footer">
                <section class="sect-text-footer">
                    <a href="/footer/footer.php#asistencia" class="a-footer">Asistencia</a>
                </section>

                <section class="sect-text-footer">
                    <a href="/footer/footer.php#privacidad" class="a-footer">Politicas de privacidad</a>
                </section>

                <section class="sect-text-footer">
                    <a href="/footer/footer.php#contacto" class="a-footer">Contacto</a>
                </section>
            </section>


            <hr class="hr-footer">


            <section class="sect-footer-2">
                <p class="p-footer">© 2022 Cursea - El contenido de este sitio web es meramente educativo</p>
            </section>


        </footer>

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
