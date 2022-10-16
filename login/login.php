<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" href="../img/icono.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Prompt:wght@600&display=swap" rel="stylesheet">
    <title>Cursea - Login</title>
</head>

<?php
    session_start();
    if((!isset($_SESSION['logged'])) || ($_SESSION['logged'] == "no")){
    }else{
        header('Location: ' . "../index.php");
    }
?>

<body>

        <main>
            <button class="btn-back subtitulo" onclick="window.location.href = '../index.php'">Volver</button>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion" onclick="clr()">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse" onclick="clr()">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <section class="formulario__login">
                        <form action="post_login.php" method="post" id="form-login" name="form_login">
                            <h2>Iniciar Sesión</h2>
                            <input type="text" placeholder="Correo Electrónico" name="login_correo_electronico" id="email-log">
                            <p class="Mensaje_de_ERROR contenido" id="error_login_email"></p>
                            <input type="password" placeholder="Contraseña" name="login_contrasena" id="pass-log">
                            <p class="Mensaje_de_ERROR contenido" id="error_login"></p>
                        </form>
                        <button onclick="login()" class="btn subtitulo">Iniciar Sesión</button>
                    </section>


                    <!--Register-->
                    <section class="formulario__register">
                        <form action="post_register.php" method="post" class="form-register" name="form_register" id="form-signin">
                            <h2>Regístrarse</h2>
                            <input type="text" placeholder="Nombre completo" name="Registro_nombre_completo" id="nombre-sign">
                            <p class="Mensaje_de_ERROR contenido"></p>
                            <input type="text" placeholder="Correo Electrónico" name="Registro_correo" id="email-sign">
                            <p class="Mensaje_de_ERROR contenido" id="error_signin_email"></p>
                            <input type="password" placeholder="Contrseña" name="Registro_contrasena" id="pass-sign">
                            <p class="Mensaje_de_ERROR contenido" id="error_signin_pass"></p>
                            <input type="password" placeholder="Confirme su Contraseña" name="Registro_confirmar_contrasena" id="con-pass-sign">
                            <p class="Mensaje_de_ERROR contenido " id="error_signin"></p>
                        </form>
                        <button onclick="signin()" class="btn subtitulo">Regístrarse</button>    
                    </section>
                </div>
            </div>
        </main>
        <script src="login.js"></script>
</body>
</html>