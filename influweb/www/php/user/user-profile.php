<?php
require '../../../bd-conex.php';
include '../influencer-data.php';

session_start();

$user_id = $_SESSION['USER_ID'];


if (isset($_POST['submit'])) {

    // Variables de usuario
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $user_image = $_FILES['image']['name'];
    $user_image = filter_var($user_image, FILTER_SANITIZE_STRING);
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../../assets/media/users_img/' . $user_image;

    // Variable para verificar si se ha realizado alguna actualización
    $actualizacion_realizada = false;

    if (!empty($name)) {
        $update_user = $BBDD->consulta("UPDATE `usuarios` SET USER_NAME = '$name' WHERE USER_ID = $user_id");
        $actualizacion_realizada = true;
    }


    if (!empty($email)) {
        $update_user = $BBDD->consulta("UPDATE `usuarios` SET USER_EMAIL = '$email'  WHERE USER_ID = $user_id");
        $actualizacion_realizada = true;
    }

    if (!empty($password)) {
        $update_user = $BBDD->consulta("UPDATE `usuarios` SET USER_PASSWORD = '$password'  WHERE USER_ID = $user_id");
        $actualizacion_realizada = true;
    }

    if (!empty($user_image)) {
        if (move_uploaded_file($image_tmp_name, $image_folder)) {
            $update_user = $BBDD->consulta("UPDATE `usuarios` SET PROFILE_PICTURE = '$user_image'  WHERE USER_ID = $user_id");
            $actualizacion_realizada = true;
        } else {
            echo 'Error al mover la imagen.';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de Perfil</title>
    <link rel="stylesheet" href="../../css/idiomas.css">
    <link rel="stylesheet" href="../../css/validacion.css">
    <link rel="stylesheet" href="../css/products-sponsors.css">
    <link rel="stylesheet" href="../../css/carrito.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body style="background: <?php echo $influBg; ?> !important; font-family: 'Nunito', sans-serif; color: #444;">

    <?php include 'user-header.php'; ?>

    <div class="container mt-5">

        <?php

        $select = $BBDD->consulta("SELECT * FROM `usuarios`  WHERE USER_ID = $user_id");


        $fila = $BBDD->extraer_registro($select);


        if ($fila['PROFILE_PICTURE'] != NULL) {
            $foto = "../../assets/media/users_img/" . $fila['PROFILE_PICTURE'];
        } else {
            $foto = "../../assets/media/interface/default-user.png";
        }

        ?>

        <img src="<?= $foto ?>" style="border-radius: 50%; width: 124px; height: 124px; margin-bottom: 24px;" alt="user-pic">
        <h1 data-section="perfil" data-value="titulo">Configuración de Perfil</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name" data-section="perfil" data-value="nombre">Actualizar Nombre:</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="<?= $fila['USER_NAME']; ?>">
            </div>
            <div class="form-group">
                <label for="email" data-section="perfil" data-value="correo electronico">Actualizar Correo Electrónico:</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="<?= $fila['USER_EMAIL']; ?>">
            </div>
            <div class="form-group">
                <label for="password" data-section="perfil" data-value="contraseña">Actualizar Contraseña:</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="******">
            </div>
            <div class="form-group">
                <label for="avatar" data-section="perfil" data-value="avatar">Actualizar Avatar:</label>
                <input type="file" class="form-control-file" name="image" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn btn-primary" data-section="perfil" data-value="guardar">Guardar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../../js/language.js"></script>
    <script src="../../js/vperfil.js"></script>
</body>

</html>