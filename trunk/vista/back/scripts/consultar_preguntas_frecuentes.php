<?php

include_once "../clases/TablaPreguntasFrecuentes.php";

$busqueda = filter_input(INPUT_POST, 'busqueda', FILTER_SANITIZE_STRING);

try {
    
    $tabla = new TablaPreguntasFrecuentes($busqueda, array("class" => "table table-hover"));
    echo $tabla->toString();
    
}
catch (Exception $e) {
    
    echo $e->getMessage();
    
}

?>