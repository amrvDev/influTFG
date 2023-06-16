<?php
// CONTROL DE ADMINISTRADOR

require '../../../bd-conex.php';

session_start();

// $admin_id = $_SESSION['USER_ID'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Panel de administrador</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../css/admin_style.css">
</head>

<body>



    <?php
    include 'admin-color.php';
    include 'admin-header.php';
    ?>

    <section class="dashboard">

        <h1 class="heading">Panel de administrador</h1>

        <div class="box-container">
            <div class="box">
                <?php
                $select_events = $BBDD->consulta("SELECT * FROM `eventos_calendario`");
                $number_of_events = $BBDD->numero_filas($select_events);
                ?>
                <h3><?= $number_of_events; ?></h3>
                <p>Eventos</p>
                <a href="admin-events.php" class="btn">Gestionar Eventos</a>
            </div>
            <div class="box">
                <?php
                $select_sponsors = $BBDD->consulta("SELECT * FROM `sponsors`");
                $number_of_sponsors = $BBDD->numero_filas($select_sponsors);
                ?>
                <h3><?= $number_of_sponsors; ?></h3>
                <p>Patrocinadores</p>
                <a href="admin-sponsors.php" class="btn">Gestionar Patrocinios</a>
            </div>
            <div class="box">
                <?php
                $select_products = $BBDD->consulta("SELECT * FROM `productos`");
                $number_of_products = $BBDD->numero_filas($select_products);
                ?>
                <h3><?= $number_of_products; ?></h3>
                <p>Promociones</p>
                <a href="admin-products.php" class="btn">Gestionar Promos</a>
            </div>
            <div class="box">
                <?php
                $select_users = $BBDD->consulta("SELECT * FROM `usuarios`");
                $number_of_users = $BBDD->numero_filas($select_users);
                ?>
                <h3><?= $number_of_users; ?></h3>
                <p>Usuarios</p>
                <a href="admin-users.php" class="btn">Gestionar Usuarios</a>
            </div>
        </div>

    </section>

    <script src="../../js/admin.js"></script>
</body>

</html>