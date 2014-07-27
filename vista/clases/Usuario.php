<?php

include "ConexionBD.php";

class Usuario {
    
    private $id;
    private $nombre;
    private $email;
    private $clave;
    private $tipo;
    private $activo;
    
    public function __construct($nombre, $email, $clave, $tipo) {
        
        $this->nombre = $nombre;
        $this->email = $email;
        $this->clave = $clave;
        $this->tipo = $tipo;
        $this->activo = '1';
        
    }
    
    public function Guardar() {
        
        $query = "INSERT INTO usuarios (nombre, email, clave, tipo, activo) 
                    VALUES ('$this->nombre', '$this->email', '$this->clave',
                            '$this->tipo', '$this->activo')";
        
        $conexion = new ConexionBD();
        $conexion->abrir();
        $conexion->correrQuery($query);
        $conexion->cerrar();
        
    }
    
}
?>
