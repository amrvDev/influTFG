<?php
require '../../../bd-conex.php';
session_start();


if (isset($_POST['submit'])) {
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);

   $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
   $pass = sha1($_POST['new_pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $confirm_pass = sha1($_POST['confirm_pass']);
   $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);

   if ($pass != $confirm_pass) {
      $message[] = '¡Confirma la contraseña!';
   } else {
      if ($pass != $empty_pass) {
         $update_profile = $BBDD->consulta(
            "UPDATE `usuarios`
            SET USER_NAME = '$name', 
               USER_EMAIL = '$email', 
               USER_PASSWORD = '$confirm_pass', 
               USER_USER = '$user'
               WHERE USER_ADMIN  = 1"
         );

         $update_influencer =  $BBDD->consulta("UPDATE `influencer` SET NOMBRE_INFLUENCER = '$name'");

         header("Location: admin-dashboard.php");
      } else {
         $message[] = '¡Por favor ingresa la nueva contraseña!';
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
   <title>Perfil de Administrador</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../../css/admin_style.css">

</head>

<body>

   <?php
   include 'admin-color.php';
   include 'admin-header.php';
   ?>

   <section class="form-container">

      <form action="" method="post" enctype="multipart/form-data" style="text-align: left; font-size: 16px">
         <h3 style="text-align: center;">Configuración de administrador</h3>
         <!-- <input type="text" name="user" placeholder="Introduce tu nick de usuario" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">-->

         <label for="">Actualiza tu nombre/marca o introduce el actual: </label>
         <input type="text" name="name" placeholder="Ej. Influweb" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')" style="font-size: 12px;" required>

         <label for="">Actualiza el correo de Administrador o introduce el actual: </label>
         <input type="email" name="email" required placeholder="admin@influweb.com" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')" style="font-size: 12px;" required>

         <label for="">Actualiza la contraseña de Administrador o introduce la actual para aplicar los cambios: </label>
         <input type="password" name="new_pass" placeholder="Introduce la contraseña" maxlength="20" class="box" required style="font-size: 12px;" required>
         <input type="password" name="confirm_pass" placeholder="Confirma la contraseña" maxlength="20" class="box" required style="font-size: 12px;" required>

         <input type="submit" value="Guardar cambios" class="btn" name="submit">
      </form>

   </section>

   <script src="../../js/admin.js"></script>

</body>

</html>