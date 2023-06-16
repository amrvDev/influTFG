<header>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="#"><?php echo $influName; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="user-index.php" data-section="menu" data-value="inicio">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user-events.php" data-section="menu" data-value="eventos">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user-sponsors.php" data-section="menu" data-value="patrocinadores">Patrocinadores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user-products.php" data-section="menu" data-value="promociones">Promociones</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div id="flags" class="flags">
                        <div class="flags__item" data-language="es">
                            <img src="../../assets/media/interface/es.svg" alt="es" class="flags__img">
                        </div>
                        <div class="flags__dropdown">
                            <div class="flags__item" data-language="es">
                                <img src="../../assets/media/interface/es.svg" alt="es" class="flags__img">
                            </div>
                            <div class="flags__item" data-language="en">
                                <img src="../../assets/media/interface/gb.svg" alt="en" class="flags__img">
                            </div>
                            <div class="flags__item" data-language="fr">
                                <img src="../../assets/media/interface/fr.svg" alt="fr" class="flags__img">
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item" style="display: flex; align-items: center;">
                    <a class="nav-link" href="user-carrito.php" title="Carrito">
                        <div style="border-radius: 50%; width: 24px; height: 24px; background-color: red; color: white; text-align: center;">
                            <?php
                            // Calcular el número total de unidades
                            $totalUnits = 0;
                            if (!empty($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $productId => $product) {
                                    $totalUnits += $product['quantity'];
                                }
                            }
                            ?>

                            <?php echo $totalUnits; ?>
                        </div>
                    </a>
                </li>

                <li class="nav-item" style="display: flex; align-items: center;">
                    <a class="nav-link" href="user-profile.php" title="Perfil">
                        <?php
                        $foto;
                        $userId = $_SESSION['USER_ID'];
                        $BBDD->consulta("SELECT * FROM `usuarios` WHERE USER_ID = $userId");
                        if ($BBDD->numero_filas() > 0) {
                            $campo = $BBDD->extraer_registro();
                            if ($campo['PROFILE_PICTURE'] != NULL && $campo['PROFILE_PICTURE'] != "") {
                                $foto = "../../assets/media/users_img/" . $campo['PROFILE_PICTURE'];
                            } else {
                                $foto = "../../assets/media/interface/default-user.png";
                            }
                        }
                        ?>
                        <img src="<?php echo $foto; ?>" alt="user-pic" style="border-radius: 50%; width: 24px; height: 24px;">
                    </a>
                </li>

                <li class="nav-item" style="display: flex; align-items: center;">
                    <a class="nav-link" href="../../index.php" title="Cerrar sesión">
                        <img src="../../assets/media/interface/logout.png" alt="logout" style="border-radius: 50%; width: 24px; height: 24px;">
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>