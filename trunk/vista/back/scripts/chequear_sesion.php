<?php

session_start();

if (isset($_SESSION['UsuarioTipo'])) {
    
    echo $_SESSION['UsuarioTipo'];
    
}
else {
    
    echo "ninguno";
    
}

?>