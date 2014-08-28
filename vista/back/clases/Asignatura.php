<?php

include_once "Entidad.php";
include_once "ConexionBD.php";

class Asignatura extends Entidad {
    
    protected $nombre;
    
    public function __construct($nombre, $id = null) {
        
        $this->establecerNombre($nombre);
        
    }
    
    public function obtenerNombre() {
        
        return $this->nombre;
        
    }
    
    public function establecerNombre($nombre) {
        
        if (!is_string($nombre)) {
            
            throw new Exception("El nombre de una asignatura debe ser un string");
            
        }
        else if (empty($nombre)) {
            
            throw new Exception("Es necesario especificar un nombre para la asignatura");
            
        }
        else if (strlen($nombre) > 100) {
            
            throw new Exception("El nombre de una asignatura no puede exceder los 100 caracteres");
            
        }
            
        $this->nombre = $nombre;
        return true;
            
    }
    
    public function guardar() {
        
        $conexion = new ConexionBD();
        $conexion->abrir();
        
        if (isset($this->id)) {//Si ya la asignatura está en la base de datos
            
            $procedimiento = SP_MODIFICAR_ASIGNATURAS;
            
            
        }
        
    }
    
}
?>
