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

            $sql = "SELECT * FROM curso WHERE id=$id_curso";
            $res = sentencia($sql);

            $row = $res->fetch_assoc();
            $nombre_curso = $row['nombre'];


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
            <section class="sec-logo">
                <img src="/img/cursea-logo-blanco.png" alt="Logo" class="img-logo">
            </section>
            <!-- Espacio en blanco -->
            <section class="sect-spa1"></section>
            <!-- Menu Principal -->
            <nav class="nav-home" onclick="window.location.href = '../index.php';">
                <img src="/img/home-menu.png" alt="home" class="img-navbar-home">
            </nav>
            <!-- Buscar -->
            <nav class="nav-search">
                <img src="/img/search-menu.png" alt="search" class="img-navbar-search">
            </nav>
            <!-- Usuario -->
            <?php
                echo '
                    <nav class="nav-user">
                        <a href="/ajustes/ajustes.php" class="nav-user">
                            <img src="/general/imagen_usuario.php" alt="user" class="img-navbar-user">
                        </a>
                    </nav>
                ';
            ?>
        </header>

        <main>

            <nav class="nav-curso">
                <section class="sect-videos"></section>
            </nav>

            <article class="art-video">
                <video class="video" controls>
                    <source src="movie.mp4" type="video/mp4">
                    Tu navegador no soporta este video, favor de intentar con otro navegador.
                </video>
            </article>

            <article class="art-nom">
                <h3 class="h3-video titulo"><?php echo $nombre ?></h3>
                <a href="#" class="a-curso contenido"><?php echo $nombre_curso ?></a>
            </article>

            <article class="art-btn">
                <?php
                    if($numero>1){
                        echo '<button class="btn contenido">Anterior</button>';
                    }

                    echo '<button class="btn contenido">Siguiente</button>';
                ?>
                
            </article>

            <section class="sect-reseñas">
                <section class="sect-res-tit">
                    <h2 class="h2-reseñas subtitulo">Reseñas</h2>
                </section>

                <section class="sect-esc-res">
                    <form action="">
                        <input type="text" class="input-txt contenido" placeholder="  Escribe tu reseña" required>
                        <input type="submit" value="Publicar" class="input-submit contenido">
                    </form>
                </section>

                <section class="sect-rese"></section>
            </section>

            



        </main>

    </body>
</html>