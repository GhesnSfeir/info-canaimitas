<?php

include_once "../../clases/Usuario.php";
//include_once "validaciones.php";

$email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
$nombreUsuario = filter_input(INPUT_GET, 'nombreUsuario', FILTER_SANITIZE_STRING);
$clave = filter_input(INPUT_GET, 'clave', FILTER_SANITIZE_STRING);

/*function validarDatos($email, $nombreUsuario, $clave) {
    
    $mensaje = "";
    $mensaje = $mensaje . validarEmail($email);
    $mensaje = $mensaje . validarNombreUsuario($nombreUsuario);
    $mensaje = $mensaje . validarClave($clave);
    
    return $mensaje;
}

$mensajeErrores = validarDatos($email, $nombreUsuario, $clave);

if ($mensajeErrores === "") {
    
    $usuario = new Usuario($nombreUsuario, $email, $clave, 'gestor');
    
    if ($usuario->Guardar()) {
        
        echo "¡Enhorabuena!\n\nEl usuario ha sido creado con éxito!";
        
    }
    else {
        
        echo "No se pudo agregar el usuario";
        
    }
}
else {
    
    echo $mensajeErrores;
    
}*/

try {
    
    $usuario = new Usuario($nombreUsuario, $email, $clave, 'gestor');
    
    if ($usuario->Guardar()) {
        
        echo "¡Enhorabuena!\n\nEl usuario ha sido creado con éxito!";
        
    }
    else {
        
        echo "No se pudo agregar el usuario";
        
    }
}
catch (Exception $e) {
    
    echo $e->getMessage();
    
}

?>
