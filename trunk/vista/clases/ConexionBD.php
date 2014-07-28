<?php

class ConexionBD {
    
    private $servidor;
    private $usuario;
    private $clave;
    private $baseDeDatos;
    private $conexion;
    private $seleccionBD;
    
    
    public function __construct(){
        
        $this->servidor = "localhost";
        $this->usuario = "root";
        $this->clave = "1234";
        $this->baseDeDatos = "infocanaimitas";
        
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
        
        return mysql_query($query);
        
    }
    
    public function obtenerId() {
        
        return mysql_insert_id($this->conexion);
        
    }
}
?>
