<?php
if (isset($message)) {
    foreach ($message as $message) {
        echo '
         <div class="message">
            <span>' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
    }
}
?>

<header class="header">
<section class="flex">
        <a href="admin-dashboard.php" class="logo">Admin<span>Panel</span></a>

        <nav class="navbar">
            <a href="admin-dashboard.php">CONTROL</a>
            <a href="admin-sections.php">WEB</a>
            <a href="admin-events.php">EVENTOS</a>
            <a href="admin-sponsors.php">PATROCINADORES</a>
            <a href="admin-products.php">PROMOCIONES</a>
            <a href="admin-users.php">USUARIOS</a>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>

    

     <div class="profile">
         <?php
            $select_profile = $BBDD->consulta("SELECT * FROM `usuarios` WHERE USER_ADMIN = 1");
            
            $fetch_profile = $BBDD->extraer_registro();
         ?>
         <p><?= $fetch_profile['USER_EMAIL']; ?></p>
         <a href="../admin/admin-profile.php" class="btn">Actualizar perfil</a>
         <a href="../admin/admin-logout.php" class="delete-btn" onclick="return confirm('Estas seguro de cerrar sesión?');">Cerrar sesión</a> 
     </div>
</section>
</header>