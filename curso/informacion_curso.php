<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Prompt:wght@600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../general/navbar.css">
        <link rel="stylesheet" href="../general/footer.css">
        <link rel="shortcut icon" href="/img/icon.png" type="image/png">
        <?php
            require_once("../DB/crud.php");

            session_start();

            $id = $_GET['id'];

            //-------- DB ---------
            $sql = "SELECT * FROM curso WHERE id=$id";
            $res = sentencia($sql);
            $row = $res->fetch_assoc();

            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $duracion = $row['duracion'];
            $categoria= $row['categoria'];
            $tipo_curso = $row['tipo_curso'];
            $vistas = $row['vistas'];
            $fecha_subida = $row['fecha_subida'];
            $ultima_mod = $row['ultima_modificacion'];
            $vistas_mas1 = $vistas+1;

            $sql = "UPDATE curso SET vistas = '$vistas_mas1' WHERE id=$id;";
            sentencia($sql);


            echo "<title>Cursea - $nombre</title>";
            if((!isset($_SESSION['tema'])) || ($_SESSION['tema'] == 'claro')){
                echo '<link rel="stylesheet" href="informacion_curso.css">';      
            }else{
                echo '<link rel="stylesheet" href="informacion_curso_osc.css">';
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


            <!-- Main -->
            <main>
                <article class="art-info">
                    <section class="sect-info">
                        <p class="p-tipo contenido"><span class="nigga">Tipo de Curso:</span> <?php echo ucfirst($tipo_curso) ?></p>
                        <h1 class="h1-nombre subtitulo"><?php echo $nombre ?></h1>
                        <a href="/curso/categoria/categoria.php?categoria=<?php echo $categoria ?>" class="a-categoria subtitulo"><?php echo $categoria ?></a>
                        <p class="p-descripcion contenido"><?php echo $descripcion ?></p>
                    </section>
                    <section class="sect-img">
                        <img src="/curso/img-curso.php?id=<?php echo$id ?>" alt="Imagen" class="img">
                        <h3 class="h3-nose subtitulo">Subido el: <span class="span"><?php echo $fecha_subida ?></span></h3>
                        <?php
                        if($ultima_mod){
                            echo'<h3 class="h3-nose subtitulo">Ultima Modificación: <span class="span">'.$ultima_mod.'</span></h3>';
                        }
                        ?>
                    </section>
                </article>
            </main>
            <article class="art-temas">
                    <section class="sect-temas">
                        <section class="sect-contenido-p">
                            <h3 class="h3-contenido subtitulo">Contenido</h3>
                        </section>


                        <section class="sect-contenido-padre">

                    <?php
                            $sql = "SELECT * FROM $tipo_curso WHERE id_curso=$id ORDER BY numero";
                            $res= sentencia($sql);
                            $i = 0;

                            while($row = $res->fetch_assoc()){
                                if($row['numero'] == 1){
                                    $primero = $row['id'];
                                }
                                echo '
                                    <section class="sect-contenido" onclick="iniciar('.$row['id'].')">
                                        <img src="/img/curso/'.strtoupper($tipo_curso).'.png" alt="V" class="img-contenido">
                                        <h4 class="h4-info-curso subtitulo">'.($i+1).'. ' . $row['nombre'] . '</h4>
                                    </section>

                                    <form action="'.$tipo_curso.'.php" method="get" id="form_curso_'.$row['id'].'">
                                        <input type="hidden" name="id" value="'.$row['id'].'">
                                    </form>
                                ';

                                $i++;
                            }
                            for($i=0;$i<12;$i++)
                            
                    ?>

                        </section>


                    <section class="sect-blanco"></section>
            </article>


            <article class="art-duracion">
                
            </article>

            <section class="sect-fixed">
                <section class="sect-h2">
                        <h2 class="h2-duracion subtitulo"><b>Duración:</b> <?php echo $duracion ?></h2>
                </section>
                <section class="sect-btns">
                    <?php
                        if(isset($_SESSION['id'])){
                            $usuario = $_SESSION['id'];
                            $sql = "SELECT * FROM favoritos WHERE id_usuario='$usuario' AND id_curso='$id'";
                            $res = sentencia($sql);
                            $row = $res->fetch_assoc(); 
                        }
                        if(!isset($_SESSION['id'])){
                        }else if($res->num_rows > 0){ ?>
                        <button class="btn-fav-no btn" onclick="window.location.href='quitar-favoritos.php?curso=<?php echo $id ?>'"><img src="../img/ajustes/quitar-fav.png" alt="Favorito" class="img-fav"></button>
                    <?php   }else if($res->num_rows == 0){  ?>
                        <button class="btn-fav btn" onclick="window.location.href='agregar-favoritos.php?curso=<?php echo $id ?>'"><img src="../img/curso/fav.png" alt="Favorito" class="img-fav"></button>
                    <?php }
                    ?>
                    <button class="btn-start btn subtitulo" onclick="window.location.href = 'empezar_curso.php?curso=<?php echo $id ?>&video=<?php echo $primero ?>';"><img src="../img/curso/start.png" alt="Comenzar" class="img-start">Comenzar Curso</button>    
                </section>
            </section>

            <section class="vacio"></section>

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

        <script src="informacion_curso.js"></script>
    </body>
</html>