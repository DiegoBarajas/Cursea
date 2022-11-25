<?php
    require_once("../mail/mail.php");

    $dest = $_GET['email'];
    $subject = "Activar Cuenta";
    $body = '<h1>Ingresa al link para activar tu cuenta</h1><a href="cursea.ga/login/active_account.php?email='.$dest.'">Activar Cuenta</a><br><br><br><p>Si no funciona entra a este link: cursea.ga/login/active_account.php?email='.$dest.'</p><style>h1{font-family: sans-serif;color:#5B0F4D;}a{font-family: verdana;color: #003333}a:hover{color: #0D4D4D;}</style>';
    sendMail($dest, $subject, $body);
    header("Location: check_email.html");

?>