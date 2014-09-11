<?php

include_once "Entidad.php";

class PeriodoAcademico extends Entidad{
    
    const SP_CONSULTAR_TODOS = SP_CONSULTAR_PERIODOS_ACADEMICOS;
    const SP_CONSULTAR_POR_ID = SP_CONSULTAR_PERIODO_ACADEMICO_ID;
    const SP_AGREGAR = SP_AGREGAR_PERIODO_ACADEMICO;
    const SP_MODIFICAR = SP_MODIFICAR_PERIODO_ACADEMICO;
    const SP_ELIMINAR = SP_ELIMINAR_PERIODO_ACADEMICO;
    
    protected $nombre;
    protected $abreviacion;
    
    protected static function armarDesdeRegistro($registro) {
        
        $periodoAcademico = new PeriodoAcademico();
        $periodoAcademico->establecerId($registro['id'])
            ->establecerNombre($registro['nombre'])
            ->establecerAbreviacion($registro['abreviacion']);
        
        return $periodoAcademico;
    }
    
    protected function obtenerParametrosSPAgregar() {
        
        return array($this->nombre, $this->abreviacion);
        
    }
    
    protected function obtenerParametrosSPModificar() {
        
        return array($this->id, $this->nombre, $this->abreviacion);
        
    }
    
    protected function validarTodo() {
        
        $this->validarNombre($this->nombre);
        $this->validarAbreviacion($this->abreviacion);
        
    }
    
    public function __construct($nombre = null, $abreviacion = null) {
        
        if (!empty($nombre)) $this->establecerNombre($nombre);
        if (!empty($abreviacion)) $this->establecerAbreviacion($abreviacion);
        
    }
    
    public function obtenerNombre() { return $this->nombre; }
    
    public function obtenerAbreviacion() { return $this->abreviacion; }
    
    public function establecerNombre($nombre) {

        $this->validarNombre($nombre);
        $this->nombre = $nombre;
        return $this;
    }
    
    public function establecerAbreviacion($abreviacion) {

        $this->validarAbreviacion($abreviacion);
        $this->abreviacion = $abreviacion;
        return $this;
    }
    
    private function validarNombre($nombre) {
        
        if (empty($nombre)) 
            throw new Exception("Es necesario especificar un nombre para el 
                período académico");

        else if (!is_string($nombre)) 
            throw new Exception("El nombre del período académico debe ser un 
                string");
        
        else if (strlen($nombre) > 50)
            throw new Exception("El nombre no debe exceder los 50 caracteres.");
        
        return true;
        
    }
    
    private function validarAbreviacion($abreviacion) {
        
        if (empty($abreviacion))
            throw new Exception("Es necesario especificar una abreviación para 
                el período académico");

        else if (!is_string($abreviacion))
            throw new Exception("La abreviación del período académico debe ser 
                un string");
            
        else if (strlen($abreviacion) > 20)
            throw new Exception("La abreviación del período académico no debe 
                exceder los 20 caracteres");
        
        return true;
        
    }
    /*public function Guardar() {
        
        $conexion = new ConexionBD();
        $conexion->abrir();
        
        if (isset($this->id)) { //Si el periodo academico ya esta en la base de datos
            
            if ($conexion->correrProcedimiento(SP_MODIFICAR_PERIODO_ACADEMICO, 
                array ($this->id, $this->nombre, $this->abreviacion))){

                $conexion->cerrar();
                return true;

            }
            
            return false;
            
        }
        else { //Si el periodo academico no esta en la base de datos

            if ($conexion->correrProcedimiento(SP_AGREGAR_PERIODO_ACADEMICO, 
                array ($this->nombre, $this->abreviacion))){
                
                $this->id = $conexion->obtenerId();
                $conexion->cerrar();
                return true;

            }
            
            return false;
            
        }
    }
    
    public static function consultarPorId($id) {
        
        $procedimiento = SP_CONSULTAR_PERIODO_ACADEMICO_ID;
        //$query = "SELECT * FROM periodos_academicos WHERE id=$id";
        
        $conexion = new ConexionBD();
        $conexion->abrir();
        
        $resultado = $conexion->correrProcedimiento($procedimiento, array($id));
        //$resultado = $conexion->correrQuery($query);
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
    }*/
    
}
?>
