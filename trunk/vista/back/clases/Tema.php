<?php

include_once "Entidad.php";

class Tema extends Entidad {

    protected $nombre;
    
    public function __construct($nombre = null) {
    
        if (!is_null($nombre)) $this->establecerNombre($nombre);
    
    }
    
    public function obtenerNombre() { return $this->nombre; }
    
    public function establecerNombre($nombre) {
    
        if(empty($nombre)) {
        
            throw new Exception("Es necesario especificar un nombre para un Tema");
        
        }
        else if(!is_string($nombre)) {
            
            throw new Exception("El nombre del tema debe ser un string");
            
        }
        else if(strlen($nombre) > 1000) {
            
            throw new Exception("El nombre del tema debe tener máximo 1000 " .
                    "caracteres");
        
        }
        
        $this->nombre = $nombre;
        return $this;
    
    }

    public function guardar() {

        $conexion = new ConexionBD();
        $conexion->abrir();
    
        if(isset($this->id)) {//Si el Tema existe en la base de datos
        
            if($conexion->correrProcedimiento(SP_MODIFICAR_TEMA, 
                array($this->id, $this->nombre))) {

	        $conexion->cerrar();
	        return true;

	    }

            return false;
        
        }
        else {

            $id = $conexion->correrProcedimiento(SP_AGREGAR_TEMA,
                    array($this->nombre));

            if ($id > 0) {

                $this->id = $id;
                $conexion->cerrar();
                return true;

	    }
            $conexion->cerrar();
            return false;

        }
    }

    public static function consultarPorId($id) {

        $procedimiento = SP_CONSULTAR_TEMA_ID;

        $conexion = new ConexionBD();
        $conexion->abrir();

        $resultado = $conexion->correrProcedimiento($procedimiento, array($id));

        $conexion->cerrar();

        $registro = $resultado[0];

        if ($registro) {

            $tema = new Tema();
            $tema
                ->establecerNombre($registro["nombre"])
                ->establecerId($registro["id"]);
            
            return $tema;

        }

        return false;

    }
}

?>
