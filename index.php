<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="google-site-verification" content="930DinnjfSR-x7sFB6GU3rd6qf1Fds-GSjQAOP1s8jk" >
        <link rel="stylesheet" href="/general/navbar.css">
        <link rel="stylesheet" href="/general/footer.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Prompt:wght@600&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="/img/icon.png" type="image/png">
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


                    require_once("DB/crud.php");
            ?>

            <!-- Buscar -->
            <nav class="nav-search" onclick="window.location.href='/busqueda/busqueda.php'">
                <img src="/img/search-menu.png" alt="search" class="img-navbar-search">
            </nav>
            
            <!-- Menu Principal -->
            <nav class="nav-home" onclick="window.location.href='/index.php'">
                <img src="/img/home-menu.png" alt="home" class="img-navbar-home img-here">
            </nav>
            
        </header>


        <!-- Contenido -->
        <main>
            <!-- Seccion 1 -->
            <section class="sect-1">
                <!-- Mensaje bienvenida -->
                <section class="sect-bienvenida">

                <?php
                    if( (isset($_SESSION['logged'])) && ($_SESSION['logged'] == "si") ){
                        $nombre = $_SESSION['nombre'];
                        $n = explode(" ", $nombre);
                        echo '<h1 class="h1-bienvenida titulo">Hola ' . $n[0] . '!</h1>';
                    }else{
                        $msg = ["Hola :)", "Bienvenido", "¿Que tal?", "Hola Mundo", "Ola k ase", "Ola", "Que tranza?", "¿Que rollo con el pollo?"];
                        $r = rand(0, count($msg)-1);

                        echo '<h1 class="h1-bienvenida titulo">'.$msg[$r].'</h1>';
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
                                            <img src="/curso/img-curso.php?id=' . $row['id'] . '" alt="img curso" class="img-mas-visto">
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
                    $cate = ["Informática", "Diseño", "Fotografía"];
                    $index = rand(0, 2);

                    echo '<section class="curso">
                        <section class="sect-nombre-curso">
                            <h2 class="h2-nombre-curso subtitulo">'.$cate[$index].'</h2>
                        </section>';

                        if(rand(0,1)==0){
                            $sql = "SELECT * FROM curso WHERE categoria = '$cate[$index]'";
                        }else{
                            $sql = "SELECT * FROM curso WHERE categoria = '$cate[$index]' ORDER BY id DESC;";

                        }
                            $res = sentencia($sql);

                            for($i=0;$i<3;$i++){
                                $row = $res->fetch_assoc();
                            
                                echo '
                                    <section class="sect-curso" onclick="redirectCurso'.$i.'()">
                                        <section class="sect-curso-img">
                                            <img src="/curso/img-curso.php?id=' . $row['id'] . '" alt="imagen curso" class="img-curso-1">
                                        </section>

                                        <section class="sect-curso-contenido">
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
                        $categoria = ["Fotografía", "Diseño", "Informática", "Matemáticas", "Idiomas"];
                        $foto = ["fotografia", "diseño", "informatica", "matematicas", "idioma"];

                        for($i=0; $i<5; $i++){
                            echo '
                            <article class="art-cuadrito" onclick="clickCategoria(form_'.$categoria[$i].')">
                                <section class="sect-img-curso">
                                    <img src="/img/categoria/'.$foto[$i].'.png" alt="imagen curso" class="img-curso">
                                </section>
                                <section class="sect-lab-curso">
                                    <label class="lab-nombre-curso subtitulo">'.$categoria[$i].'</label>
                                </section>
                            </article>


                            <form action="/curso/categoria/categoria.php" method="get" id="form_'.$categoria[$i].'">
                                <input type="hidden" name="categoria" value="'.$categoria[$i].'">
                            </form>
                            ';
                        }

                ?>

                


                </section>       
            </section>

        </main>

        
        <footer>


            <section class="sect-footer">
                <a href="/footer/footer.php#asistencia" class="a-footer">Asistencia</a>
                <a href="/footer/footer.php#privacidad" class="a-footer">Politicas de privacidad</a>
                <a href="/footer/footer.php#contacto" class="a-footer">Contacto</a>
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
                            <img src="img/user-menu.png" alt="img" class="sect-nav-img">
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
    <script src="index.js"></script>
</html>