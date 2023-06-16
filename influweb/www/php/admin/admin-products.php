<?php

require '../../../bd-conex.php';

session_start();

// $admin_id = $_SESSION['USER_ID'];


if (isset($_POST['add_product'])) {
   $product_name = $_POST['name'];
   $product_name = filter_var($product_name, FILTER_SANITIZE_STRING);
   $product_price = $_POST['price'];
   $product_price = filter_var($product_price, FILTER_SANITIZE_STRING);
   $product_details = $_POST['details'];
   $product_details = filter_var($product_details, FILTER_SANITIZE_STRING);
   $product_sponsor = $_POST['sponsor'];
   $product_sponsor = filter_var($product_sponsor, FILTER_SANITIZE_STRING);

   $product_image = $_FILES['image']['name'];
   $product_image = filter_var($product_image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../../assets/media/products_media/' . $product_image;

   $select_products = $BBDD->consulta("SELECT * FROM `productos` WHERE PRODUCTO_NAME = '$product_name'");

   if ($BBDD->numero_filas() > 0) {
      $message[] = '¡Este producto ya existe!';
   } else {
      $insert_products = $BBDD->consulta("INSERT INTO `productos`(PRODUCTO_NAME, PRODUCTO_INFO, PRODUCTO_PRECIO, PRODUCTO_PICTURE, EMPRESA_ID) VALUES('$product_name', '$product_details', '$product_price', '$product_image', '$product_sponsor')");


      if ($image_size > 2000000) {
         $message[] = '¡Tamaño de imagen no soportado!';
      } else {
         move_uploaded_file($image_tmp_name, $image_folder);
         $message[] = '¡Producto añadido!';
      }
   }
}

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $delete_product = $BBDD->consulta("DELETE FROM `productos` WHERE PRODUCTO_ID = '$delete_id'");
   header('location:admin-products.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin | Promociones</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../../css/admin_style.css">

</head>

<body>

<?php
     include 'admin-color.php';
     include 'admin-header.php'; 
     ?>

   <section class="add-products">

   <p style="text-align: center; font-size: 16px;"><i>Aquí podrás añadir Promociones a tu catálogo. Ten en cuenta que nosotros Influweb nos llevaremos un 10% de comisión sobre el precio del producto.</i></p>
      <br><br><br>

      <h1 class="heading">Añadir producto</h1>

      <form action="" method="post" enctype="multipart/form-data">
         <div class="flex">
            <div class="inputBox">
               <span>Nombre*:</span>
               <input type="text" class="box" required maxlength="100" placeholder="Nombre del producto" name="name">
            </div>
            <div class="inputBox">
               <span>Proveedor*:</span>
               <select name="sponsor" class="box" required>
                  <?php
                  $select_sponsors = $BBDD->consulta("SELECT EMPRESA_ID, EMPRESA_NAME FROM SPONSORS");

                  while ($fetch_sponsors = $BBDD->extraer_registro()) {
                     $empresa_id = $fetch_sponsors['EMPRESA_ID'];
                     $empresa_name = $fetch_sponsors['EMPRESA_NAME'];
                     echo "<option value='$empresa_id'>$empresa_name</option>";
                  }
                  ?>

               </select>
            </div>
            <div class="inputBox">
               <span>Precio total (€)*:</span>
               <input type="number" min="0" class="box" required max="9999999999" placeholder="Precio con IVA y descuento incluidos" onkeypress="if(this.value.length == 10) return false;" name="price">
            </div>
            <div class="inputBox">
               <span>Imagen*:</span>
               <input type="file" name="image" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
            </div>


            <div class="inputBox">
               <span>Detalles *:</span>
               <textarea name="details" placeholder="Detalles del producto" class="box" required maxlength="500" cols="30" rows="10"></textarea>
            </div>
         </div>

         <input type="submit" value="+" class="btn" name="add_product">
      </form>

   </section>

   <section class="show-products">
      <h1 class="heading">catálogo actual</h1>
      <div class="box-container">
         <?php
         $select_products = $BBDD->consulta("SELECT p.*, s.EMPRESA_NAME
                                          FROM `productos` p
                                          INNER JOIN `sponsors` s ON p.EMPRESA_ID = s.EMPRESA_ID");
         if ($BBDD->numero_filas() > 0) {
            while ($fetch_products = $BBDD->extraer_registro()) {
         ?>
               <div class="box">
                  <img src="../../assets/media/products_media/<?= $fetch_products['PRODUCTO_PICTURE']; ?>" alt="">
                  <div class="name"><?= $fetch_products['PRODUCTO_NAME']; ?></div>
                  <div class="price"><span><?= $fetch_products['PRODUCTO_PRECIO']; ?></span>€</div>
                  <div class="details"><span><?= $fetch_products['PRODUCTO_INFO']; ?></span></div>
                  <div class="details">Empresa: <?= $fetch_products['EMPRESA_NAME']; ?></div>
                  <div class="flex-btn">
                     <a href="admin-products.php?delete=<?= $fetch_products['PRODUCTO_ID']; ?>" class="delete-btn" onclick="return confirm('Quieres borrar este producto?');">Borrar</a>
                  </div>
               </div>
         <?php
            }
         } else {
            echo '<p class="empty">NO HAY PRODUCTOS EN EL CATÁLOGO</p>';
         }
         ?>
      </div>
   </section>


   <script src="../../js/admin.js"></script>

</body>

</html>