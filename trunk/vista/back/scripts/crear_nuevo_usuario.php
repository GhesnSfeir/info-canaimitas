<?php

include_once "../../clases/Usuario.php";

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$nombreUsuario = filter_input(INPUT_POST, 'nombreUsuario', FILTER_SANITIZE_STRING);
$clave = md5(filter_input(INPUT_POST, 'clave', FILTER_SANITIZE_STRING));

try {
    
    $usuario = new Usuario($nombreUsuario, $email, $clave, 'gestor');
    
    if ($usuario->Guardar()) {
        
        echo "¡Enhorabuena!\n\nEl usuario ha sido creado con éxito!";
        
    }
    else {
        
        echo "¡Error!\n\nNo se ha podido agregar el usuario";
        
    }
}
catch (Exception $e) {
    
    echo $e->getMessage();
    
}

?>
