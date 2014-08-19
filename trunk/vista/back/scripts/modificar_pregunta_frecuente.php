<?php

session_start();

include_once "../clases/PreguntaFrecuente.php";

$idPregunta = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
$preguntaNueva = filter_input(INPUT_POST, 'pregunta', FILTER_SANITIZE_STRING);
$respuestaNueva = filter_input(INPUT_POST, 'respuesta', FILTER_SANITIZE_STRING);

try {
    
    $preguntaFrecuente = PreguntaFrecuente::consultarPorId($idPregunta);
    
    if (is_null($preguntaFrecuente)) {
        
        echo "¡Error!\n\nNo se ha podido actualizar la pregunta frecuente.";
        
    }
    else {
        
        $preguntaFrecuente->cambiarPregunta($preguntaNueva);
        $preguntaFrecuente->cambiarRespuesta($respuestaNueva);
        
        if ($preguntaFrecuente->Guardar()) {
            
            echo "¡Enhorabuena!\n\nLa pregunta frecuente ha sido actualizada con éxito.";

        }
        else {

            echo "¡Error!\n\nNo se ha podido actualizar la pregunta frecuente.";

        }
        
    }
    
}
catch (Exception $e) {
    
}
?>