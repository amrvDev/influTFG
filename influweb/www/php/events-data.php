<?php
require '../../bd-conex.php';

// Realizar la consulta SQL para obtener los eventos de la base de datos
$BBDD->consulta("SELECT EVENTO_ID, EVENTO_TEXT, EVENTO_DATE_INI, EVENTO_DATE_FIN FROM EVENTOS_CALENDARIO");

// Construir un array con los datos de los eventos
$data = array();
while ($row = $BBDD->extraer_registro()) {
    $data[] = array(
        'id' => $row['EVENTO_ID'],
        'text' => $row['EVENTO_TEXT'],
        'startDate' => $row['EVENTO_DATE_INI'],
        'endDate' => $row['EVENTO_DATE_FIN'],
    );
}

// Convertir el array a formato JSON y enviarlo como respuesta
header('Content-Type: application/json');
echo json_encode($data);

// Cerrar la conexión (si es necesario)
// $BBDD->descriptor->close();
?>
