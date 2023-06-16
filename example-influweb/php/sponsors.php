<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrocinadores</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- https://www.youtube.com/watch?v=OAPRagDr4pU -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/products-sponsors.css">
    <script src="../js/products-sponsors.js" defer></script>
</head>

<body style="font-size: 1rem !important;">
    <?php include 'default-header.php'; ?>

    <main class="container my-4">
        <div class="container">

            <h3 class="title" data-section="patrocinadores" data-value="titulo"> Patrocinadores </h3>
            <p style="text-align: center;" data-section="patrocinadores" data-value="descripcion">Empresas colaboradoras que hacen posible esta comunidad.</p>

            <div class="products-container">
                <div class="product" style="background-color: #6bfaa4 !important;" data-name="1">
                    <img src="../img/rolex.png" alt="" style="max-width: 280px; max-height: 280px;">
                    <h3>ROLEX</h3>
                </div>
                <div class="product" style="background-color: #6bfaa4 !important;" data-name="2">
                    <img src="../img/logo.png" alt="" style="max-width: 360px; max-height: 280px;">
                    <h3>ASTON MARTIN</h3>
                </div>
                <div class="product" style="background-color: #6bfaa4 !important;" data-name="2">
                    <img src="../img/logo.png" alt="" style="max-width: 360px; max-height: 280px;">
                    <h3>ASTON MARTIN</h3>
                </div>
                <div class="product" style="background-color: #6bfaa4 !important;" data-name="1">
                    <img src="../img/rolex.png" alt="" style="max-width: 280px; max-height: 280px;">
                    <h3>ROLEX</h3>
                </div>
            </div>

            <div class="products-preview">
                <div class="preview" data-target="1" style="background-color: #6bfaa4 !important; border: 1px solid white;">
                    <i class="fas fa-times"></i>
                    <img src="../img/rolex.png" alt="" style="max-width: 300px; max-height: 300px;">
                    <h3>ROLEX</h3>
                    <p>Rolex S. A. es una empresa suiza de relojes de pulsera de lujo y accesorios, creada tras la fusión de Montres Rolex SA y Rolex Industrie SA.</p>
                    <div class="buttons">
                    <a href="https://www.rolex.com/es/watchmaking/excellence-in-the-making/hallmarks-of-excellence?ef_id=EAIaIQobChMIoc3mqrbG_wIVVvlRCh3VCgT5EAAYASAAEgJSZvD_BwE:G:s&s_kwcid=AL!141!3!660610368632!e!!g!!rolex!8673933768!88111492558" class="buy" style="background-color: #292929; color: white;">Más información</a>
                    </div>
                </div>
                <div class="preview" data-target="2" style="background-color: #6bfaa4 !important; border: 1px solid white;">
                    <i class="fas fa-times"></i>
                    <img src="../img/logo.png" alt="" style="max-width: 300px; max-height: 300px;">
                    <h3>ASTON MARTIN</h3>
                    <p>Aston Martin Lagonda Global Holdings PLC es un fabricante británico de automóviles de lujo y alto rendimiento.</p>
                    <div class="buttons">
                    <a href="https://www.astonmartin.com/en/" class="buy" style="background-color: #292929; color: white;">Más información</a>
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