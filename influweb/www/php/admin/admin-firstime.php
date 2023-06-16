<?php
// SI ES LA PRIMERA VEZ QUE EL ADMINISTRADOR LOGEA

require '../../../bd-conex.php';

session_start();

$admin_id = $_SESSION['USER_ID'];

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

   $user = "admin";

   $bool = false;

   if ($pass != $confirm_pass) {
      $message[] = '¡Confirma la contraseña!';
   } else {
      if ($pass != $empty_pass) {

         $update_profile = $BBDD->consulta("UPDATE `usuarios`
            SET USER_NAME = '$name', 
            USER_EMAIL = '$email', 
            USER_PASSWORD = '$confirm_pass',
            USER_USER = '$user'
            WHERE USER_ADMIN  = 1"
         );

         $bool = true;

         if ($bool) {
            $BBDD->consulta("INSERT INTO `influencer`(NOMBRE_INFLUENCER) VALUES('$name')");
            header("Location: admin-dashboard.php");
         } else {
            echo 'Ha ocurrido un error al actualizar.';
         }
      } else {
         $message[] = '¡Por favor, ingresa la nueva contraseña!';
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
   <title>AdminPanel</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../../css/admin_style.css">
</head>

<body>
   <header class="header">
      <section class="flex">
         <a href="" class="logo">Admin<span>Panel</span></a>

         <nav class="navbar">
            <p class="logo">¡Bienvenido al <span>Panel</span> de configuración!</p>
            <p style="font-size: 14px;"><i>Completa la configuración inicial para darle sentido al sitio web</i></p>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
         </div>
      </section>
   </header>

   <section class="form-container">

      <form action="" method="post" enctype="multipart/form-data" style="text-align: left; font-size: 16px">
         <h3 style="text-align: center;">Configuración general</h3>
         <!-- <input type="text" name="user" placeholder="Introduce tu nick de usuario" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')"> -->

         <label for="">1. Introduce tu nombre o nombre de tu marca. Este seá el título principal de la página.*: </label>
         <input type="text" name="name" placeholder="Ej. Influweb" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')" style="font-size: 12px;"> 

         <label for="">2. Actualiza el correo de Administrador por defecto*: </label>
         <input type="email" name="email" required placeholder="admin@influweb.com" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')" style="font-size: 12px;">

         <label for="">3. Actualiza la contraseña de Administrador por defecto*: </label>
         <input type="password" name="new_pass" placeholder="Introduce la nueva contraseña" maxlength="20" class="box" required style="font-size: 12px;">
         <input type="password" name="confirm_pass" placeholder="Confirma la nueva contraseña" maxlength="20" class="box" required style="font-size: 12px;">

         <label for="">4. A continuación, después de haber rellenado los anteriores campos correctamente, pulse 'Comenzar' y diríjase a la ventana 'WEB' que le aparecerá en pantalla para continuar con la personalización. </label>

         <input type="submit" value="Comenzar" class="btn" name="submit">
      </form>

   </section>
</body>

</html>