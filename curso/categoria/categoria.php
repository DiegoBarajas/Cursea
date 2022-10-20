<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
        <link rel="stylesheet" href="categoria.css">
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

            $categoria = $_GET['categoria'];

           echo '<title>Cursea - '.$categoria.'</title>';

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
            <nav class="nav-home" onclick="window.location.href='/index.php'">
                <img src="/img/home-menu.png" alt="home" class="img-navbar-home">
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
            ?>
        </header>
<!------------------------ MAIN ------------------------------------------------------------------------------------------------>
        <main class="main-maq-centro">
            <article class="article-nombre-curso">
                <h2 class="h2-categoria"><?php echo strtoupper($categoria) ?></h2>
            </article> 
            <section class="section-maq-vacio">

            <?php
                require_once("../../DB/crud.php");

                $sql = "SELECT * FROM curso WHERE categoria=$categoria";
                $res = sentencia($sql);

                while($row=$res->fetch_assoc()){
                    echo '
                    <section class="section-maq-info" onclick="">
                        <div class="div-maque-vacio"></div>
                        <img src="/img/placeholder.png" class="img-video">
                        <section class="sect-texto-curso">
                            <p class="p-titulo-curso">'.$row['nombre'].'</p>
                            <p class="p-descripcion-video">'.$row['descripcion'].'</p>
                        </section>
                    </section>';
                }

                    
            ?>


            </section>
        </main>
        
<!------------------------ FOOTER------------------------------------------------------------------------------------------->
        <footer>
            <section class="sect-footer"></section>
            <hr class="hr-footer">
            <section class="sect-footer"></section>
        </footer>
    </body>
</html>