<?php

include_once "Entidad.php";
include_once "ConexionBD.php";

class Asignatura extends Entidad {
    
    const SP_CONSULTAR_TODOS = SP_CONSULTAR_ASIGNATURAS;
    const SP_CONSULTAR_POR_ID = SP_CONSULTAR_ASIGNATURA_ID;
    const SP_AGREGAR = SP_AGREGAR_ASIGNATURA;
    const SP_MODIFICAR = SP_MODIFICAR_ASIGNATURA;
    const SP_ELIMINAR = SP_ELIMINAR_ASIGNATURA;
    
    protected $nombre;
    
    protected static function armarDesdeRegistro($registro) {
        
        $asignatura = new Asignatura();
        $asignatura->establecerId($registro['id'])
            ->establecerNombre($registro['nombre']);
        
        return $asignatura;
    }
    
    protected function obtenerParametrosSPAgregar() {
        
        return array($this->nombre);
        
    }
    
    protected function obtenerParametrosSPModificar() {
        
        return array($this->id, $this->nombre);
        
    }
    
    protected function validarTodo() {
        
        $this->validarNombre($this->nombre);
        
    }
    
    public function __construct($nombre = null) {
        
        if (!empty($nombre)) $this->establecerNombre($nombre);
        
    }
    
    public function obtenerNombre() {
        
        return $this->nombre;
        
    }
    
    public function establecerNombre($nombre) {
        
        $this->validarNombre($nombre);
        $this->nombre = $nombre;
        return $this;
        
    }
    
    private function validarNombre($nombre) {

        if (empty($nombre))
            throw new Exception("EL nombre de la asignatura no puede estar 
                vacío");

        else if (!is_string($nombre))
            throw new Exception("El nombre de una asignatura debe ser una 
                cadena de caracteres");

        else if (strlen($nombre) > 100)
            throw new Exception("El nombre de una asignatura debe tener máximo 
                100 caracteres");

        return true;

    }
    
}
?>
