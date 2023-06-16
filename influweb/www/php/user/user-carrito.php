<?php
require '../../../bd-conex.php';
include '../influencer-data.php';
session_start();

// Agregar producto al carrito
if (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['id'])) {
    $productId = $_GET['id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Verificar si el producto ya está en el carrito
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity']++;
    } else {
        $_SESSION['cart'][$productId]['quantity'] = 1;
    }

    header('Location: user-products.php');
    exit();
}

// Eliminar producto del carrito
if (isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['id'])) {
    $productId = $_GET['id'];

    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }

    header('Location: user-carrito.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $influName; ?> | Compras</title>
    <link rel="stylesheet" href="../css/products-sponsors.css">
    <link rel="stylesheet" href="../../css/carrito.css">
    <link rel="stylesheet" href="../../css/idiomas.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body style="background: <?php echo $influBg; ?> !important; font-family: 'Nunito', sans-serif; color: #444;">
    <?php include 'user-header.php'; ?>

    <div class="container">
    <h1 style="text-align: center;" data-section="carrito" data-value="titulo">CARRITO DE COMPRA</h1>
    <a href="user-products.php" data-section="carrito" data-value="informacion1">Seguir comprando</a>

        <?php if (!empty($_SESSION['cart'])) : ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col" data-section="carrito" data-value="producto">Producto</th>
                        <th scope="col" data-section="carrito" data-value="precio">Precio</th>
                        <th scope="col" data-section="carrito" data-value="cantidad">Cantidad</th>
                        <th scope="col" data-section="carrito" data-value="total">Total</th>
                        <th scope="col" data-section="carrito" data-value="acciones">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['cart'] as $productId => $product) : ?>
                        <?php
                        $BBDD->consulta("SELECT * FROM PRODUCTOS WHERE PRODUCTO_ID = " . $productId);
                        while ($fila = $BBDD->extraer_registro()) {
                        ?>
                            <tr>
                                <td><?php echo $fila['PRODUCTO_NAME']; ?></td>
                                <td><?php echo $fila['PRODUCTO_PRECIO'] . "€"; ?></td>
                                <td><?php echo $product['quantity']; ?></td>
                                <td><?php
                                    echo $product['quantity'] * $fila['PRODUCTO_PRECIO'] . "€";
                                    $t = $product['quantity'] * $fila['PRODUCTO_PRECIO'];
                                    $total += $t;
                                    ?></td>
                                <td><a href="user-carrito.php?action=remove&id=<?php echo $productId; ?>">Eliminar</a></td>
                            </tr>
                    <?php }
                    endforeach; ?>
                </tbody>
            </table>

            <div class="container text-center">
                <p>TOTAL : <?php echo $total; ?> €</p>
                <a class="btn btn-primary" href="https://www.paypal.com/es/home" data-section="carrito" data-value="pagar">Pagar</a>
            </div>
        <?php else : ?>
            <p data-section="carrito" data-value="informacion2">No hay productos en el carrito.</p>
        <?php endif; ?>
    </div>

    <script src="../../js/language.js"></script>
</body>

</html>