<?php
require '../../../bd-conex.php';
include '../influencer-data.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $influName; ?> | Inicio</title>
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/idiomas.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body style="background: <?php echo $influBg; ?>; font-family: 'Nunito', sans-serif; color: #444;">
    <?php include 'user-header.php'; ?>

    <main class="container my-4">
    <div class="influHead">
            <div class="ih-info">
                <?php
                $BBDD->consulta("SELECT * FROM `influencer`");
                if ($BBDD->numero_filas() > 0) {
                    if ($fila['LOGO_INFLUENCER'] != NULL && $fila['LOGO_INFLUENCER'] != "") {
                        $logo = $fila['LOGO_INFLUENCER'];
                    } else {
                        $logo = "default-img.jpg";
                    }
                }
                ?>
                <img src="<?php echo "../../assets/media/interface/" . $logo; ?>" alt="">
                <h1><?php echo $influName; ?></h1><br>
                <h2 style="margin-left: 10px;"><i>"<?php echo $influSlogan; ?>"</i></h2>
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
                $BBDD->consulta("SELECT URL_TWITTER FROM `influencer`");
                if (($fila = $BBDD->extraer_registro()) && $fila['URL_TWITTER'] !== NULL && $fila['URL_TWITTER'] !== "") {
                    echo "<a href=\"" . $fila['URL_TWITTER'] . "\"><img src=\"../../assets/media/interface/twitter.png\" alt=\"Twitter\" width=\"48px\" height=\"48px\"></a>";
                }

                $BBDD->consulta("SELECT URL_FACEBOOK FROM `influencer`");
                if (($fila = $BBDD->extraer_registro()) && $fila['URL_FACEBOOK'] !== NULL && $fila['URL_FACEBOOK'] !== "") {
                    echo "<a href=\"" . $fila['URL_FACEBOOK'] . "\"><img src=\"../../assets/media/interface/facebook.png\" alt=\"Facebook\" width=\"48px\" height=\"48px\"></a>";
                }

                $BBDD->consulta("SELECT URL_INSTAGRAM FROM `influencer`");
                if (($fila = $BBDD->extraer_registro()) && $fila['URL_INSTAGRAM'] !== NULL && $fila['URL_INSTAGRAM'] !== "") {
                    echo "<a href=\"" . $fila['URL_INSTAGRAM'] . "\"><img src=\"../../assets/media/interface/instagram.png\" alt=\"Instagram\" width=\"48px\" height=\"48px\"></a>";
                }
                ?>
            </section>

        </div>
    </main>

    <footer class="bg-light text-center py-3">
        <span>&copy;
            <?php echo date('Y'); ?> - <?php echo $influName; ?>
        </span>
    </footer>

    <script src="../../js/language.js"></script>
</body>

</html>