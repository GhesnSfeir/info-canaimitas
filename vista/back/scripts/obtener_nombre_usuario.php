<?php

session_start();

echo isset($_SESSION['UsuarioNombre']) ? $_SESSION['UsuarioNombre'] : "";

?>