<?php

include "ConexionBD.php";

class Usuario {
    
    private $id;
    private $nombre;
    private $email;
    private $clave;
    private $tipo;
    private $activo;
    
    
    public function __construct($nombre, $email, $clave, $tipo, $id = null) {
        
        $this->nombre = $nombre;
        $this->email = $email;
        $this->clave = $clave;
        $this->tipo = $tipo;
        $this->activo = '1';
        $this->id = $id;
        
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
        
        if (isset($this->id)) { //Si el usuario ya esta en la base de datos
            
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
        else { //Si el usuario no esta en la base de datos
            
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
    
    public static function consultarPorId($id) {
        
        $query = "SELECT * from usuarios where id=$id";
        
        $conexion = new ConexionBD();
        $conexion->abrir();
        
        $resultado = $conexion->correrQuery($query);
        
        $registro = mysql_fetch_array($resultado);
        
        if ($registro) {
            
            return new Usuario(
                    $registro['nombre'],
                    $registro['email'],
                    $registro['clave'],
                    $registro['tipo'],
                    $registro['id']);
        }
        else {
            
            return $registro;
            
        }
        
        $conexion->cerrar();
    }
    
    public static function consultarTodos() {
        
        $query = "SELECT * from usuarios";
        
        $conexion = new ConexionBD();
        $conexion->abrir();
        
        $resultado = $conexion->correrQuery($query);
        
        $numeroRegistros = mysql_num_rows($resultado);
        
        if ($numeroRegistros) {
            
            $usuarios = array();
            
            while ($registro = mysql_fetch_array($resultado)){
                
                array_push($usuarios, new Usuario(
                    $registro['nombre'],
                    $registro['email'],
                    $registro['clave'],
                    $registro['tipo'],
                    $registro['id']));
                
            }
            
            return $usuarios;
        }
        else {
            
            return false;
            
        }
        
        $conexion->cerrar();
    }
    
}
?>
