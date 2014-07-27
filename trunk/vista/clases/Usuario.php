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
    
    public function cambiarEstado(){
        
        if ($this->activo === '1'){
            
            $this->activo = '0';
            
        }
        else {
            
            $this->activo = '1';
            
        }
        
    }
    
    public function Guardar() {
        
        if (isset($this->id)) {
            
            $query = "UPDATE usuarios SET nombre='$this->nombre', 
                        email='$this->email', clave='$this->clave', 
                        tipo='$this->tipo', activo='$this->activo'
                        WHERE id=$this->id";

            $conexion = new ConexionBD();
            $conexion->abrir();
            $conexion->correrQuery($query);

            $this->id = $conexion->obtenerId();

            $conexion->cerrar();
            
        }
        else {
            
            $query = "INSERT INTO usuarios (nombre, email, clave, tipo, activo) 
                        VALUES ('$this->nombre', '$this->email', '$this->clave',
                                '$this->tipo', '$this->activo')";

            $conexion = new ConexionBD();
            $conexion->abrir();
            $conexion->correrQuery($query);

            $this->id = $conexion->obtenerId();

            $conexion->cerrar();
        }
        
    }
    
}
?>
