<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/general/navbar.css">
        <link rel="stylesheet" href="/general/footer.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Prompt:wght@600&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="/img/icono.png" type="image/x-icon">
        <?php
            session_start();
            if((!isset($_SESSION['tema'])) || ($_SESSION['tema'] == "claro")){
                echo '<link rel="stylesheet" href="index.css">';
            }else if($_SESSION['tema'] == "oscuro"){
                echo '<link rel="stylesheet" href="index_osc.css">';
            }
        ?>

        <title>Cursea</title>
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
            <nav class="nav-home" onclick="window.location.href='/index.php'">
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


                    require_once("DB/crud.php");
            ?>
        </header>


        <!-- Contenido -->
        <main>
            <section class="sect-spa2"></section>
            <!-- Seccion 1 -->
            <section class="sect-1">
                <!-- Mensaje bienvenida -->
                <section class="sect-bienvenida">

                <?php
                    if( (isset($_SESSION['logged'])) && ($_SESSION['logged'] == "si") ){
                        $nombre = $_SESSION['nombre'];
                        $n = explode(" ", $nombre);
                        echo '<h1 class="h1-bienvenida titulo">Bienvenido ' . $n[0] . '!</h1>';
                    }else{
                        echo '<h1 class="h1-bienvenida">Bienvenido.';
                    }
                ?>
                    
                </section>

                <!-- Mas vistos -->
                <section class="sect-mas-vistos">

                    <article class="art-mas-vistos">
                        <h3 class="h3-mas-vistos subtitulo">Los más vistos</h3>
                    </article>

                    <article class="art-curso">


                        <?php

                            $sql = "SELECT * FROM curso ORDER By vistas DESC";
                            $res = sentencia($sql);

                            for($i=0;$i<3;$i++){
                                $row = $res->fetch_assoc();

                                echo '  
                                    <section class="sect-curso-mas-visto" onclick="redirectCursomasVisto'.$i.'()">
                                        <section class="sect-img-mas-visto">
                                            <img src="img/placeholder.png" alt="img curso" class="img-mas-visto">
                                        </section>
                                        <section class="sect-p-mas-visto">
                                            <p class="p-mas-visto contenido">' . $row['nombre'] . '</p>
                                        </section>
                                    </section>

                                    
                                    <form action="curso/informacion_curso.php" method="get" id="form_curso-mas-visto-'.$i.'">
                                        <input type="hidden" name="id" value="'. $row['id'] .'">
                                    </form>
                                ';
                            }

                        ?>

                    </article>

                    <article class="art-puntitos"></article>
                </section>

            </section>

            <!-- Seccion 2 -->
            <section class="sect-2">

                    <!-- Cuadrito Curso (3) -->
                    <?php
                    //Cursos de categoria aleatoria
                    echo '<section class="curso">
                        <section class="sect-nombre-curso">
                            <h2 class="h2-nombre-curso subtitulo">Categoria</h2>
                        </section>';

                            $sql = "SELECT * FROM curso WHERE categoria = 'Categoria'";
                            $res = sentencia($sql);

                            for($i=0;$i<3;$i++){
                                $row = $res->fetch_assoc();
                            
                                echo '
                                    <section class="sect-curso" onclick="redirectCurso'.$i.'()">
                                        <section class="sect-curso-img">
                                            <img src="img/placeholder.png" alt="imagen curso" class="img-curso-1">
                                        </section>
                                        <section class="sect-curso-nombre">
                                            <h2 class="h2-curso-nombre subtitulo">' . $row['nombre'] .'</h2>
                                        </section>
                                        <section class="sect-curso-descripcion">
                                            <p class="p-descripcion contenido">' . $row['descripcion'] .'</p>
                                        </section>
                                        <section class="sect-curso-duracion">
                                            <p class="p-duracion contenido">Duración: ' . $row['duracion'] .'</p>
                                        </section>
                                    </section> 

                                    <form action="curso/informacion_curso.php" method="get" id="form_curso-'.$i.'">
                                        <input type="hidden" name="id" value="'. $row['id'] .'">
                                    </form>
                                ';
                            
                            }
                    

                    ?>
                    
                    
                    


                </section>
            </section>

            <!-- Seccion 3 -->
            <section class="sect-3">

                <!-- Categorias -->
                <section class="sect-categorias">
                    <h2 class="h2-categorias subtitulo">Categorias</h2>
                </section>
                <section class="sect-cate-cuadritos">

                <?php
                        $categoria = "categoria";

                        echo '
                        <article class="art-cuadrito" onclick="clickCategoria(form_'.$categoria.')">
                            <section class="sect-img-curso">
                                <img src="img/icono.png" alt="imagen curso" class="img-curso">
                            </section>
                            <section class="sect-lab-curso">
                                <label class="lab-nombre-curso contenido">$nombre curso</label>
                            </section>
                        </article>


                        <form action="/curso/categoria/categoria.php" method="get" id="form_'.$categoria.'">
                            <input type="hidden" name="categoria" value="'.$categoria.'">
                        </form>
                        ';

                ?>

                


                </section>       
            </section>

        </main>

        <!-- Anuncio -->
        <aside>
            <section class="anuncio sombra-izq">
                <section class="anuncio-1">
                    <h1 class="h1-anuncio">¿Cansado de los anuncios?</h1>
                </section>
                <section class="anuncio-2">
                    <p class="p-anuncio subtitulo">Prueba premium y obten</p>
                    <p class="p-anuncio subtitulo">recompensas exclusivas</p>
                </section>
                <section class="anuncio-3">
                    <button class="btn-anuncio sombra-izq contenido">Conoce más</button>
                    <button class="btn-anuncio sombra-der contenido">Probar premium</button>
                </section>
            </section>
        </aside>

        <!-- Footer -->
        <footer>


            <section class="sect-footer">
                <section class="sect-text-footer">
                    <a href="" class="a-footer">Asistencia</a>
                </section>

                <section class="sect-text-footer">
                    <a href="" class="a-footer">Politicas de privacidad</a>
                </section>

                <section class="sect-text-footer">
                    <a href="" class="a-footer">Contacto</a>
                </section>

                <section class="sect-text-footer">
                    <a href="" class="a-footer">Premium</a>
                </section>
            </section>


            <hr class="hr-footer">


            <section class="sect-footer-2">
                <p class="p-footer">© 2022 Cursea. Todos los derechos reservados</p>
            </section>


        </footer>

        <!-- Menu Lateral -->
        <input type="checkbox"  id="btn-menu" class="hide">
        <div class="container-menu">
            <div class="cont-menu">
                <nav>

                    <!-- Slot del menu lateral -->
                    <section class="sect-nav margen-top" onclick="window.location.href = '';">
                        <section class="sect-nav-icon">
                            <img src="img/icono.png" alt="img" class="sect-nav-img">
                        </section>
                        <section class="sect-nav-text">
                            <p class="nav-p">Hola Mundo</p>
                        </section>
                    </section>
                    <!-- ------------------------ -->

                </nav>
                <label for="btn-menu" class="equis">X</label>
            </div>
        </div>
    </body>
    <script src="index.js"></script>
</html>