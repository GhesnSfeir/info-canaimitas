<?php

include_once "Entidad.php";

class Tema extends Entidad {

    const SP_CONSULTAR_TODOS = SP_CONSULTAR_TEMAS;
    const SP_CONSULTAR_POR_ID = SP_CONSULTAR_TEMA_ID;
    const SP_AGREGAR = SP_AGREGAR_TEMA;
    const SP_MODIFICAR = SP_MODIFICAR_TEMA;
    const SP_ELIMINAR = SP_ELIMINAR_TEMA;
    
    protected $nombre;
    
    protected static function armarDesdeRegistro($registro) {
        
        $tema = new Tema();
        $tema->establecerId($registro['id'])
            ->establecerNombre($registro['nombre']);
        
        return $tema;
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
    
    public function obtenerNombre() { return $this->nombre; }
    
    public function establecerNombre($nombre) {
        
        $this->validarNombre($nombre);
        $this->nombre = $nombre;
        return $this;
        
    }
    
    private function validarNombre($nombre) {

        if (empty($nombre))
            throw new Exception("EL nombre del tema no puede estar vacío");

        else if (!is_string($nombre))
            throw new Exception("El nombre del tema debe ser una cadena de 
                caracteres");

        else if (strlen($nombre) > 1000)
            throw new Exception("El nombre del tema debe tener máximo 1000 
                caracteres");

        return true;

    }
}

?>
