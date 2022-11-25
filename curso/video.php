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
        <link rel="shortcut icon" href="/img/icon.png" type="image/png">
        <script src="video.js"></script>

        <?php
            require_once("../DB/crud.php");
            session_start();
            
            if((!isset($_SESSION['tema'])) || ($_SESSION['tema'] == "claro")){
                echo '<link rel="stylesheet" href="video.css">';
            }else if($_SESSION['tema'] == "oscuro"){
                echo '<link rel="stylesheet" href="video_osc.css">';
            }

            $id = $_GET['id'];
            $sql = "SELECT * FROM video WHERE id=$id";

            $res = sentencia($sql);
            $row = $res->fetch_assoc();

            $nombre = $row['nombre'];
            $id_curso = $row['id_curso'];
            $numero = $row['numero'];
            $recurso = $row['recurso'];


            $sql = "SELECT * FROM curso WHERE id=$id_curso";
            $res = sentencia($sql);

            $row = $res->fetch_assoc();
            $nombre_curso = $row['nombre'];

            $cant_cursos = 0;


            echo '<title>Cursea - '.$nombre.'</title>';
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


                if(isset($_SESSION['id'])){
                    $id_user = $_SESSION['id'];

                    $sql = "SELECT * FROM status_video WHERE id_usuario = '$id_user' AND id_video = '$id';";
                    $r = sentencia($sql);

                    if($r->num_rows == 0){
                        $insert = "INSERT INTO status_video(id_usuario, id_video, status) values ('$id_user' ,'$id' , true)";

                        sentencia($insert);
                    }else{                        
                        $upd = "UPDATE status_video SET status = true WHERE id_usuario = '$id_user' AND id_video = $id";
                        sentencia($upd);
                    }
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

        <nav class="nav-curso">
            <?php
                $sql = "SELECT * FROM video WHERE id_curso='$id_curso';";
                $res = sentencia($sql);

                while($row = $res->fetch_assoc()){

                    if($row['id'] == $id){
                        echo'
                                <section class="sect-videos this">
                                    <img class="img-icono-video" src="/img/video/video_claro.png">
                                    <section class="sect-cont-video">
                                        <h4 class="h4-numero contenido">Video '.$row['numero'].'</h4>
                                        <p class="p-nombre contenido">'.$row['nombre'].'</p>
                                    </section>
                                    <section class="sect-status-this">
                                        <img class="img-status" src="/img/video/ojo.png">
                                    </section>
                                </section>
                        ';
                    }else{
                        $source = "/img/video/void.png";
                        if(isset($_SESSION['id'])){
                            $this_id= $row['id'];
                            $id_user = $_SESSION['id'];

                            $consulta = "SELECT status FROM status_video where id_video = '$this_id' AND id_usuario='$id_user'";
                            $r = sentencia($consulta);
                            if($r->num_rows > 0){
                                $row3 = $r->fetch_assoc();
                                if($row3['status']){
                                    $source = "/img/video/visto.png";
                                }
                            }
                        }
                        
                        echo'
                                <section class="sect-videos">
                                    <img class="img-icono-video" src="/img/video/video_claro.png" onclick="redirecccion('.$row['id'].')">
                                    <section class="sect-cont-video" onclick="redirecccion('.$row['id'].')">
                                        <h4 class="h4-numero contenido">Video '.$row['numero'].'</h4>
                                        <p class="p-nombre contenido">'.$row['nombre'].'</p>
                                    </section>
                        ';

                        if(!isset($_SESSION['logged'])){
                            echo '<button class="btn-status hiden">';
                        }else{
                            ?>
                            <button class="btn-status" onclick="window.location.href = 'status_false.php?video=<?php echo$row['id'] ?>&this=<?php echo$id ?>'">
                        <?php
                        }

                        echo'
                                        <img class="img-status" src="'.$source.'">
                                    </button>
                                </section>
                        ';
                    }

                    $cant_cursos++;
                }
            ?>
        </nav>      

            <article class="art-video">
                <section class="vidio" id="videooooo">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $recurso ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </section>
            </article>

            <article class="art-nom">
                <h3 class="h3-video titulo"><?php echo $nombre ?></h3>
                <a href="/curso/informacion_curso.php?id=<?php echo$id_curso ?>" class="a-curso contenido"><?php echo $nombre_curso ?></a>
            </article>

            <article class="art-btn">
                <?php

                    $sql = "SELECT * FROM video WHERE id_curso='$id_curso'";
                    $res = sentencia($sql);
                    while($row = $res->fetch_assoc()){
                        if($row['numero'] == ($numero-1)){
                            $ant = $row['id'];
                        }

                        if($row['numero'] == ($numero+1)){
                            $sig = $row['id'];
                        }

                    }
                    if($numero>1){
                        echo '<a class="a-btn" href="video.php?id='.$ant.'"><button class="btn contenido">Anterior</button></a>';
                    }

                    if($numero < $cant_cursos){
                        echo '<a class="a-btn" href="video.php?id='.$sig.'"><button class="btn contenido">Siguiente</button></a>';
                    }
                ?>
                
            </article>

            <section class="sect-reseñas">
                <section class="sect-res-tit">
                    <h2 class="h2-reseñas subtitulo">Comentarios</h2>
                </section>

                <section class="sect-esc-res">
                    <form action="comentario.php" method="post">
                        <input type="hidden" name="id_video" value="<?php echo$id ?>">
                        <input onkeyup="funcion()" name="comentario" type="text" class="input-txt contenido" id="comentario" placeholder="  Escribe tu comenario" required>
                        <p id="p-comentario" class="p-cont contenido">999</p>
                        <input type="submit" value="Publicar" class="input-submit contenido">
                    </form>
                </section>
                
                <?php
                    $sql = "SELECT * FROM comentario WHERE id_video='$id'";
                    $band = false;

                    $res =  sentencia($sql);
                    while($row = $res->fetch_assoc()){
                        $band = true;
                        $id_usuario = $row['id_usuario'];
                        $sql_2 = "SELECT * FROM usuario WHERE id='$id_usuario'";
                        
                        $res_2 = sentencia($sql_2);
                        $row_2 = $res_2->fetch_assoc();
                        $nombre_usuario = $row_2['nombre'];

                        if($row['editado']){
                            $fecha_edicion = $row['fecha_edicion'];
                            $editado = " (Editado el $fecha_edicion)";
                        }else{
                            $editado = "";
                        }

                        if(isset($_SESSION['id']) && ($_SESSION['id']==$id_usuario)){

                            echo '
                                <section class="sect-rese">
                                    <section class="sect-info-usuario">
                                        <img src="foto-usuario.php?id='.$id_usuario.'" alt="img de usuario" class="img-usuario-comm">
                                        <h4 class="h4-nombre subtitulo">'.$nombre_usuario.'<span class="span-subido"> · '.$row['fecha'].$editado.'</span></h4>
                                    </section>

                                    <section class="sect-editar">
                                        <img src="/img/comentarios/editar.png" class="img-iconito">
                            ';
                        ?>
                                        <label for="cb" onclick="editarComentario(<?php echo $row['id'] ?>, '<?php echo $row['comentario'] ?>')"><p class="a-editar contenido">Editar</p></label>
                         
                        <?php
                            echo '
                                        <img src="/img/comentarios/borrar.png" class="img-iconito">
                            ';
                        ?>
                                        <label for="cb2" onclick="borrar(<?php echo $row['id'] ?>, '<?php echo $row['comentario'] ?>')"><p class="a-editar contenido">Eliminar</p></label>                                         
                    <?php
                            echo '                                    
                                </section>
                                    <section class="sect-comentario">
                                        <p class="p-comm contenido">'.$row['comentario'].'</p>
                                    </section>
                                </section>
                            ';
                        }else{
                            echo '
                                <section class="sect-rese">
                                    <section class="sect-info-usuario">
                                        <img src="foto-usuario.php?id='.$id_usuario.'" alt="img de usuario" class="img-usuario-comm">
                                        <h4 class="h4-nombre subtitulo">'.$nombre_usuario.'<span class="span-subido"> · '.$row['fecha'].$editado.'</span></h4>
                                    </section>

                                    <section class="sect-comentario">
                                        <p class="p-comm contenido">'.$row['comentario'].'</p>
                                    </section>
                                </section>
                            ';
                        }
                    }
                
                    if(!$band){
                        echo '<p class="p-no-comments contenido">Este video no tiene comentarios</p><br>';
                    }
                ?>
            </section>
            <section class="vacio"></section>
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

        <input type="checkbox" id="cb" class="hide">
        <div class="art-editar-comentario">
            <section class="sect-editar-comentario">
                <h3 id="h3-camb" class="h3-cambiar-comentario subtitulo">Cambiar comentario (999)</h3>
                <textarea class="ta contenido" id="text_area" onkeypress="funcion2()" onkeyup="funcion2()" placeholder="Comentario"></textarea>

                <section class="sect-cambiar-btns">
                    <button class="btn-cambiar" onclick="editarComentarioPost()">Cambiar Comentario</button>
                    <button class="btn-cambiar" onclick="cbHidden()">Cancelar</button>
                </section>
            </section>
        </div>

        <input type="checkbox" id="cb2" class="hide">
        <div class="art-eliminar-comentario">
            <section class="sect-eliminar-comentario">
                <h3 id="h3-camb" class="h3-eliminar-comentario subtitulo">¿Seguro que quieres eliminar este comentario?</h3>
                <p class="p-comm-elim contenido" id="p-comm"></p>

                <section class="sect-eliminar-btns">
                    <button class="btn-eliminar" onclick="eliminarPost()">Eliminar Comentario</button>
                    <button class="btn-eliminar" onclick="cb2Hidden()">Cancelar</button>
                </section>
            </section>
        </div>

    <form action="cambiar_comentario.php" method="post" id="formulario_uwu">
        <input type="hidden" name="id_video" value="<?php echo$_GET['id']?>">
        <input type="hidden" id="id-comentario" name="id_comentario">
        <input type="hidden" id="com" name="comentario">
    </form>

    <form action="borrar_comentario.php" method="post" id="formulario_unu">
        <input type="hidden" name="id_video" value="<?php echo$_GET['id']?>">
        <input type="hidden" id="id-comentario2" name="id_comentario">
    </form>

    </body>
    <script src="video.js"></script>
</html>