<?php

session_start();

/*
unset($_SESSION['UsuarioId']);
unset($_SESSION['UsuarioTipo']);
*/
if (isset($_SESSION['UsuarioTipo'])) {
    
    echo $_SESSION['UsuarioTipo'];
    
}
else {
    
    echo "ninguno";
    
}

?>