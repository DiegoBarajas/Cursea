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
        <?php

            require_once("../DB/crud.php");

            session_start();



            if((!isset($_SESSION['tema'])) || ($_SESSION['tema'] == "claro")){

                echo '<link rel="stylesheet" href="texto.css">';

            }else if($_SESSION['tema'] == "oscuro"){

                echo '<link rel="stylesheet" href="texto_osc.css">';

            }



                $id = $_GET['id'];



                $sql = "SELECT * FROM texto WHERE id='$id'";

                $res = sentencia($sql);

                $cont = $res->fetch_assoc();

        ?>



        <title>Cursea - <?php echo $cont['nombre'] ?></title>

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

                <h1 class="h1-titulo titulo"><?php echo $cont['numero'] .'.- ' . $cont['nombre'] ?></h1>

                <?php

                    $id_curso = $cont['id_curso'];

                    $consulta = "SELECT * FROM curso WHERE id='$id_curso'";

                    $r = sentencia($consulta);

                    $row = $r->fetch_array();

                    $nombre_curso = $row['nombre'];

                ?>

                <a class="a-curso subtitulo" href="informacion_curso.php?id=<?php echo $id_curso ?>"><?php echo $nombre_curso ?></a>

            </section>



            <?php

                if($cont['texto1']!=null){


                echo'
                    <section class="sect-texto">

                        <p class="p-texto contenido">'.$cont['texto1'].'</p>

                    </section>
                ';


                }

            ?>







            <?php

                if($cont['img1']!=null){

            ?>

                <img src="img-texto.php?num=1&id=<?php echo $id ?>">

            <?php

                }

            ?>







            <?php

                if($cont['texto2']!=null){

                echo'
                    <section class="sect-texto">

                        <p class="p-texto contenido">'.$cont['texto2'].'</p>

                    </section>
                ';


                }

            ?>







            <?php

                if($cont['img2']!=null){

            ?>

                <img src="img-texto.php?num=2&id=<?php echo $id ?>">

            <?php

                }

            ?>







            <?php

                if($cont['texto3']!=null){

                echo'
                    <section class="sect-texto">

                        <p class="p-texto contenido">'.$cont['texto3'].'</p>

                    </section>
                ';


                }

            ?>



            



            <?php

                if($cont['img3']!=null){

            ?>

                <img src="img-texto.php?num=3&id=<?php echo $id ?>">

            <?php

                }

            ?>









            <section class="sect-botones">

                <?php

                    if($cont['numero']>1){

                        $anterior = $cont['numero']-1;

                        $sql = "SELECT * FROM texto WHERE id_curso = '$id_curso' AND numero = '$anterior'";

                        $row = sentencia($sql)->fetch_assoc();

                        $ant = $row['id'];

                ?>

                    <button onclick="window.location.href = 'texto.php?id=<?php echo $ant ?>';" class="btn"><pre class="subtitulo">&lt;  <?php echo $row['numero'].'. '.$row['nombre'] ?>  </pre></button>

                <?php

                    }



                    $siguiente = $cont['numero']+1;

                    $sql = "SELECT * FROM texto WHERE id_curso = '$id_curso' AND numero = '$siguiente'";

                    $res = sentencia($sql);



                    if($res->num_rows > 0){

                        $row = $res->fetch_assoc();

                        $sig = $row['id'];

                ?>

                    <button onclick="window.location.href = 'texto.php?id=<?php echo $sig ?>';" class="btn"><pre class="subtitulo">  <?php echo $row['numero'].'. '.$row['nombre'] ?>  &gt;</pre></button>

                <?php

                    }

                ?>       

            </section>





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

    </body>

</html>