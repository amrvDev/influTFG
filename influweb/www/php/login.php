<?php
// LOGIN DE LA WEB

require '../../bd-conex.php';
include 'influencer-data.php';
session_start();

// Verificar si el formulario ha sido enviado
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $password = sha1($_POST['password']);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    // Consultar la base de datos para verificar si el email y la contraseña coinciden
    $BBDD->consulta("SELECT * FROM USUARIOS WHERE USER_EMAIL='$email' AND USER_PASSWORD='$password'");
    $num_filas = $BBDD->numero_filas();

    if ($num_filas == 1) {
        // Si las credenciales son correctas, verificar si el usuario es administrador
        $fila = $BBDD->extraer_registro();
        $_SESSION['USER_ID'] = $fila['USER_ID'];

        if ($fila['USER_ADMIN'] == 0) {
            // Usuario no administrador, iniciar sesión y redirigir a index de usuario registrado
            header("Location: user/user-index.php");
        } else if ($fila['USER_ADMIN'] == 1) {
            // Usuario administrador, redirigir a la página de administrador
            if ($fila['USER_NAME'] == null) {
                header("Location: admin/admin-firstime.php");
            } else {
                header("Location: admin/admin-dashboard.php");
            }
        }
        exit();
    } else {
        // Si las credenciales son incorrectas, mostrar un mensaje de error
        $err = "El email o la contraseña son incorrectos.";
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $influName; ?> | Inicio de sesión</title>
        <link rel="stylesheet" href="css/index.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600&display=swap" rel="stylesheet">
        <!-- estilos de Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/idiomas.css">
    </head>

<body style="background-color: <?php echo $influBg; ?>; font-size: 1rem !important; font-family: 'Nunito', sans-serif; color: #444;">
    <?php include 'default-header.php'; ?>

    <main>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center" data-section="inicio de sesion" data-value="iniciar sesion l">Iniciar sesión</h4>
                        </div>
                        <div class="card-body">
                            <!-- Agregar el mensaje de error si existe -->
                            <?php if (isset($err)) { ?>
                                <div class="alert alert-danger" role="alert" data-section="inicio de sesion" data-value="error">
                                    <?php echo $err; ?>
                                </div>
                            <?php } ?>
                            <form method="post" action="#" id="loginForm">
                                <div class="form-group">
                                    <label for="email" data-section="inicio de sesion" data-value="correo electronico">Correo electrónico:</label>
                                    <input type="email" class="form-control" id="email" name="email" data-section="inicio de sesion" data-value="pcorreo electronico" placeholder="Introduce tu correo electrónico" required>
                                </div>
                                <div class="form-group">
                                    <label for="password" data-section="inicio de sesion" data-value="contraseña">Contraseña:</label>
                                    <input type="password" class="form-control" id="password" name="password" data-section="inicio de sesion" data-value="pcontraseña" placeholder="Introduce tu contraseña" required>
                                </div>
                                <button type="submit" id="submitButton" class="btn btn-primary btn-block" name="submit" data-section="inicio de sesion" data-value="iniciar sesion b">Iniciar sesión</button>
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
</body>

</html>