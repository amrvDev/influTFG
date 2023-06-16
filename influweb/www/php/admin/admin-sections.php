<?php
require '../../../bd-conex.php';
session_start();

/* GENERAL */
if (isset($_POST['submit'])) {
    $slogan = $_POST['slogan'];
    $slogan = filter_var($slogan, FILTER_SANITIZE_STRING);

    $admin_image = $_FILES['image']['name'];
    $admin_image = filter_var($admin_image, FILTER_SANITIZE_STRING);
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../../assets/media/admin_media/' . $admin_image;
    $admin_image = $_FILES['image']['name'];
    $admin_image = filter_var($admin_image, FILTER_SANITIZE_STRING);
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../../assets/media/interface/' . $admin_image;

    // Obtener el color hexadecimal
    $fondoColor = $_POST['fondoColor'];
    $fondoColor = filter_var($fondoColor, FILTER_SANITIZE_STRING);
    $color1 = $_POST['color1'];
    $color1 = filter_var($color1, FILTER_SANITIZE_STRING);
    $color2 = $_POST['color2'];
    $color2 = filter_var($color2, FILTER_SANITIZE_STRING);

    // Redes sociales
    $facebook = $_POST['facebook'];
    $facebook = filter_var($facebook, FILTER_SANITIZE_STRING);
    $insta = $_POST['insta'];
    $insta = filter_var($insta, FILTER_SANITIZE_STRING);
    $twitter = $_POST['twitter'];
    $twitter = filter_var($twitter, FILTER_SANITIZE_STRING);


    // Variable para verificar si se ha realizado alguna actualización
    $actualizacion_realizada = false;

    if (!empty($slogan)) {
        $update_influencer = $BBDD->consulta("UPDATE `influencer` SET SLOGAN_INFLUENCER = '$slogan'");
        $actualizacion_realizada = true;
    }

    if (!empty($admin_image)) {
        if (move_uploaded_file($image_tmp_name, $image_folder)) {
            $update_profile = $BBDD->consulta("UPDATE `usuarios` SET PROFILE_PICTURE = '$admin_image' WHERE USER_ADMIN = 1");
            $update_influencer = $BBDD->consulta("UPDATE `influencer` SET LOGO_INFLUENCER = '$admin_image'");
            $actualizacion_realizada = true;
        } else {
            echo 'Error al mover la imagen.';
        }
    }

    if (!empty($facebook)) {
        $update_influencer = $BBDD->consulta("UPDATE `influencer` SET URL_FACEBOOK = '$facebook'");
        $actualizacion_realizada = true;
    }


    if (!empty($fondoColor)) {
        $update_influencer = $BBDD->consulta("UPDATE `influencer` SET BACKGROUND_INFLUENCER = '$fondoColor'");
        $actualizacion_realizada = true;
    }

    if (!empty($insta)) {
        $update_influencer = $BBDD->consulta("UPDATE `influencer` SET URL_INSTAGRAM = '$insta'");
        $actualizacion_realizada = true;
    }

    if (!empty($twitter)) {
        $update_influencer = $BBDD->consulta("UPDATE `influencer` SET URL_TWITTER = '$twitter'");
        $actualizacion_realizada = true;
    }

    if (!empty($color1)) {
        $update_influencer = $BBDD->consulta("UPDATE `influencer` SET COLOR1_INFLUENCER = '$color1'");
        $actualizacion_realizada = true;
    }

    if (!empty($color2)) {
        $update_influencer = $BBDD->consulta("UPDATE `influencer` SET COLOR2_INFLUENCER = '$color2'");
        $actualizacion_realizada = true;
    }

    header("Location: admin-sections.php");
}

