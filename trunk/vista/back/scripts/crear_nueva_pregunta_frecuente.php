<?php

include_once "../clases/PreguntaFrecuente.php";

$pregunta = filter_input(INPUT_POST, 'pregunta', FILTER_SANITIZE_STRING);
$respuesta = filter_input(INPUT_POST, 'respuesta', FILTER_SANITIZE_STRING);

try {
    
    $preguntaFrecuente = new PreguntaFrecuente($pregunta, $respuesta);
    
    if ($preguntaFrecuente->guardar()) {
        
        echo "¡Enhorabuena!\n\nLa pregunta frecuente ha sido creada con éxito.";
        
    }
    else {
        
        echo "¡Error!\n\nNo se ha podido crear la pregunta frecuente.";
        
    }
}
catch (Exception $e) {
    
    echo $e->getMessage();
    
}

?>
