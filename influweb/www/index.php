<?php
/* INDEX DEL PROYECTO. PÁGINA PRINCIPAL MÉTODO DE ACCESO PARA ADMIN, USUARIO NO REGISTRADO Y USUARIO REGISTRADO */

require '../bd-conex.php';
include 'php/influencer-data.php';

// Se cierra sesión de usuario en caso de haber una iniciada
if (isset($_SESSION['USER_ID'])) {
    session_unset();
    session_destroy();
    echo "Sesión cerrada";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TITLE VARIABLE -->
    <title><?php echo $influName; ?> | Inicio</title>
    <!-- ESTILOS -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/idiomas.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body style="background: <?php echo $influBg; ?>; font-family: 'Nunito', sans-serif; color: #444;">
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <a class="navbar-brand" href="#"><?php if(isset($influName)){echo $influName;} ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-section="menu" data-value="inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="php/events.php" data-section="menu" data-value="eventos">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="php/sponsors.php" data-section="menu" data-value="patrocinadores">Patrocinadores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="php/products.php" data-section="menu" data-value="promociones">Promociones</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <div id="flags" class="flags">
                            <div class="flags__item" data-language="es">
                                <img src="assets/media/interface/es.svg" alt="es" class="flags__img">
                            </div>
                            <div class="flags__dropdown">
                                <div class="flags__item" data-language="es">
                                    <img src="assets/media/interface/es.svg" alt="es" class="flags__img">
                                </div>
                                <div class="flags__item" data-language="en">
                                    <img src="assets/media/interface/gb.svg" alt="en" class="flags__img">
                                </div>
                                <div class="flags__item" data-language="fr">
                                    <img src="assets/media/interface/fr.svg" alt="fr" class="flags__img">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="php/login.php" data-section="menu" data-value="iniciar sesion">Iniciar sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="php/register.php" data-section="menu" data-value="registrarse">Registrarme</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="container my-4">

        <div class="influHead">
            <div class="ih-info">
                <?php
                // RECOGER Y MOSTRAR DATOS DEL INFLUENCER
                $BBDD->consulta("SELECT * FROM `influencer`");
                if ($BBDD->numero_filas() > 0) {
                    if ($fila['LOGO_INFLUENCER'] != NULL && $fila['LOGO_INFLUENCER'] != "") {
                        $logo = $fila['LOGO_INFLUENCER'];
                    } else {
                        $logo = "default-img.jpg";
                    }
                } else {
                    $logo = "default-img.jpg";
                }
                ?>
                <img src="<?php echo "assets/media/interface/" . $logo; ?>" alt="Logo">
                <h1><?php if(isset($influName)){echo $influName;} ?></h1><br>
                <h2 style="margin-left: 10px;"><i>"<?php if(isset($influSlogan)){echo $influSlogan;} ?>"</i></h2>
            </div>
        </div>



        <div class="influencer-info">
            <section class="tipos1">
                <?php
                $BBDD->consulta("SELECT * FROM `influencer_contenidos` WHERE CONTENIDO_TIPO = 1");
                $contenidoArray = array(); // Array para almacenar los resultados

                if ($BBDD->numero_filas() > 0) {
                    while ($fila = $BBDD->extraer_registro()) {
                        $contenidoArray[] = $fila; // Agregar cada fila al array
                    }

                    $contenidoArray = array_reverse($contenidoArray); // Invertir el orden del array

                    foreach ($contenidoArray as $fila) { // Recorrer el array invertido
                ?>
                        <div class="tipo1" style="background: <?php echo $influColor1; ?>;">
                            <h3><?php echo $fila['CONTENIDO_TITULO']; ?></h3>
                            <p><?php echo $fila['CONTENIDO_TEXTO']; ?></p>
                        </div>
                <?php
                    }
                }
                ?>
            </section>

            <section class="tipos2">
                <?php
                $BBDD->consulta("SELECT * FROM `influencer_contenidos` WHERE CONTENIDO_TIPO = 2");
                $contenidoArray = array(); // Array para almacenar los resultados

                if ($BBDD->numero_filas() > 0) {
                    while ($fila = $BBDD->extraer_registro()) {
                        $contenidoArray[] = $fila; // Agregar cada fila al array
                    }

                    $contenidoArray = array_reverse($contenidoArray); // Invertir el orden del array

                    foreach ($contenidoArray as $fila) { // Recorrer el array invertido
                ?>
                        <div class="tipo2" style="background: <?php echo $influColor2; ?>;">
                            <h3><?php echo $fila['CONTENIDO_TITULO']; ?></h3>
                            <p><?php echo $fila['CONTENIDO_TEXTO']; ?></p>
                        </div>
                <?php
                    }
                }
                ?>
            </section>

            <section class="tipos3">
                <?php
                $BBDD->consulta("SELECT * FROM `influencer_contenidos` WHERE CONTENIDO_TIPO = 3");
                $contenidoArray = array(); // Array para almacenar los resultados

                if ($BBDD->numero_filas() > 0) {
                    while ($fila = $BBDD->extraer_registro()) {
                        $contenidoArray[] = $fila; // Agregar cada fila al array
                    }

                    $contenidoArray = array_reverse($contenidoArray); // Invertir el orden del array

                    foreach ($contenidoArray as $fila) { // Recorrer el array invertido
                ?>
                        <div class="tipo3" style="background: <?php echo $influBg; ?>;">
                            <h3><?php echo $fila['CONTENIDO_TITULO']; ?></h3>
                            <p><?php echo $fila['CONTENIDO_TEXTO']; ?></p>
                        </div>
                <?php
                    }
                }
                ?>
            </section>

            <section class="redes-sociales">
                <?php
                // EN CASO DE QUE EL INFLUENCER HAYA AÑADIDO REDES SOCIALES -> MOSTRAR
                $BBDD->consulta("SELECT URL_TWITTER FROM `influencer`");
                if (($fila = $BBDD->extraer_registro()) && $fila['URL_TWITTER'] !== NULL && $fila['URL_TWITTER'] !== "") {
                    echo "<a href=\"" . $fila['URL_TWITTER'] . "\"><img src=\"assets/media/interface/twitter.png\" alt=\"Twitter\" width=\"48px\" height=\"48px\"></a>";
                }

                $BBDD->consulta("SELECT URL_FACEBOOK FROM `influencer`");
                if (($fila = $BBDD->extraer_registro()) && $fila['URL_FACEBOOK'] !== NULL && $fila['URL_FACEBOOK'] !== "") {
                    echo "<a href=\"" . $fila['URL_FACEBOOK'] . "\"><img src=\"assets/media/interface/facebook.png\" alt=\"Facebook\" width=\"48px\" height=\"48px\"></a>";
                }

                $BBDD->consulta("SELECT URL_INSTAGRAM FROM `influencer`");
                if (($fila = $BBDD->extraer_registro()) && $fila['URL_INSTAGRAM'] !== NULL && $fila['URL_INSTAGRAM'] !== "") {
                    echo "<a href=\"" . $fila['URL_INSTAGRAM'] . "\"><img src=\"assets/media/interface/instagram.png\" alt=\"Instagram\" width=\"48px\" height=\"48px\"></a>";
                }
                ?>
            </section>

        </div>
    </main>

    <footer class="bg-light text-center py-3">
        <span>&copy; <?php echo date('Y'); ?> - <?php if(isset($influName)){echo $influName;} ?></span>
    </footer>

    <script src="js/language_index.js"></script>
</body>

</html>