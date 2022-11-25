<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $id = $_GET['id'];
    ?>
    <form action="recuperar_pass_post.php" method="post">
        <input type="text" name="password" placeholder="Nueva Contraseña" minlength="6" required>
        <input type="hidden" name="id" value="<?php echo $id ?>">

        <input type="submit" value="Cambiar Contraseña">
    </form>
</body>
</html>