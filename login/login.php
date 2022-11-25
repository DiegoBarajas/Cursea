<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="login.css">

    <link rel="stylesheet" href="/general/navbar.css">
    <link rel="shortcut icon" href="/img/icon.png" type="image/png">
    
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

            <button class="btn-back subtitulo" onclick="javascript:history.back()">Regresar</button>



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

                            <input type="text" placeholder="Correo Electrónico" name="login_correo_electronico" id="email-log" onkeypress="tabular(event)">

                            <p class="Mensaje_de_ERROR contenido" id="error_login_email"></p>

                            <input type="password" placeholder="Contraseña" name="login_contrasena" id="pass-log" onkeypress="teclas(event)">

                            <p class="Mensaje_de_ERROR contenido" id="error_login"></p>

                        </form>

                        <button onclick="login()" class="btn subtitulo">Iniciar Sesión</button>
                        <p class="p-olvide" onclick="olvidePassword()">Olvide mi contraseña</p>
                    </section>


                    <!--Register-->

                    <section class="formulario__register">

                        <form action="post_register.php" method="post" class="form-register" name="form_register" id="form-signin">

                            <h2>Regístrarse</h2>

                            <input type="text" placeholder="Nombre completo" name="Registro_nombre_completo" id="nombre-sign" onkeypress="tabular1(event)">

                            <p class="Mensaje_de_ERROR contenido"></p>

                            <input type="text" placeholder="Correo Electrónico" name="Registro_correo" id="email-sign" onkeypress="tabular2(event)">

                            <p class="Mensaje_de_ERROR contenido" id="error_signin_email"></p>

                            <input type="password" placeholder="Contraseña" name="Registro_contrasena" id="pass-sign" onkeypress="tabular3(event)">

                            <p class="Mensaje_de_ERROR contenido" id="error_signin_pass"></p>

                            <input type="password" placeholder="Confirme su Contraseña" name="Registro_confirmar_contrasena" id="con-pass-sign" onkeypress="teclas2(event)">

                            <p class="Mensaje_de_ERROR contenido " id="error_signin"></p>

                        </form>

                        <button onclick="signin()" class="btn subtitulo">Regístrarse</button>    

                    </section>

                </div>

            </div>

        </main>

        <section class="ventanita" id="ventanita">
            <form action="recuperar_pass_mail.php" method="post" class="form-forget">
                <h1 class="h1-olvide subtitulo">Olvidé mi contraseña</h1>

                <section class="sect-olv">
                    <label class="contenido lab-olvide">Correo: </label>
                    <input class="input-text-olv" type="email" name="email" id="input-olvide" placeholder="Ingresa tu correo" required>
                    <input type="reset" class="reset" value="">
                </section>
                <input class="input-submit-olv" type="submit" value="Enviar">

            </form>
            <button onclick="olvidePasswordC()" class="cancel">Cancelar</button>
        </section>

        <script src="login.js"></script>

</body>

</html>