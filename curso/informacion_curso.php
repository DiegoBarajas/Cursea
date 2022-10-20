<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Prompt:wght@600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../general/navbar.css">
        <link rel="shortcut icon" href="../img/icono.png" type="image/x-icon">
        <?php
            require_once("../DB/crud.php");

            session_start();

            if((!isset($_SESSION['logged']) || $_SESSION['logged']=='no')){
                header("Location: ../index.php");
            }else{
                if(!isset($_GET['id'])){
                    header("Location: ../index.php");
                }    
            }

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


            <!-- Main -->
            <main>
                <article class="art-info">
                    <section class="sect-info">
                        <section class="sect-tipo">
                            <p class="p-tipo contenido"><?php echo strtoupper($tipo_curso) ?></p>
                        </section>
                        <section class="sect-nombre">
                            <h1 class="h1-nombre titulo"><?php echo $nombre ?></h1>
                        </section>
                        <section class="sect-categoria">
                            <a href="#" class="a-categoria contenido"><?php echo $categoria ?></a>
                        </section>
                        <section class="sect-desc">
                            <p class="p-descripcion contenido"><b>Descripcion:</b> <?php echo $descripcion ?></p>
                        </section>
                    </section>
                    <section class="sect-img">
                            <img src="../img/placeholder.png" alt="Imagen" class="img">
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
                                echo '
                                    <section class="sect-contenido" onclick="iniciar('.$row['id'].')">
                                        <img src="../img/curso/'.$tipo_curso.'.png" alt="V" class="img-contenido">
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
                <section class="sect-duracion">
                    <h2 class="h2-duracion subtitulo"><b>Duración:</b> <?php echo $duracion ?></h2>
                </section>
                <section class="sect-btns">
                    <button class="btn-fav btn"><img src="../img/curso/fav.png" alt="Favorito" class="img-fav"></button>
                    <button class="btn-start btn subtitulo"><img src="../img/curso/start.png" alt="Comenzar" class="img-start">Comenzar Curso</button>
                </section>
            </article>
            <script src="informacion_curso.js"></script>
    </body>
</html>