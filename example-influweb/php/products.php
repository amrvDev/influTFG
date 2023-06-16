<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promociones</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- https://www.youtube.com/watch?v=OAPRagDr4pU -->
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

        body {
            background-image: url(../img/bg.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body style="font-size: 1rem !important;">
    <?php include 'default-header.php'; ?>

    <main class="container my-4">

        <form method="POST" action="" class="filtro">
            <input type="text" name="filtro" placeholder="Introduce el nombre del producto que desea buscar..." style="width: 40%; height: 30px;" data-section="promociones" data-value="buscador">
            <button type="submit" style="width: 5%; height: 30px; border: 1px solid black; background-color: #292929; color: white;">Buscar</button>
        </form>

        <div class="container">
            <h3 class="title" data-section="promociones" data-value="titulo">Promociones</h3>
            <p style="text-align: center;" data-section="promociones" data-value="descripcion">En esta sección encontrarás las promociones disponbles este mes. El descuento está incluido en el precio.</p>

            <div class="products-container">
                <div class="product" style="background-color: #6bfaa4 !important;" data-name="1">
                    <img src="../img/reloj.png" alt="" style="max-width: 280px; max-height: 280px;">
                    <p class="price">500€</p>
                    <h3>PELUCO ROLEX</h3>
                </div>
                <div class="product" style="background-color: #6bfaa4 !important;" data-name="1">
                    <img src="../img/reloj.png" alt="" style="max-width: 280px; max-height: 280px;">
                    <p class="price">500€</p>
                    <h3>PELUCO ROLEX</h3>
                </div>
                <div class="product" style="background-color: #6bfaa4 !important;" data-name="1">
                    <img src="../img/reloj.png" alt="" style="max-width: 280px; max-height: 280px;">
                    <p class="price">500€</p>
                    <h3>PELUCO ROLEX</h3>
                </div>
                <div class="product" style="background-color: #6bfaa4 !important;" data-name="1">
                    <img src="../img/reloj.png" alt="" style="max-width: 280px; max-height: 280px;">
                    <p class="price">500€</p>
                    <h3>PELUCO ROLEX</h3>
                </div>
                <div class="product" style="background-color: #6bfaa4 !important;" data-name="1">
                    <img src="../img/reloj.png" alt="" style="max-width: 280px; max-height: 280px;">
                    <p class="price">500€</p>
                    <h3>PELUCO ROLEX</h3>
                </div>
                <div class="product" style="background-color: #6bfaa4 !important;" data-name="1">
                    <img src="../img/reloj.png" alt="" style="max-width: 280px; max-height: 280px;">
                    <p class="price">500€</p>
                    <h3>PELUCO ROLEX</h3>
                </div>
            </div>

            <div class="products-preview">
                <div class="preview" data-target="1" style="background-color: #6bfaa4 !important; border: 1px solid white;">
                    <i class="fas fa-times"></i>
                    <img src="../img/reloj.png" alt="" style="max-width: 300px; max-height: 300px;">
                    <h3>PELUCO ROLEX</h3>
                    <p>Rolex S. A. es una empresa suiza de relojes de pulsera de lujo y accesorios, creada tras la fusión de Montres Rolex SA y Rolex Industrie SA.</p>
                    <div class="buttons">
                    <a href="" class="buy" style="background-color: #292929; color: white;">Añadir al carrito</a>
                        <a href="" class="buy" style="background-color: grey; color: white;">Pagar YA</a>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <footer class="bg-light text-center py-3">
        <span>&copy; 2023 - FERNANDO ALONSO</span>
    </footer>

</body>

</html>