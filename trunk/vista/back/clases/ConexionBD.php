<?php

include_once "../config/config.php";

class ConexionBD {
    
    private $servidor;
    private $usuario;
    private $clave;
    private $baseDeDatos;
    private $conexion;
    private $seleccionBD;
    
    
    public function __construct(){
        
        $this->servidor = DB_SERVER;
        $this->usuario = DB_USERNAME;
        $this->clave = DB_PASSWORD;
        $this->baseDeDatos = DB_DATABASE;
    }
    
    public function abrir(){
        
        $this->conexion = mysql_connect($this->servidor, $this->usuario, $this->clave); 
        
        if(!$this->conexion) { 
            
            die("No se pudo conectar a la base de datos: " . mysql_error());
            
        }
        else {
            
            $this->seleccionBD = mysql_select_db($this->baseDeDatos, $this->conexion); 
            
            if (!$this->seleccionBD) { 
                
                die("No existe la base de datos especificada: " . mysql_error()); 
                
            }
        }
        
        mysql_query("SET NAMES UTF8");
    }
    
    public function cerrar() {
        
        mysql_close($this->conexion);
        
    }
    
    public function correrQuery($query) {
        
        $this->abrir();
        $resultado = mysql_query($query);
        
        if (is_resource($resultado) and mysql_num_rows($resultado) > 0){
            
            $cursor = array();

            while ($registro = mysql_fetch_array($resultado, MYSQLI_ASSOC)){

                array_push($cursor, $registro);

            }

            $this->cerrar();
            return $cursor;
        }
        
        $this->cerrar();
        return $resultado;
        
    }
    
    public function obtenerId() {
        
        return mysql_insert_id($this->conexion);
        
    }
    
    public function correrProcedimiento($procedimiento, $argumentos = null) {
        
        if (empty($argumentos)) {
            
            $query = "CALL $procedimiento()";
            
        }
        else if (is_array($argumentos)) {
            
            $argumentosTransformados = array();
            
            foreach ($argumentos as $valor) {
                
                array_push($argumentosTransformados, 
                        is_string($valor) ? "'$valor'" : $valor);
                
            }
            
            $query = "CALL $procedimiento(" . 
                    implode(",", $argumentosTransformados) . ")";
            
        }
        
        return $this->correrQuery($query);
        
    }
    
    public function correrFuncion($funcion, $argumentos = null) {
        
        if (empty($argumentos)) {
            
            $query = "SELECT $funcion()";
            
        }
        else if (is_array($argumentos)) {
            
            $argumentosTransformados = array();
            
            foreach ($argumentos as $valor) {
                
                array_push($argumentosTransformados, 
                        is_string($valor) ? "'$valor'" : $valor);
                
            }
            
            $query = "SELECT $funcion(" . 
                    implode(",", $argumentosTransformados) . ")";
            
        }
        
        return $this->correrQuery($query);
        
    }
}
?>
