<?php

session_start();

include_once "../clases/Usuario.php";

$nombreNuevo = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
$claveNueva = md5(filter_input(INPUT_POST, 'clave', FILTER_SANITIZE_STRING));

try {
    
    $usuario = Usuario::consultarPorId($_SESSION['UsuarioId']);
    
    if (empty($usuario)) {
        
        echo "¡Error!\n\nNo se ha podido actualizar el usuario.";
        
    }
    else {
        
        $usuario->establecerNombre($nombreNuevo);
        $usuario->establecerClave($claveNueva);
        if ($usuario->guardar()) {
            
            $_SESSION['UsuarioNombre'] = $usuario->obtenerNombre();
            echo "¡Enhorabuena!\n\nEl usuario ha sido actualizado con éxito!";

        }
        else {

            echo "¡Error!\n\nNo se ha podido actualizar el usuario";

        }
        
    }
    
}
catch (Exception $e) {
    
}
?>
