<?php

include_once "../clases/Usuario.php";

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

try {
    
    $usuario = Usuario::consultarPorEmail($email);
    $usuario->cambiarEstado();
    if ($usuario->Guardar()) {
        
        echo "¡Enhorabuena!\n\nEl usuario \"$email\" ha sido actualizado con 
            éxito!";
        
    }
    else {
        
        echo "¡Error!\n\nNo se ha podido actualizar el usuario \"$email\"";
        
    }
    
}
catch (Exception $e) {
    
    echo $e->getMessage();
    
}

?>