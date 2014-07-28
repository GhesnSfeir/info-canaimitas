<?php

include "../../clases/Usuario.php";

$email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
$nombreUsuario = filter_input(INPUT_GET, 'nombreUsuario', FILTER_SANITIZE_STRING);
$clave = filter_input(INPUT_GET, 'clave', FILTER_SANITIZE_STRING);

if (!empty($email) && !empty($nombreUsuario) && !empty($clave)) {
    
    $usuario = new Usuario($nombreUsuario, $email, $clave, 'gestor');
    
    if ($usuario->Guardar()) {
        
        echo "Usuario creado con éxito!";
        
    }
    else {
        
        echo "No se pudo agregar el usuario";
        
    }
}
else {
    
    echo "Error: datos inválidos.";
    
}




?>
