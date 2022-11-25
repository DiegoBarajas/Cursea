<!DOCTYPE html>
<html>
    <head>
        <title>Cursea - Documentación</title>
        <link rel="stylesheet" href="footer.css">
        <link rel="stylesheet" href="/general/navbar.css">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Prompt:wght@600&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="/img/icon.png" type="image/png">
        <meta charset="UTF-8">
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


                    require_once("../DB/crud.php");
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

        <section id="arriba"></section>
        <section id="left"></section>
        <section id="right"></section>
        <article id="conta">
            <section id="logo">
                <img src="/img/cursea-logo-blanco.png">                
            </section> 
            <section id="conten">
                <section class="tit">
                    <h3>CONTACTO</h3>
                </section>
                <section class="cont">
                    <p  id="contacto" class="p-correo">
                        <b>Correo:</b> cursea.ga@gmail.com
                    </p>
                </section>
            </section>
            <section id="logo">

            </section>
        </article> <br><br>

        <article id="q-somos">
            <section class="tit">
                <h3>¿QUIÉNES SOMOS?</h3>
            </section>
            <section class="cont">
                <p>    
                    Somos una página web que proporciona cursos a nuestros usuarios, nuestros cursos nacen de la comunidad y los creadores de la página. 
                    Nosotros queremos ser una plataforma para el aprendizaje de alumnos a distancia, ofrecemos cursos en cursos y articulos con temas mas cortos para versiones más básicas de los cursos.
                </p>
            </section>
        </article> <br>
        <article id="aviso">
            <article class="av-priv">
                <section class="tit">
                    <h3 id="privacidad">AVISO DE PRIVACIDAD</h3>
                </section>
                <section class="cont">
                    <p>
                        cursea pone a su disposición el presente AVISO DE PRIVACIDAD de conformidad con lo previsto en la “ Ley Federal de Protección de Datos Personales en Posesión de los Particulares”, así como en el reglamento correspondiente, los cuales son vigentes y aplicables en el territorio mexicano.
                    </p>
                    <p>
                        Este aviso describe los datos personales que recopilamos, cómo los usamos y compartimos, así como las opciones que usted tiene con respecto a ellos.
                    </p>
                    <p>
                        Le recomendamos que lo lea detalladamente ya que es aplicable por el simple uso o acceso a cualquiera de las páginas y aplicaciones web o móviles, suscripción a membresías, acceso a cursos o talleres, softwares y aplicaciones en general que integran el sitio "https://cursea.ga" por lo que entenderemos que acepta el presente aviso de privacidad y acuerda en obligarse en su cumplimiento.
                    </p>
                </section>
            </article>
            <article class="av-priv">
                <section class="tit">
                    <h3>RESPONSABLE DEL TRATAMIENTO DE SUS DATOS PERSONALES.</h3>
                </section>
                <section class="cont">
                    <p>
                        Nuestra empresa (en lo sucesivo cursea), es el único responsable del tratamiento de los datos personales que los usuarios y suscriptores proporcionen al registrarse y suscribirse en alguna de las membresías que ofrecemos, así como de los datos que proporcione para el acceso a los cursos o talleres de su elección.
                    </p>
                    <p>
                        La seguridad es muy importante para nosotros, por lo que estamos comprometidos con la protección de sus datos personales manteniendo las más altas técnicas y medidas de seguridad, tanto físicas, como administrativas y legales.
                    </p>
                    <p>
                        Usted tiene la oportunidad de escoger entre una amplia gama de cursos y talleres a los que tendrá acceso mediante membresías que hemos diseñado para usted, con la seguridad y la certeza de que sus datos personales serán protegidos y tratados de manera confidencial en todo momento. 
                    </p>
                </section>
            </article>
            <article class="av-priv">
                <section class="tit">
                    <h3>DATOS PERSONALES QUE PUEDEN SER RECOLECTADOS.</h3>
                </section>
                <section class="cont">
                    <p>
                        1. Los datos personales que cursea puede recopilar de usted al crear una cuenta, acceder a un curso y/o taller, de manera enunciativa más no limitativa son:
                    </p>
                    <ul>
                        <li>Nombre</li>
                        <li>Dirección de correo electrónico</li>
                    </ul>
                    <p>
                        Usted no tiene la obligación de proporcionarnos dichos datos, sin embargo, algunos de ellos son requisitos esenciales para poder suscribirse a las membresías de cursea.
                    </p>
                    <p>
                        Si no nos proporciona esta información no podremos brindarle acceso a los cursos o talleres que sean de su interés o nuestra capacidad para hacerlo podrá verse significativamente obstaculizada.
                    </p>
                    <p>
                        Estos datos NO serán almacenados o utilizados por cursea. Serán utilizados únicamente por la empresa procesadora de pagos que usted seleccione dentro de las opciones que ofrecemos para ello, por lo que, al aceptar la suscripción otorga su consentimiento para la transferencia de los datos que se efectuará exclusivamente para tal fin. 
                    </p>
                </section>
            </article>
            <article class="av-priv">
                <section class="tit">
                    <h3>FINALIDADES DEL TRATAMIENTO DE SUS DATOS PERSONALES.</h3>
                </section>
                <section class="cont">
                    <p>
                        Los datos personales que cursea recabe serán utilizados para atender las siguientes finalidades:
                    </p>
                    <ul>
                        <li>Crear y registrar su cuenta en nuestra pagina así como hacerle llegar información sobre la misma.</li>
                        <li>Identificar su tipo de membresía y otorgarle los beneficios que usted obtiene por las características de su suscripción.</li>
                        <li>Para la personalización de los documentos digitales; por ejemplo: los certificados digitales por la culminación de talleres o cursos.</li>
                        <li>Para registrar sus avances en los cursos o talleres que haya optado cursar.</li>
                        <li>Para almacenar las puntuaciones de las evaluaciones de los cursos o talleres cursados.</li>
                        <li>Brindarle correctamente los productos, servicios y beneficios que solicite o suscriba con nosotros.</li>
                        <li>Para actualizar nuestra oferta de cursos o talleres, materias, modalidades, facilitadores, entre otros.</li>
                        <li>Atender puntualmente sus comentarios, quejas y sugerencias, así como brindarle soporte técnico cuando lo requiera.</li>
                        <li>Para integrar bases de datos de uso interno, así como expedientes y sistemas necesarios para la correcta operación del sitio web.</li>
                        <li>Para llevar a cabo análisis y evaluaciones internas sobre la calidad de nuestros cursos o talleres.</li>
                    </ul>
                    <p>
                        De manera adicional, se podrán utilizar sus datos personales para las siguientes finalidades secundarias: mercadotecnia, publicidad y prospección comercial; ofrecerle, en su caso, otros productos y servicios propios de cursea; remitirle promociones de otros bienes, servicios y/o productos; para realizar análisis estadísticos, generación de modelos de información y/o perfiles de comportamiento actual y predictivo y, para hacerlo participe en encuestas, sorteos y promociones.
                    </p>
                </section>
            </article> 
            <article class="av-priv">
                <section class="tit">
                    <h3>OPCIONES Y MEDIOS PARA LIMITAR EL USO O DIVULGACIÓN DE LOS DATOS. </h3>
                </section>
                <section class="cont">
                    <p>
                        Usted en cualquier momento podrá limitar el uso o divulgación de sus datos personales enviando un correo electrónico a "correoelectronicoempresa" indicándonos en el cuerpo del correo su nombre completo y que dato desea que no sea divulgado.
                    </p>
                </section>
            </article>
            <article class="av-priv">
                <section class="tit">
                    <h3>MEDIOS PARA EJERCER LOS DERECHOS DE ACCESO, RECTIFICACIÓN, CANCELACIÓN U OPOSICIÓN (DERECHOS ARCO).</h3>
                </section>
                <section class="cont">                                   
                    <p>
                        En términos de la normatividad aplicable, Usted tiene derecho en todo momento a acceder, actualizar, corregir y tener confidencialidad sobre su información personal. También puede pedir que dejemos de enviarle publicidad, ofertas y promociones, suprimir sus datos y oponerse a que usemos sus datos para una o varias finalidades;
                    </p>
                    <p>
                        Para ejercer los Derechos ARCO, usted deberá enviarnos solicitud al correo electrónico "cursea.ga@gmail.com" identificándose con la siguiente información:
                    </p>
                    <ul>
                        <li>Correo electrónico registrado en la plataforma de "https://cursea.ga"</li>
                        <li>Nombre de usuario o seudónimo registrado en "https://cursea.ga"</li>
                        <li>Número telefónico u otro medio para comunicarle la respuesta a su solicitud.</li>
                        <li>Número telefónico u otro medio para comunicarle la respuesta a su solicitud.</li>
                    </ul>
                </section>
            </article>
            <article class="av-priv">
                <section class="tit">
                    <h3>TRANSFERENCIA DE DATOS PERSONALES.</h3>
                </section>
                <section class="cont">
                    <p>
                        cursea puede divulgar su información a las autoridades competentes en términos de la legislación aplicable; cualquier transferencia de sus datos personales sin consentimiento se realizará de acuerdo al Artículo 37 de la LFPDPPP.
                    </p>
                    <p>
                        En atención al artículo 36 de la LFPDPPP, se proporcionarán los datos mencionados en el numeral 2 del apartado “DATOS PERSONALES QUE PUEDEN SER RECOLECTADOS” únicamente para los fines detallados, ya que utilizamos terceras partes para procesar los pagos, gestionar reembolsos y facturación de los servicios que ofrecemos.
                    </p>
                </section>
            </article>
            <article class="av-priv">
                <section class="tit">
                    <h3>CONSIDERACIONES RELACIONADAS CON LA JURISDICCIÓN.</h3>
                </section>
                <section class="cont">
                    <p>
                        De conformidad con los Estándares de Protección de Datos Personales establecidos el 20 de junio de 2017, mediante el cual los Estados Iberoamericanos reconocen los derechos de los ciudadanos con respecto a la privacidad de su información y datos personales, los cuales tienen como objetivo: “establecer un marco común de principios y derechos de protección de datos que sirvan como base para las diferentes legislaciones nacionales de los Estados Iberoamericanos de forma que se garantice una tutela homogénea del derecho a la protección de datos personales en todos los Estados Iberoamericanos y se facilite el flujo de los datos personales entre los mismos y más allá de sus fronteras”.
                    </p>
                    <p>
                        cursea pone a disposición de los usuarios y/o suscriptores los Estándares que regulan de manera internacional sus Derechos:
                    </p>
                    <p>
                        https://www.infoem.org.mx/doc/publicaciones/EPDPEI_2017.pdf.
                    </p>
                </section>
            </article>
            
            <article class="av-priv">
                <section class="tit">
                    <h3>MANTENIMIENTO Y ELIMINACIÓN DE LOS DATOS.</h3>
                </section>
                <section class="cont">
                    <p>
                        Cursea conserva su usuario y los datos personales proporcionados durante el tiempo que Usted mantiene su cuenta activa, sin embargo, en cualquier momento usted podrá cancelarla.cursea eliminará la totalidad de los datos personales que no estemos obligados a conservar conforme a requisitos legales, regulatorios, de impuestos u otros que sean aplicables.
                    </p>
                    <p>
                        Cabe señalar que, una vez eliminada su cuenta, se perderá de igual forma el progreso registrado en los cursos y/o talleres en los que haya participado.
                    </p>    
                </section>
            </article>
            <article class="av-priv siu">
                <section class="tit">
                    <h3>MODIFICACIONES AL AVISO DE PRIVACIDAD.</h3>
                </section>
                <section class="cont">
                    <p>
                        El presente aviso de privacidad puede sufrir modificaciones, cambios o actualizaciones por nuevos requerimientos legales, necesidades propias de cursea, por los cursos o talleres, productos o servicios actuales o futuros que ofrecemos, por nuestras prácticas de privacidad, por cambios en nuestro modelo de negocio, entre otras. La versión actualizada siempre estará disponible en nuestro Sitio Web.
                    </p>
                    <p>
                        De igual forma, las modificaciones al presente aviso de privacidad serán notificadas a través de cualquiera de los siguientes medios:
                    </p>
                    <ul>
                        <li>Aviso a través de nuestro sitio web:  https://cursea.ga</li>
                        <li>Mensaje de texto al correo electrónico que haya señalado en su registro</li>
                    </ul>
                    <br>
                    <p class="p-hasta-abajo">
                        En caso de que no esté de acuerdo con el Aviso de Privacidad y/o con los Términos y Condiciones a su disposición, deberá abstenerse de acceder o utilizar el Sitio.
                    </p>
                </section>
            </article>
        </article>
        <section id="abajo"></section>

        <!-- Menu Lateral -->
        <input type="checkbox"  id="btn-menu" class="hide">
        <div class="container-menu">
            <div class="cont-menu">
                <nav>
                    <p class="p-navbar">Personal</p>
                    <!-- Slot del menu lateral -->
                    <section class="sect-nav" onclick="window.location.href = '/ajustes/cuenta/cuenta.php';">
                        <section class="sect-nav-icon">
                            <img src="img/user-menu.png" alt="img" class="sect-nav-img">
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

        <script >
            window.watsonAssistantChatOptions = {
                integrationID: "11420c74-9f58-4f75-af8d-2cfb989f79ae", // The ID of this integration.
                region: "us-south", // The region your integration is hosted in.
                serviceInstanceID: "a0823d81-c30b-443f-8733-90dcd8daeb27", // The ID of your service instance.
                onLoad: function(instance) { instance.render(); }
            };
            setTimeout(function(){
                const t=document.createElement('script');
                t.src="https://web-chat.global.assistant.watson.appdomain.cloud/versions/" + (window.watsonAssistantChatOptions.clientVersion || 'latest') + "/WatsonAssistantChatEntry.js";
                console.log(t.src);
                document.head.appendChild(t);
            });
        </script>
    </body>
</html>