/* SECCIONES */
if (isset($_POST['add_section'])) {
    $title = $_POST['title'];
    $title = filter_var($title, FILTER_SANITIZE_STRING);
    $text = $_POST['text'];
    $text = filter_var($text, FILTER_SANITIZE_STRING);
    $type = $_POST['type'];

    $BBDD->consulta("INSERT INTO `influencer_contenidos`(CONTENIDO_TITULO, CONTENIDO_TEXTO, CONTENIDO_TIPO) VALUES('$title', '$text', $type)");
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_product = $BBDD->consulta("DELETE FROM `influencer_contenidos` WHERE CONTENIDO_ID = '$delete_id'");
    header('location:admin-sections.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Personalizar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../../css/admin_style.css">

</head>

<body>

    <?php
    include 'admin-color.php';
    include 'admin-header.php';
    ?>

    <section class="add-products">

        <p style="text-align: center; font-size: 16px;"><i>Aquí podrás darle una estética principal a tu web.</i></p>
        <br><br><br>

        <h1 class="heading">PERSONALIZACIÓN PRINCIPAL</h1>

        <form action="" method="post" enctype="multipart/form-data" style="text-align: left; font-size: 16px">
            <h2 style="text-align: center;">TU INFORMACIÓN</h2>
            <label for="">Actualiza el logo principal. <i style="font-size: 12px;">Tamaño recomendable (200x200px)</i> : </label>
            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" style="font-size: 12px;">

            <label for="">Actualiza el slogan / subtítulo : </label>
            <input type="text" name="slogan" placeholder="Ej. ¡Destapa la felicidad!" maxlength="200" class="box" style="font-size: 12px;">
            <label for="">Actualizar redes sociales : </label><br><br>
            <img src="../../assets/media/interface/facebook.png" alt="facebook" width="24px">
            <input type="url" name="facebook" placeholder="Perfil de Facebook (URL)" class="box" oninput="this.value = this.value.replace(/\s/g, '')" style="font-size: 12px;">
            <br><br>
            <img src="../../assets/media/interface/instagram.png" alt="instagram" width="24px">
            <input type="url" name="insta" placeholder="Perfil de Instagram (URL)" class="box" oninput="this.value = this.value.replace(/\s/g, '')" style="font-size: 12px;">
            <br><br>
            <img src="../../assets/media/interface/twitter.png" alt="twitter" width="24px">
            <input type="url" name="twitter" placeholder="Perfil de Twitter (URL)" class="box" oninput="this.value = this.value.replace(/\s/g, '')" style="font-size: 12px;">
            <br><br><br>

            <input type="hidden" name="fondoColor" id="fondoColor">

            <div class="container">
                <h2 style="text-align: center;">COLORES GENERALES DE LA WEB</h2>
                <label for="">Color principal. <i style="font-size: 12px;">Recomendable color frío</i> : </label>
                <div class="wrapper" style="font-size: 12px;">
                    R <input type="range" min="0" max="255" value="0" id="red" oninput="colors()">
                </div>
                <div class="wrapper" style="font-size: 12px;">
                    G <input type="range" min="0" max="255" value="0" id="green" oninput="colors()">
                </div>
                <div class="wrapper" style="font-size: 12px;">
                    B <input type="range" min="0" max="255" value="0" id="blue" oninput="colors()">
                </div>
                <span id="output" style="font-size: 12px;">rgb(0, 0, 0)</span>
                <script>
                    function colors() {
                        var red = document.getElementById("red").value;
                        var green = document.getElementById("green").value;
                        var blue = document.getElementById("blue").value;
                        var color = '#' + ('0' + parseInt(red, 10).toString(16)).slice(-2) +
                            ('0' + parseInt(green, 10).toString(16)).slice(-2) +
                            ('0' + parseInt(blue, 10).toString(16)).slice(-2);

                        document.body.style.backgroundColor = 'rgb(' + red + ',' + green + ',' + blue + ')';
                        document.getElementById("output").innerHTML = 'rgb(' + red + ',' + green + ',' + blue + ')';
                        document.getElementById("fondoColor").value = color; // Asignar el valor hexadecimal al campo oculto
                    }
                </script>
            </div>
            <br>
            <label for="">Colores secundarios : </label>
            <br>
            <label for="" style="font-size: 12px;">Color 1 </label>
            <input type="color" name="color1" value="#0000" list /><br><br>
            <label for="" style="font-size: 12px;">Color 2 </label>
            <input type="color" name="color2" value="#0000" list /> <br><br>

            <input type="submit" value="Guardar cambios" class="btn" name="submit">
        </form>

        <div style="height: 1px; width: 100%; background-color: black; margin-top: 50px"></div>
        <br><br><br><br>

        <p style="text-align: center; font-size: 16px;"><i>Rellenando el siguiente formulario añadirás secciones informativas al inicio de la página. Dependiendo del tipo seleccionado aparecerá la información de una forma u otra.</i></p>
        <br><br><br>

        <h1 class="heading">Añadir secciones (Inicio)</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="flex">
                <div class="inputBox">
                    <span>Título*:</span>
                    <input type="text" class="box" required maxlength="100" placeholder="Título de la sección" name="title">
                </div>
                <div class="inputBox">
                    <span>Tipo sección*:</span>
                    <select name="type" class="box" required>
                        <option value=1>Principal izquierda</option>
                        <option value=2>Principal derecha</option>
                        <option value=3>Secundaria</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>Texto*:</span>
                    <textarea name="text" placeholder="Descripción de la sección" class="box" required maxlength="250" cols="30" rows="10"></textarea>
                </div>
            </div>

            <input type="submit" value="+" class="btn" name="add_section">
        </form>

    </section>

    <section class="show-products">
        <h1 class="heading">Secciones actuales</h1>
        <div class="box-container">
            <?php
            $BBDD->consulta("SELECT * FROM `influencer_contenidos`");
            if ($BBDD->numero_filas() > 0) {
                while ($fila = $BBDD->extraer_registro()) {
            ?>
                    <div class="box">
                        <div class="name"><?= $fila['CONTENIDO_TITULO']; ?></div>
                        <div class="details"><span><?= $fila['CONTENIDO_TEXTO']; ?></span></div>
                        <div class="price"><span><?= $fila['CONTENIDO_TIPO']; ?></span></div>
                        <div class="flex-btn">
                            <a href="admin-sections.php?delete=<?= $fila['CONTENIDO_ID']; ?>" class="delete-btn" onclick="return confirm('¿Quieres borrar esta sección?');">Borrar</a>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<p class="empty">NO HAY SECCIONES AÑADIDAS</p>';
            }
            ?>
        </div>
    </section>


    <script src="../../js/admin.js"></script>

</body>

</html>