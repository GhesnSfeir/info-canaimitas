<?php

include_once "config/config.php";

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
    }
    
    public function cerrar() {
        
        mysql_close($this->conexion);
        
    }
    
    public function correrQuery($query) {
        
        $resultado = mysql_query($query);
        
        if (is_resource($resultado)){
            
            if (mysql_num_rows($resultado)) {

                $cursor = array();

                while ($registro = mysql_fetch_array($resultado, MYSQLI_ASSOC)){

                    array_push($cursor, $registro);
                    
                }

                return $cursor;
            }
            
        }
        return $resultado;
        
    }
    
    public function obtenerId() {
        
        return mysql_insert_id($this->conexion);
        
    }
}
?>
