<?php
// Se recogen datos influencer/empresa de personalización en caso de haber añadido ya las referencias desde adminPanel, en caso contrario se aplican valores default (else)
$BBDD->consulta("SELECT * FROM INFLUENCER");

if ($fila = $BBDD->extraer_registro()) {

    if ($fila['NOMBRE_INFLUENCER'] != NULL && $fila['NOMBRE_INFLUENCER'] != "") {
        $influName = $fila['NOMBRE_INFLUENCER'];
    } else {
        $influName = 'Influweb';
    }

    if ($fila['LOGO_INFLUENCER'] != NULL && $fila['LOGO_INFLUENCER'] != "") {
        $influLogo = $fila['LOGO_INFLUENCER'];
    } else {
        $influLogo = 'default-img.jpg';
    }

    if ($fila['SLOGAN_INFLUENCER'] != NULL && $fila['SLOGAN_INFLUENCER'] != "") {
        $influSlogan = $fila['SLOGAN_INFLUENCER'];
    } else {
        $influSlogan = '¡Bienvenidos!';
    }

    if ($fila['COLOR1_INFLUENCER'] != NULL && $fila['COLOR1_INFLUENCER'] != "") {
        $influColor1 = $fila['COLOR1_INFLUENCER'];
    } else {
        $influColor1 = '#FFFF';
    }

    if ($fila['COLOR2_INFLUENCER'] != NULL && $fila['COLOR2_INFLUENCER'] != "") {
        $influColor2 = $fila['COLOR2_INFLUENCER'];
    } else {
        $influColor2 = '#FFFF';
    }

    if ($fila['BACKGROUND_INFLUENCER'] != NULL && $fila['BACKGROUND_INFLUENCER'] != "") {
        $influBg = $fila['BACKGROUND_INFLUENCER'];
    } else {
        $influBg = '#eee';
    }
}
