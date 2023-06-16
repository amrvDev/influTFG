<?php
require '../../../bd-conex.php';
include '../influencer-data.php';
session_start();

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
    <title><?php echo $influName; ?> | Promociones</title>
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
    <?php include 'user-header.php'; ?>

    <main class="container my-4">

        <form method="POST" action="" class="filtro">
            <input type="text" name="filtro" data-section="promociones" data-value="buscador" placeholder="Introduce el nombre del producto que desea buscar..." style="width: 40%; height: 30px;">
            <button type="submit" name="submitFiltro"style="width: 5%; height: 30px; border: 1px solid black;"><span><img src="../../assets/media/interface/search.png" alt="lupa" width="24px" height="24px"></span></button>
        </form>

        <div class="container">

            <h3 class="title" data-section="promociones" data-value="titulo"> Promociones </h3>
            <p style="text-align: center;" data-section="promociones" data-value="descripcion">En esta sección encontrarás las promociones disponbles este mes. El descuento está incluido en el precio.</p>

            <div class="products-container">
                <?php
                $BBDD->consulta("SELECT * FROM PRODUCTOS");
                $filtroAplicado = false; // Variable para verificar si se ha aplicado el filtro

                if (isset($_POST['submitFiltro'])) {
                    $filtroAplicado = true; // Se actualiza la variable a true si se ha enviado el formulario
                }

                while ($fila = $BBDD->extraer_registro()) {
                    if (!$filtroAplicado || stripos($fila['PRODUCTO_NAME'], $filtro) !== false) {
                ?>
                        <div class="product" data-name="p-<?php echo $fila['PRODUCTO_ID']; ?>" style="background-color: <?php echo $influColor1; ?> !important;">
                            <img src="../../assets/media/products_media/<?php echo $fila['PRODUCTO_PICTURE']; ?>" alt="" style="max-width: 300px; max-height: 300px;">
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
                    <img src="../../assets/media/products_media/<?php echo $fila['PRODUCTO_PICTURE']; ?>" alt="" style="max-width: 300px; max-height: 300px;">
                    <h3><?php echo $fila['PRODUCTO_NAME']; ?></h3>
                    <p><?php echo $fila['PRODUCTO_INFO']; ?></p>
                    <div class="price"><?php echo $fila['PRODUCTO_PRECIO'] + $fila['PRODUCTO_PRECIO'] * 0.1 . "€"; ?></div>
                    <div class="buttons">
                        <a href="user-carrito.php?action=add&id=<?php echo $fila['PRODUCTO_ID']; ?>" class="cart" data-section="promociones" data-value="carrito">Añadir al carrito</a>
                        <a href="https://www.paypal.com/es/home" style="background-color: <?php echo $influColor2; ?>;" data-section="promociones" data-value="pagar">Pagar YA</a>
                    </div>
                </div>
            <?php
            };
            ?>
        </div>

        <script src="../../js/language.js"></script>
    </main>

    <footer class="bg-light text-center py-3" style="position: fixed; left: 0; bottom: 0; width: 100%">
        <span>&copy; <?php echo date('Y'); ?> - <?php echo $influName; ?></span>
    </footer>
</body>

</html>