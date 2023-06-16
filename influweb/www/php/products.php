<?php
// PRODUCTOS - USUARIO SIN LOGGEAR

require '../../bd-conex.php';
include 'influencer-data.php';

// FILTRADO DE PRODUCTOS
if (isset($_POST['submitFiltro'])) {
    $filtro = isset($_POST['filtro']) ? $_POST['filtro'] : '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TITLE VARIABLE -->
    <title><?php echo $influName; ?> | Promociones</title>
    <!-- ESTILOS -->
    <link rel="stylesheet" href="../css/idiomas.css">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/products-sponsors.css">
    <script src="../js/products-sponsors.js" defer></script>
    <style>
        .filtro {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .filtro input {
            margin-right: 1px;
            height: 30px;
            border: 1px solid black;
            padding-left: 5px;
        }

        .filtro button {
            height: 30px;
            border: 1px solid black;
        }
    </style>
</head>

<body style="background-color: <?php echo $influBg; ?>; font-size: 1rem !important;">
    <?php include 'default-header.php'; ?>

    <main class="container my-4">

        <form method="POST" action="" class="filtro">
            <input type="text" name="filtro" placeholder="Introduce el nombre del producto que desea buscar..." style="width: 40%; height: 30px;" data-section="promociones" data-value="buscador">
            <button type="submit" name="submitFiltro" style="width: 5%; height: 30px; border: 1px solid black; background-color: <?php echo $influColor2; ?>;"><span><img src="../assets/media/interface/search.png" alt="lupa" width="24px" height="24px"></span></button>
        </form>

        <div class="container">
            <h3 class="title" data-section="promociones" data-value="titulo">Promociones</h3>
            <p style="text-align: center;" data-section="promociones" data-value="descripcion">En esta sección encontrarás las promociones disponibles este mes. El descuento está incluido en el precio.</p>

            <div class="products-container">
                <!-- RECOGER Y MOSTRAR PRODUCTOS (SIN OPCIÓN A COMPRA) -->
                <?php
                // SE AÑADE PRECIO INVENTADO DE DESCUENTO Y PRECIO TOTAL APLICANDO EL 10% QUE NOS LLEVARÍAMOS NOSOTROS
                $BBDD->consulta("SELECT * FROM PRODUCTOS");
                $filtroAplicado = false; // Variable para verificar si se ha aplicado el filtro

                if (isset($_POST['submitFiltro'])) {
                    $filtroAplicado = true; // Se actualiza la variable a true si se ha enviado el formulario
                }

                while ($fila = $BBDD->extraer_registro()) {
                    if (!$filtroAplicado || stripos($fila['PRODUCTO_NAME'], $filtro) !== false) {
                ?>
                        <div class="product" data-name="p-<?php echo $fila['PRODUCTO_ID']; ?>" style="background-color: <?php echo $influColor1; ?> !important;">
                            <img src="../assets/media/products_media/<?php echo $fila['PRODUCTO_PICTURE']; ?>" alt="" style="max-width: 300px; max-height: 300px;">
                            <h3><?php echo $fila['PRODUCTO_NAME']; ?></h3>
                            <div class="price" style="color: red; font-size: 14px;"><i>Sin descuento: <?php echo $fila['PRODUCTO_PRECIO'] + $fila['PRODUCTO_PRECIO'] * 0.5 . "€"; ?></i></div>
                            <div class="price"><?php echo $fila['PRODUCTO_PRECIO'] + $fila['PRODUCTO_PRECIO'] * 0.1 . "€"; ?></div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>

        </div>

        <div class="products-preview">
            <?php
            $BBDD->consulta("SELECT * FROM PRODUCTOS");
            while ($fila = $BBDD->extraer_registro()) {
            ?>
                <div class="preview" data-target="p-<?php echo $fila['PRODUCTO_ID']; ?>" style="background-color: <?php echo $influColor1; ?> !important; border: 1px solid white;">
                    <i class="fas fa-times"></i>
                    <img src="../assets/media/products_media/<?php echo $fila['PRODUCTO_PICTURE']; ?>" alt="" style="max-width: 300px; max-height: 300px;">
                    <h3><?php echo $fila['PRODUCTO_NAME']; ?></h3>
                    <p><?php echo $fila['PRODUCTO_INFO']; ?></p>
                    <div class="price"><?php echo $fila['PRODUCTO_PRECIO'] + $fila['PRODUCTO_PRECIO'] * 0.1 . "€"; ?></div>
                    <div class="buttons">
                        <p style="color: red;" data-section="promociones" data-value="informacion">Si desea comprar este producto inicia sesión o regístrate.</p>
                    </div>
                </div>
            <?php
            };
            ?>
        </div>
    </main>

    <footer class="bg-light text-center py-3">
        <span>&copy; <?php echo date('Y'); ?> - <?php if(isset($influName)){echo $influName;}  ?></span>
    </footer>

    <script src="../js/language_public.js"></script>
</body>

</html>