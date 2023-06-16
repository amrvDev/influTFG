<?php

require '../../../bd-conex.php';

session_start();

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $delete_admins = $BBDD->consulta("DELETE FROM `usuarios` WHERE USER_ID = $delete_id");
   header('location:admin-users.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin | Usuarios</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../../css/admin_style.css">

</head>

<body>

   <?php
   include 'admin-color.php';
   include 'admin-header.php';
   ?>

   <section class="accounts">

      <p style="text-align: center; font-size: 16px;"><i>Control de usuarios registrados.</i></p>
      <br><br><br>

      <h1 class="heading">Cuentas de usuario</h1>
      <div class="box-container">
         <?php
         $select_accounts = $BBDD->consulta("SELECT * FROM `usuarios`");
         $number_of_accounts = $BBDD->numero_filas($select_accounts);
         if ($number_of_accounts > 0) {
            while ($fetch_accounts = $BBDD->extraer_registro($select_accounts)) {
         ?>
               <div class="box">
                  <?php
                  if ($fetch_accounts['USER_ADMIN'] != TRUE) {
                  ?>
                     <p> Usuario: <span><?= $fetch_accounts['USER_USER']; ?></span> </p>
                     <p> Nombre : <span><?= $fetch_accounts['USER_NAME']; ?></span> </p>
                     <p> E-mail : <span><?= $fetch_accounts['USER_EMAIL']; ?></span> </p>

                     <div class="flex-btn">
                        <a href="admin-users.php?delete=<?= $fetch_accounts['USER_ID']; ?>" onclick="return confirm('Quieres borrar esta cuenta?')" class="delete-btn">Borrar Usuario</a>
                     </div>
                     <?php
                     $userId = $fetch_accounts['USER_ID'];
                     ?>
                  <?php
                  } else {
                  ?>
                     <p> Usuario: <span>Administrador</span> </p>
                     <p> E-mail : <span><?= $fetch_accounts['USER_EMAIL']; ?></span> </p>
                  <?php } ?>
               </div>
         <?php
            }
            if (isset($_POST['borrarUsuario'])) {
               $BBDD->consulta("DELETE FROM `usuarios` WHERE USER_ID = $userId");
            }
         } else {
            echo '<p class="empty">¡No hay usuarios!</p>';
         }
         ?>
      </div>
   </section>


   <script src="../../js/admin.js"></script>

</body>

</html>