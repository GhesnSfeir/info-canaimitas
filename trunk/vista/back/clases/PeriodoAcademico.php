<?php

include_once "Entidad.php";

class PeriodoAcademico extends Entidad{
    
    protected $nombre;
    protected $abreviacion;
    
    public function __construct($nombre = null, $abreviacion = null, $id = null) {
        
        $this->id = $id;
        $this->establecerNombre($nombre);
        $this->establecerAbreviacion($abreviacion);
        
    }
    
    public function obtenerNombre() { return $this->nombre; }
    
    public function obtenerAbreviacion() { return $this->abreviacion; }
    
    public function establecerNombre($nombre) {
        
        $mensajeError = "";

        if (empty($nombre)) {

            $mensajeError .= "Es necesario especificar un nombre para el 
                período académico";

        }
        else if (!is_string($nombre)) {
            
            $mensajeError .= "El nombre del período académico debe ser un 
                string";
            
        }
        else if (strlen($nombre) > 50){

            $mensajeError .= "- El nombre no debe exceder los 50 caracteres.\n";

        }
        else {
            
            $this->nombre = $nombre;
            return true;
            
        }
        
        throw new Exception($mensajeError);
    }
    
    public function establecerAbreviacion($abreviacion) {
        
        $mensajeError = "";

        if (empty($abreviacion)) {

            $mensajeError .= "Es necesario especificar una abreviación para el 
                período académico";

        }
        else if (!is_string($abreviacion)) {
            
            $mensajeError .= "La abreviación del período académico debe ser un 
                string";
            
        }
        else if (strlen($abreviacion) > 50){

            $mensajeError .= "La abreviación del período académico no debe 
                exceder los 50 caracteres";

        }
        else {
            
            $this->abreviacion = $abreviacion;
            return true;
            
        }
        
        throw new Exception($mensajeError);
        
    }
    
    public function Guardar() {
        
        $conexion = new ConexionBD();
        $conexion->abrir();
        
        if (isset($this->id)) { //Si el periodo academico ya esta en la base de datos
            
            if ($conexion->correrProcedimiento(SP_MODIFICAR_PERIODOS_ACADEMICOS, 
                array ($this->id, $this->nombre, $this->abreviacion))){

                $conexion->cerrar();
                return true;

            }
            
            return false;
            
        }
        else { //Si el usuario no esta en la base de datos

            if ($conexion->correrProcedimiento(SP_AGREGAR_PERIODOS_ACADEMICOS, 
                array ($this->nombre, $this->abreviacion))){
                
                $this->id = $conexion->obtenerId();
                $conexion->cerrar();
                return true;

            }
            
            return false;
            
        }
    }
    
    public static function consultarPorId($id) {
        
        $procedimiento = SP_CONSULTAR_PERIODOS_ACADEMICOS_ID;
        
        $conexion = new ConexionBD();
        $conexion->abrir();
        
        $resultado = $conexion->correrProcedimiento($procedimiento, array($id));
        $conexion->cerrar();
        
        $registro = $resultado[0];
        
        if ($registro) {
            
            return new PeriodoAcademico(
                    $registro['nombre'],
                    $registro['abreviacion'],
                    $registro['id']);
        }
        else {
            
            return false;
            
        }
    }
    
    public static function consultarTodos() {
        
        $procedimiento = SP_CONSULTAR_PERIODOS_ACADEMICOS;
        
        $conexion = new ConexionBD();
        $conexion->abrir();
        
        $resultado = $conexion->correrProcedimiento($procedimiento);
        $preguntas = array();
        $conexion->cerrar();
        
        
        foreach ($resultado as &$registro) {
            
            array_push($preguntas, new PeriodoAcademico(
                    $registro['nombre'], 
                    $registro['abreviacion'], 
                    $registro['id']));
            
        }
        
        return $preguntas;
    }
    
}
?>
