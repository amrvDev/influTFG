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
    <title><?php echo $influName; ?> | Patrocinadores</title>
    <link rel="stylesheet" href="../../css/idiomas.css">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- https://www.youtube.com/watch?v=OAPRagDr4pU -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../../css/products-sponsors.css">
    <script src="../../js/products-sponsors.js" defer></script>
</head>

<body style="background-color: <?php echo $influBg; ?>; font-size: 1rem !important;">
    <?php include 'user-header.php'; ?>

    <main class="container my-4">
        <div class="container">

            <h3 class="title" class="title" data-section="patrocinadores" data-value="titulo"> Patrocinadores </h3>
            <p style="text-align: center;" data-section="patrocinadores" data-value="descripcion">Empresas colaboradoras que hacen posible esta comunidad.</p>

            <div class="products-container">
                <?php
                $BBDD->consulta("SELECT * FROM SPONSORS");
                while ($fila = $BBDD->extraer_registro()) {
                ?>
                    <div class="product" data-name="p-<?php echo $fila['EMPRESA_ID']; ?>" style="background-color: <?php echo $influColor1; ?> !important;">
                        <img src="../../assets/media/sponsors_media/<?php echo $fila['EMPRESA_PICTURE']; ?>" alt="" style="max-width: 300px; max-height: 300px;">
                        <h3><?php echo $fila['EMPRESA_NAME']; ?></h3>
                    </div>
                <?php
                };
                ?>
            </div>

        </div>

        <div class="products-preview">
            <?php
            $BBDD->consulta("SELECT * FROM SPONSORS");
            while ($fila = $BBDD->extraer_registro()) {
            ?>
                <div class="preview" data-target="p-<?php echo $fila['EMPRESA_ID']; ?>" style="background-color: <?php echo $influColor1; ?> !important; border: 1px solid white;">
                    <i class="fas fa-times"></i>
                    <img src="../../assets/media/sponsors_media/<?php echo $fila['EMPRESA_PICTURE']; ?>" alt="" style="max-width: 300px; max-height: 300px;">
                    <h3><?php echo $fila['EMPRESA_NAME']; ?></h3>
                    <p><?php echo $fila['EMPRESA_INFO']; ?></p>
                    <?php
                    if ($fila['EMPRESA_URL'] != NULL) {
                    ?>
                        <div class="buttons">
                            <a href="<?php echo $fila['EMPRESA_URL']; ?>" class="buy" style="background-color: <?php echo $influColor2; ?>" data-section="patrocinadores" data-value="informacion">Más información</a>
                        </div>
                    <?php
                    };
                    ?>
                </div>
            <?php
            };
            ?>
        </div>
    </main>

    <footer class="bg-light text-center py-3">
        <span>&copy; <?php echo date('Y'); ?> - <?php echo $influName; ?></span>
    </footer>

    <script src="../../js/language.js"></script>
</body>

</html>