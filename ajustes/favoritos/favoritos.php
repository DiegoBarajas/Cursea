<!DOCTYPE html>

<html lang="es">

    <head>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">

        <link rel="stylesheet" href="favoritos.css">

        <link rel="stylesheet" href="/general/navbar.css">

        <link rel="stylesheet" href="/general/footer.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Prompt:wght@600&display=swap" rel="stylesheet">

        <link rel="shortcut icon" href="/img/icon.png" type="image/png">
        <?php

            session_start();

            if((!isset($_SESSION['tema'])) || ($_SESSION['tema'] == "claro")){

                echo '<link rel="stylesheet" href="favoritos.css">';

            }else if($_SESSION['tema'] == "oscuro"){

                echo '<link rel="stylesheet" href="favoritos_osc.css">';

            }



           echo '<title>Cursea - Mis Favoritos</title>';



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

                        header("Location: /login/login.php");

                    }else{

                        $id = $_SESSION['id'];

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

<!------------------------ MAIN ------------------------------------------------------------------------------------------------>

        <main class="main-maq-centro">

            <article class="article-nombre-curso">

                <h2 class="h2-categoria titulo">Mis Favoritos</h2>

                <img src="/img/ajustes/fav.png" class="img-cate">

            </article> 

            <section class="section-maq-vacio">



            <?php

                require_once("../../DB/crud.php");



                $sql = "SELECT * FROM favoritos WHERE id_usuario='$id';";

                $res = sentencia($sql);



                if($res->num_rows==0){

                    echo "<h1 class='h1-noporolo titulo'>No hay ningun curso marcado como 'Favorito'";

                }



                while($r=$res->fetch_assoc()){

                    $curso = $r['id_curso'];

                    $consulta = "SELECT * FROM curso WHERE id='$curso'";    



                    $con = sentencia($consulta);

                    $row = $con->fetch_assoc();



                    echo '

                    <section class="row">

                        <section class="section-maq-info" onclick="window.location.href=\'/curso/informacion_curso.php?id='.$row['id'].'\'">

                            <div class="div-maque-vacio"></div>

                            <img src="/curso/img-curso.php?id=' . $row['id'] . '" class="img-video">

                            <section class="sect-texto-curso">

                                <p class="p-titulo-curso subtitulo">'.$row['nombre'].'</p>

                                <p class="p-descripcion-video contenido">'.$row['descripcion'].'</p>

                            </section>

                        </section>



                        <section class="sect-quitar-fav" onclick="redireccion(' . $r['id'] . ')">

                            <img src="/img/ajustes/quitar-fav.png" class="img-quitar">

                            <p class="a-quitar contenido">Quitar de favoritos</p>

                        </section>

                    </section>

                    ';

                    

                }



                    

            ?>





            </section>

        </main>

        

<!------------------------ FOOTER------------------------------------------------------------------------------------------->

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

    <script src="favoritos.js"></script>

    </body>

</html>