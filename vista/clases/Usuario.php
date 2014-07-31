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
        
        $mensajeErrores = "";
        $mensajeErrores = $mensajeErrores . $this->validarNombreUsuario($nombre);
        $mensajeErrores = $mensajeErrores . $this->validarEmail($email);
        $mensajeErrores = $mensajeErrores . $this->validarClave($clave);
        
        if ($mensajeErrores == "") {
            
            $this->nombre = $nombre;
            $this->email = $email;
            $this->clave = $clave;
            $this->tipo = $tipo;
            $this->activo = '1';
            $this->id = $id;
            
        }
        else {
            
            throw new Exception($mensajeErrores);
            
        }
        
        
        
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
            
            if ($conexion->correrQuery($query)){
             
                $this->id = $conexion->obtenerId();
                $conexion->cerrar();
                return true;
                
            }
            
            return false;
            
        }
        else { //Si el usuario no esta en la base de datos
            
            $query = "INSERT INTO usuarios (nombre, email, clave, tipo, activo) 
                        VALUES ('$this->nombre', '$this->email', '$this->clave',
                                '$this->tipo', '$this->activo')";

            $conexion = new ConexionBD();
            $conexion->abrir();
            
            if ($conexion->correrQuery($query)){
                
                $this->id = $conexion->obtenerId();
                $conexion->cerrar();
                return true;
            
            }

            return false;
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
        $usuarios = array();
        
        foreach ($resultado as &$registro) {
            
            array_push($usuarios, new Usuario($registro['nombre'], 
                    $registro['email'], 
                    $registro['clave'], 
                    $registro['tipo'], 
                    $registro['id']));
            
        }
        
        $conexion->cerrar();
        
        return $usuarios;
    }
    
    private function existeEmail($email) {
        
        $query = "SELECT COUNT(*) cuenta FROM usuarios WHERE email='$email'";
        
        $conexion = new ConexionBD();
        $conexion->abrir();
        
        $resultado = $conexion->correrQuery($query);
        
        $conexion->cerrar();
        
        if ($resultado[0]['cuenta'] == 1) {
            
            return true;
            
        }
        else {
            
            return false;
            
        }
    }
    
    private function validarEmail($email) {

        $mensaje = "";

        if (empty($email)) {

            return "- Es necesario especificar un email.\n";

        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

            $mensaje = $mensaje . "- El email no tiene un formato válido.\n";

        }

        if (strlen($email) > 100){

            $mensaje = $mensaje . "- El email no debe exceder los 100 
                    caracteres.\n";

        }

        if ($this->existeEmail($email)){

            $mensaje = $mensaje . "- El email especificado ya existe.\n";

        }

        return $mensaje;
    }
    
    private function validarNombreUsuario($nombreUsuario) {
    
        $mensaje = "";

        if (empty($nombreUsuario)) {

            return "- Es necesario especificar un nombre de usuario.\n";

        }

        if (strlen($nombreUsuario) > 100) {

            $mensaje = $mensaje . "- El nombre de usuario no debe exceder los 100 
                    caracteres.\n";

        }

        return $mensaje;
    }
    
    private function validarClave($clave) {
    
        if (empty($clave)){

            return "- Es necesario especificar una clave.\n";

        }
        else {

            return "";

        }
    }
    
    
}
?>
