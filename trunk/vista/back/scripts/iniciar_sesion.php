<?php

session_start();

include_once "../../clases/Usuario.php";

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$clave = md5(filter_input(INPUT_POST, 'clave', FILTER_SANITIZE_STRING));

try {
    
    $usuario = Usuario::consultarPorEmail($email);
    
    if (is_null($usuario)) {
        
        echo "¡Error!\n\nNo existe una cuenta de usuario asociada al email especificado.";
        
    }
    else if ($usuario->getClave() == $clave and
            $usuario->getTipo() != "general") {
        
        if ($usuario->getActivo() == 1) {
            
            $_SESSION['UsuarioId'] = $usuario->getId();
            $_SESSION['UsuarioTipo'] = $usuario->getTipo();
            echo $usuario->getTipo();
            
        }
        else {
            
            echo "¡Error!\n\nLa cuenta de usuario \"$email\" se encuentra " .
                    "suspendida.";
            
        }
        
    }
    else {
        
        echo "¡Error!\n\nLos datos suministrados no coinciden.";
        
    }
    
}
catch (Exception $e) {
    
}
?>