<?php

// Realiza la consulta para obtener el color de fondo de la base de datos
$query = "SELECT BACKGROUND_INFLUENCER FROM influencer";
$result = $BBDD->consulta($query);

// Verifica si se obtuvo un resultado
if ($BBDD->numero_filas($result) > 0) {
    $row = $BBDD->extraer_registro($result);
    $fondoColor = $row['BACKGROUND_INFLUENCER'];

    // Establece el color de fondo en el estilo CSS
    echo '<style>body { background-color: ' . $fondoColor . '; }</style>';
}
?>