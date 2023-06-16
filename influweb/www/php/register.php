<?php
// REGISTRO DE USUARIOS DE LA WEB

require '../../bd-conex.php';
include 'influencer-data.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    $cpass = sha1($_POST['cpass']);
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);
    $admin = false;

    if (!empty($_POST['username']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['pass'])) {
        // CONDICIÓN -> SI EL USUARIO/EMAIL NO EXISTE YA

        $consulta = "INSERT INTO usuarios (USER_EMAIL, USER_PASSWORD, USER_NAME, USER_USER, USER_ADMIN) VALUES ('$email', '$pass', '$name', '$username', '$admin')";
        $BBDD->consulta($consulta);

        $num_filas_afectadas = $BBDD->filas_afectadas();
        if ($num_filas_afectadas > 0) {
            // $msg = 'Registro exitoso. Ve al inicio e inicia tu sesión.';
            header("Location: login.php");
        } else {
            // $err = 'Error al registrarse.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $influName; ?> | Registro</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <!-- estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/idiomas.css">
    <link rel="stylesheet" href="../css/validacion.css">
</head>

<body style="background-color: <?php echo $influBg; ?>; font-size: 1rem !important; font-family: 'Nunito', sans-serif; color: #444;">

    <?php include 'default-header.php'; ?>

    <main>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center mb-0" data-section="registro" data-value="registro de usuario">Registro de usuario</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="register.php" id="registrationForm">
                                <div class="form-group">
                                    <label for="username" data-section="registro" data-value="usuario">Usuario:</label>
                                    <input type="text" class="form-control" id="username" name="username" data-section="registro" data-value="pusuario" placeholder="Introduce tu nombre de usuario">
                                </div>
                                <div class="form-group">
                                    <label for="name" data-section="registro" data-value="nombre">Nombre y apellidos:</label>
                                    <input type="text" class="form-control" id="name" name="name" data-section="registro" data-value="pnombre" placeholder="Introduce tu nombre">
                                </div>
                                <div class="form-group">
                                    <label for="email" data-section="registro" data-value="correo electronico">Correo electrónico:</label>
                                    <input type="email" class="form-control" id="email" name="email" data-section="registro" data-value="pcorreo electronico" placeholder="Introduce tu correo electrónico">
                                </div>
                                <div class="form-group">
                                    <label for="password" data-section="registro" data-value="contraseña">Contraseña:</label>
                                    <input type="password" class="form-control" id="password" name="pass" data-section="registro" data-value="pcontraseña" placeholder="Introduce tu contraseña">
                                </div>
                                <div class="form-group">
                                    <label for="confirm-password" data-section="registro" data-value="confirmar contraseña">Confirmar contraseña:</label>
                                    <input type="password" class="form-control" id="confirm-password" name="cpass" data-section="registro" data-value="pconfirmar contraseña" placeholder="Confirma tu contraseña">
                                </div>
                                <div class="text-center">
                                    <input type="submit" id="submitButton" name="submit" class="btn btn-primary btn-block" data-section="registro" data-value="registrar" value="Registrarme">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-light text-center py-3" style="position: fixed; left: 0; bottom: 0; width: 100%">
        <span>&copy; <?php echo date('Y'); ?> - <?php if(isset($influName)){echo $influName;}  ?></span>
    </footer>

    <script src="../js/language_public.js"></script>
    <script src="../js/vregistro.js"></script>
</body>

</html>