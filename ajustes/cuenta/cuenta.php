<!DOCTYPE html>
<html lang="es">
    <!--    Iniciar sessions    -->
    <?php 
        session_start();
        if((!isset($_SESSION['logged'])) || ($_SESSION['logged'] == "no")){
            header('Location: ' . "../login.html");
        }

        // - - - Base de datos - - - //
        //Variables
        $server = "localhost";
        $username = "root";
        $pass = "";
        $database = "cursea";


        //Conexión
        $conn = new mysqli($server, $username, $pass, $database);

        if($conn->connect_errno){
            die ("Conexión fallida: " . $conn->connect_error);
        }

        //Sentencia SQL
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM usuario WHERE id=$id";
        $result = $conn->query($sql);

        //Recorrido DB
        $row = $result->fetch_assoc();

        //Variables 
        $nombre = $row['nombre'];
        $email = $row['email'];
        $password = $row['contraseña'];
        $foto = $row['foto'];
        $tema = $_SESSION['tema'];
        
        //Cerrar conexión
        $conn->close(); 
    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../general/navbar.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Prompt:wght@600&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="../../img/icono.png" type="image/x-icon">

        <?php
            if($tema == 'oscuro')
                echo '<link rel="stylesheet" href="cuenta_osc.css">';
            else if($tema == 'claro')
                echo '<link rel="stylesheet" href="cuenta.css">';
        ?>

        <title>Cursea - Ajustes</title>
        <script src="cuenta.js"></script>
    </head>

    <body>
        <!-- NAV-BAR -->
        <header>
            <!-- Menu Hamburguesa -->
            <nav class="nav-ham">
                <label for="btn-menu" class="lab-ham">
                    <img src="../../img/ham-menu.png" alt="menu" class="img-navbar-ham">
                </label>
            </nav>
            <!-- Logo -->
            <section class="sec-logo">
                <img src="../../img/cursea-logo-blanco.png" alt="Logo" class="img-logo">
            </section>
            <!-- Espacio en blanco -->
            <section class="sect-spa1"></section>
            <!-- Menu Principal -->
            <nav class="nav-home" onclick="window.location.href ='../../index.php';">
                <img src="../../img/home-menu.png" alt="home" class="img-navbar-home">
            </nav>
            <!-- Buscar -->
            <nav class="nav-search">
                <img src="../../img/search-menu.png" alt="search" class="img-navbar-search">
            </nav>
            <!-- Usuario -->

            <?php
                    if((!isset($_SESSION['logged']) || ($_SESSION['logged'] == "no"))){
                        echo '
                            <nav class="nav-user">
                                <a href="../../login.php" class="nav-user">
                                    <img src="../../img/user-menu.png" alt="user" class="img-navbar-user">
                                </a>
                            </nav>
                        ';
                    }else{
                        echo '
                            <nav class="nav-user">
                                <a href="../ajustes.php" class="nav-user">
                                    <img src="/general/imagen_usuario.php" alt="user" class="img-navbar-user">
                                </a>
                            </nav>
                        ';
                    }
            ?>

            
        </header>
        

        <!-- Contenido -->
        <main>
            <section class="sect-titulo">
                <h1 class="h1-titulo titulo">Información de Cuenta</h1>
            </section>
            <section class="sect-blanco-1"></section>

            <section class="sect-contenido">
                <article class="art">
                    <label class="lab subtitulo"><b>Foto de perfil: </b></label>
                    <img src="/general/imagen_usuario.php" alt="Imagen de Usuario" class="img-perfil">
                    <button class="btn" onclick="window.location.href = 'cambiar_img/cambiar_img.php';">Cambiar Imagen</button>
                </article>
                <article class="art">
                    <lab class="lab subtitulo"><b>Nombre: </b></lab>
                    <?php echo '<label class="lab-cont contenido">'.$nombre.'</label>'; ?>
                    <button class="btn" onclick="window.location.href='';">Cambiar Nombre</button>
                </article>
                <article class="art">
                    <lab class="lab subtitulo"><b>Correo: </b></lab>
                    <?php echo '<label class="lab-cont contenido">'.$email.'</label>'; ?>
                    <button class="btn" onclick="window.location.href='';">Cambiar Correo</button>

                </article>
                <article class="art">
                    <lab class="lab subtitulo"><b>Contraseña: </b></lab>
                    <?php
                        $lenght= strlen($password);
                        $password_dec = "";
                        for( $i=0;$i<$lenght;$i++){
                            $password_dec .= "*";
                        }
                        echo '<label class="lab-cont contenido">' . $password_dec . '</label>'; 
                     ?>
                     <button class="btn" onclick="window.location.href='';">Cambiar Contraseña</button> 
                </article>
                <article class="art">
                    <lab class="lab subtitulo"><b>Tema: </b></lab>

                    <div class="switch-button">
                        <!-- Checkbox -->
                        <input type="checkbox" name="switch" id="switch-label" class="switch-button__checkbox">
                        <!-- Botón -->
                        <label for="switch-label" class="switch-button__label" onclick="switchBtn();"></label>
                    </div>
                    <?php 
                        if(strlen($tema)<6){
                            echo '<label class="lab-switch contenido"><pre> '.$tema.'  </pre></label>';
                        }else{
                            echo '<label class="lab-switch contenido">'.$tema.'</label>';
                        }
                    ?>

                    <form action="cambiar_tema.php" method="post" name="form-tema" id="form_tema">
                        <input type="hidden" name="tema" id="hidden">
                    </form>

                </article>
                <article class="art-logout">
                    <button onclick="window.location.href='logout.php';" class="btn logout">Cerrar Sesion</button>
                </article>
            </section>
            <section class="sect-blanco-2"></section>
        </main>

        <!--   Logica del checkbox   -->
        <script>
            var tema = <?= json_encode($tema) ?>;
            if(tema == 'oscuro'){
                document.getElementById('switch-label').checked = true;
            }
        </script>

        <!-- Menu Lateral -->
        <input type="checkbox"  id="btn-menu" class="hide">
        <div class="container-menu">
            <div class="cont-menu">
                <nav>

                    <!-- Slot del menu lateral -->
                    <section class="sect-nav margen-top" onclick="window.location.href = '';">
                        <section class="sect-nav-icon">
                            <img src="../../img/icono.png" alt="img" class="sect-nav-img">
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