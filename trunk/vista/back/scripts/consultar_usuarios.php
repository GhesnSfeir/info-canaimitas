<?php

include_once "../clases/TablaUsuarios.php";

$busqueda = filter_input(INPUT_POST, 'busqueda', FILTER_SANITIZE_STRING);

try {
    
    $tabla = new TablaUsuarios($busqueda, array("class" => "table table-hover"));
    echo $tabla->toString();
    
}
catch (Exception $e) {
    
    echo $e->getMessage();
    
}

?>