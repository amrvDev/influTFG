<header style="position: relative;">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="#"><?php if(isset($influName)){echo $influName;} ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php" data-section="menu" data-value="inicio">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="events.php"  data-section="menu" data-value="eventos">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sponsors.php" data-section="menu" data-value="patrocinadores">Patrocinadores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php" data-section="menu" data-value="promociones">Promociones</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div id="flags" class="flags">
                        <div class="flags__item" data-language="es">
                            <img src="../assets/media/interface/es.svg" alt="es" class="flags__img">
                        </div>
                        <div class="flags__dropdown">
                            <div class="flags__item" data-language="es">
                                <img src="../assets/media/interface/es.svg" alt="es" class="flags__img">
                            </div>
                            <div class="flags__item" data-language="en">
                                <img src="../assets/media/interface/gb.svg" alt="en" class="flags__img">
                            </div>
                            <div class="flags__item" data-language="fr">
                                <img src="../assets/media/interface/fr.svg" alt="fr" class="flags__img">
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php" data-section="menu" data-value="iniciar sesion">Iniciar sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php" data-section="menu" data-value="registrarse">Registrarme</a>
                </li>
            </ul>
        </div>
    </nav>
</header>