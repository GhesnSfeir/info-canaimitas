<?php

session_start();

include_once "../clases/Usuario.php";

$nombreNuevo = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
$claveNueva = md5(filter_input(INPUT_POST, 'clave', FILTER_SANITIZE_STRING));

try {
    
    $usuario = Usuario::consultarPorId($_SESSION['UsuarioId']);
    
    if (is_null($usuario)) {
        
        echo "¡Error!\n\nNo se ha podido actualizar el usuario.";
        
    }
    else {
        
        $usuario->cambiarNombre($nombreNuevo);
        $usuario->cambiarClave($claveNueva);
        if ($usuario->Guardar()) {
            
            $_SESSION['UsuarioNombre'] = $usuario->getNombre();
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