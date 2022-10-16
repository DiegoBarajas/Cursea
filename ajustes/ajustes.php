<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../general/navbar.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Prompt:wght@600&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="../img/icono.png" type="image/x-icon">
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
                    <img src="../img/ham-menu.png" alt="menu" class="img-navbar-ham">
                </label>
            </nav>
            <!-- Logo -->
            <section class="sec-logo">
                <img src="../img/cursea-logo-blanco.png" alt="Logo" class="img-logo">
            </section>
            <!-- Espacio en blanco -->
            <section class="sect-spa1"></section>
            <!-- Menu Principal -->
            <nav class="nav-home" onclick="window.location.href= '../index.php'">
                <img src="../img/home-menu.png" alt="home" class="img-navbar-home">
            </nav>
            <!-- Buscar -->
            <nav class="nav-search">
                <img src="../img/search-menu.png" alt="search" class="img-navbar-search">
            </nav>
            <!-- Usuario -->

            <?php
                    if((!isset($_SESSION['logged']) || ($_SESSION['logged'] == "no"))){
                        echo '
                            <nav class="nav-user">
                                <a href="../login/login.php" class="nav-user">
                                    <img src="../img/user-menu.png" alt="user" class="img-navbar-user img-here">
                                </a>
                            </nav>
                        ';
                    }else{
                        echo '
                            <nav class="nav-user">
                                <a href="ajustes.php" class="nav-user">
                                    <img src="/general/imagen_usuario.php" alt="user" class="img-navbar-user">
                                </a>
                            </nav>
                        ';
                    }
            ?>

            
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

                <article class="art-datos">
                    <section class="sect-icono">
                        <img src="../img/ajustes/pago_info.png" alt="Pago" class="img-icono">
                    </section>
                    <section class="sect-datos">
                        <h3 class="h3-nombre-dato subtitulo">Datos de pago</h3>
                        <p class="p-desc-dato contenido">Número de tarjeta, cancelación de pago...</p>
                    </section>
                    <section class="sect-flecha">  
                        <img src="../img/ajustes/flecha.png" alt="Flecha" class="img-flecha">
                    </section>
                </article>

                <article class="art-datos">
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

                <article class="art-datos">
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

                <article class="art-datos">
                    <section class="sect-icono">
                        <img src="../img/ajustes/otro.png" alt="Otro" class="img-icono">
                    </section>
                    <section class="sect-datos">
                        <h3 class="h3-nombre-dato subtitulo">Otros</h3>
                        <p class="p-desc-dato contenido">Otros ajustes...</p>
                    </section>
                    <section class="sect-flecha">  
                        <img src="../img/ajustes/flecha.png" alt="Flecha" class="img-flecha">
                    </section>
                </article>
            </article>
        </main>

        <!-- Menu Lateral -->
        <input type="checkbox"  id="btn-menu" class="hide">
        <div class="container-menu">
            <div class="cont-menu">
                <nav>

                    <!-- Slot del menu lateral -->
                    <section class="sect-nav margen-top" onclick="window.location.href = '';">
                        <section class="sect-nav-icon">
                            <img src="../img/icono.png" alt="img" class="sect-nav-img">
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
</html>