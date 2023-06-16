<?php

require '../../../bd-conex.php';

session_start();

// $admin_id = $_SESSION['USER_ID'];

if (isset($_POST['add_sponsor'])) {
   $sponsor_name = $_POST['name'];
   $sponsor_name = filter_var($sponsor_name, FILTER_SANITIZE_STRING);
   $sponsor_details = $_POST['details'];
   $sponsor_details = filter_var($sponsor_details, FILTER_SANITIZE_STRING);

   $boolURL = false;
   if ($_POST['url'] != NULL) {
      $sponsor_url = $_POST['url'];
      $boolURL = true;
   }

   $sponsor_image = $_FILES['image']['name'];
   $sponsor_image = filter_var($sponsor_image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];

   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_tmp_name = $image_tmp_name;

   $image_folder = '../../assets/media/sponsors_media/' . $sponsor_image;

   $select_sponsors = $BBDD->consulta("SELECT * FROM `sponsors` WHERE EMPRESA_NAME = '$sponsor_name'");

   if ($BBDD->numero_filas() > 0) {
      $message[] = '¡Este patrocinador ya existe!';
   } else {
      // En caso de haber añadido URL
      if ($boolURL == true) {
         $insert_sponsors = $BBDD->consulta("INSERT INTO `sponsors`(EMPRESA_NAME, EMPRESA_INFO, EMPRESA_PICTURE, EMPRESA_URL) VALUES('$sponsor_name', '$sponsor_details', '$sponsor_image', '$sponsor_url')");
         if ($image_size > 2000000) {
            $message[] = '¡Tamaño de imagen no soportado!';
         } else {
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = '¡Sponsor añadido!';
         }
      } else {
         // En caso de NO haber añadido URL
         $insert_sponsors = $BBDD->consulta("INSERT INTO `sponsors`(EMPRESA_NAME, EMPRESA_INFO, EMPRESA_PICTURE) VALUES('$sponsor_name', '$sponsor_details', '$sponsor_image')");
         if ($image_size > 2000000) {
            $message[] = '¡Tamaño de imagen no soportado!';
         } else {
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = '¡Patrocinador añadido!';
         }
      }
   }
}


if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $delete_sponsor = $BBDD->consulta("DELETE FROM `sponsors` WHERE EMPRESA_ID = '$delete_id'");
   header('location:admin-sponsors.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin | Patrocinadores</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../../css/admin_style.css">

</head>

<body>
   <?php
   include 'admin-color.php';
   include 'admin-header.php';
   ?>

   <section class="add-products">

      <p style="text-align: center; font-size: 16px;"><i>Aquí podrás añadir Patrocinadores que te acompañan en la aventura, para darles visualización.</i></p>
      <br><br><br>

      <h1 class="heading">Añadir Patrocinador</h1>

      <form action="" method="post" enctype="multipart/form-data">
         <div class="flex">
            <div class="inputBox">
               <span>Empresa*:</span>
               <input type="text" class="box" required maxlength="100" placeholder="Nombre de la empresa" name="name">
            </div>
            <div class="inputBox">
               <span>Imagen*:</span>
               <input type="file" name="image" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
            </div>


            <div class="inputBox">
               <span>Descripción*:</span>
               <textarea name="details" placeholder="Información adicional de la empresa" class="box" required maxlength="500" cols="30" rows="10"></textarea>
            </div>

            <div class="inputBox">
               <span>Enlace web:</span>
               <input type="url" name="url" placeholder="Acceso a página web de la empresa" class="box" maxlength="500" cols="50" rows="11"></input>
            </div>
         </div>

         <input type="submit" value="+" class="btn" name="add_sponsor">
      </form>

   </section>

   <section class="show-products">

      <h1 class="heading">Patrocinadores actuales</h1>

      <div class="box-container">

         <?php
         $select_sponsors = $BBDD->consulta("SELECT * FROM `sponsors`");
         if ($BBDD->numero_filas() > 0) {
            while ($fetch_sponsor = $BBDD->extraer_registro()) {
         ?>
               <div class="box">
                  <img src="../../assets/media/sponsors_media/<?= $fetch_sponsor['EMPRESA_PICTURE']; ?>" alt="">
                  <div class="name"><?= $fetch_sponsor['EMPRESA_NAME']; ?></div>
                  <div class="details"><span><?= $fetch_sponsor['EMPRESA_INFO']; ?></span></div>
                  <?php if ($fetch_sponsor['EMPRESA_URL'] != NULL) { ?>
                     <div class="details"><a href="<?= $fetch_sponsor['EMPRESA_URL']; ?>">Enlace web</a></div>
                  <?php } ?>
                  <div class="flex-btn">
                     <a href="admin-sponsors.php?delete=<?= $fetch_sponsor['EMPRESA_ID']; ?>" class="delete-btn" onclick="return confirm('Quieres borrar este producto?');">Borrar</a>
                  </div>
               </div>
         <?php
            }
         } else {
            echo '<p class="empty">ACTUALMENTE NO HAY PATROCINADORES</p>';
         }

         ?>

      </div>

   </section>
   <script src="../../js/admin.js"></script>
</body>

</html>