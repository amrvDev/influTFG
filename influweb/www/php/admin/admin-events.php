<?php

require '../../../bd-conex.php';

session_start();

// $admin_id = $_SESSION['USER_ID'];

if (isset($_POST['add_event'])) {
   $event_text = $_POST['text'];
   $event_ini = date('Y-m-d H:i:s', strtotime($_POST['fechaIni']));
   $event_fin = date('Y-m-d H:i:s', strtotime($_POST['fechaFin']));
   $BBDD->consulta("INSERT INTO `eventos_calendario`(EVENTO_TEXT, EVENTO_DATE_INI, EVENTO_DATE_FIN) VALUES('$event_text', '$event_ini', '$event_fin')");
};

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $delete_sponsor = $BBDD->consulta("DELETE FROM `eventos_calendario` WHERE EVENTO_ID = $delete_id");
   header('location:admin-events.php');
};

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin | Eventos</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../../css/admin_style.css">

</head>

<body>
   <?php
   include 'admin-color.php';
   include 'admin-header.php';
   ?>

   <section class="add-products">

      <p style="text-align: center; font-size: 16px;"><i>Aquí podrás añadir eventos a tu calendario.</i></p>
      <br><br><br>

      <h1 class="heading">Añadir evento</h1>

      <form action="" method="post" enctype="multipart/form-data">
         <div class="flex">
            <div class="inputBox">
               <span>Información*:</span>
               <input type="text" class="box" maxlength="100" placeholder="Datos concretos del evento" name="text" required>
            </div>
            <div class="inputBox">
               <span>Fecha inicio*:</span>
               <input type="datetime-local" name="fechaIni" id="fechaInicio" required>
            </div>
            <div class="inputBox">
               <span>Fecha fin*:</span>
               <input type="datetime-local" name="fechaFin" id="fechaFin" required>
            </div>

         </div>

         <input type="submit" value="+" class="btn" name="add_event">
      </form>

   </section>

   <section class="show-products">

      <h1 class="heading">Eventos en curso</h1>

      <div class="box-container">

         <?php
         $select_events = $BBDD->consulta("SELECT * FROM `eventos_calendario`");
         if ($BBDD->numero_filas() > 0) {
            while ($fetch_event = $BBDD->extraer_registro()) {
         ?>
               <div class="box">
                  <div class="name"><?= $fetch_event['EVENTO_TEXT']; ?></div>
                  <div class="details"><span><?= $fetch_event['EVENTO_DATE_INI']; ?></span></div>
                  <div class="details"><span><?= $fetch_event['EVENTO_DATE_FIN']; ?></span></div>
                  <div class="flex-btn">
                     <a href="admin-events.php?delete=<?= $fetch_event['EVENTO_ID']; ?>" class="delete-btn" onclick="return confirm('Quieres borrar este producto?');">Borrar</a>
                  </div>
               </div>
         <?php
            }
         } else {
            echo '<p class="empty">ACTUALMENTE NO HAY NINGÚN EVENTO PREVISTO</p>';
         }

         ?>

      </div>

   </section>
   <script src="../../js/admin.js"></script>
</body>

</html>