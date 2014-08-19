<?php

include_once "ConexionBD.php";

class Usuario {
    
    private $id;
    private $nombre;
    private $email;
    private $clave;
    private $tipo;
    private $activo;
    
    
    public function __construct($nombre, $email, $clave, $tipo, $activo = 1, $id = null) {
        
        $this->nombre = $nombre;
        $this->email = $email;
        $this->clave = $clave;
        $this->tipo = $tipo;
        $this->activo = $activo;
        $this->id = $id;
            
    }
    
    public function getId() {
        
        return $this->id;
        
    }
    
    public function getNombre() {
        
        return $this->nombre;
        
    }
    
    public function getEmail() {
        
        return $this->email;
        
    }
    
    public function getClave() {
        
        return $this->clave;
        
    }
    
    public function getTipo() {
        
        return $this->tipo;
        
    }
    
    public function getActivo() {
        
        return $this->activo;
        
    }
    
    public function toArray() {
        
        $arreglo = array(
                "id" => $this->id,
                "nombre" => $this->nombre,
                "email" => $this->email,
                "clave" => $this->clave,
                "tipo" => $this->tipo,
                "activo" => $this->activo);
        
        return $arreglo;
    }
    
    public function toJSON() {
        
        return json_encode($this->obtenerArreglo());
        
    }
    
    public function cambiarClave($claveNueva) {
        
        $mensajeErrores = $this->validarClave($claveNueva);
        
        if ($mensajeErrores == "") {
            
            $this->clave = $claveNueva;
            
        }
        else {
            
            throw new Exception($mensajeErrores);
        
        }
        
        return true;
    }
    
    public function cambiarEstado(){
        
        if ($this->activo === '1'){
            
            $this->activo = '0';
            
        }
        else {
            
            $this->activo = '1';
            
        }
        
    }
    
    public function cambiarNombre($nombreNuevo) {
        
        $mensajeErrores = $this->validarNombreUsuario($nombreNuevo);
        
        if ($mensajeErrores == "") {
            
            $this->nombre = $nombreNuevo;
            
        }
        else {
            
            throw new Exception($mensajeErrores);
        
        }
        
        return true;
    }
    
    public function Guardar() {
        
        $mensajeErrores = "";
        $mensajeErrores = $mensajeErrores . $this->validarNombreUsuario($this->nombre);
        $mensajeErrores = $mensajeErrores . $this->validarEmail($this->email);
        $mensajeErrores = $mensajeErrores . $this->validarClave($this->clave);
        
        if ($mensajeErrores == "") {
            
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
        else {
            
            throw new Exception($mensajeErrores);
            
        }
        
        
    }
    
    public static function consultarPorEmail($email) {
        
        $query = "SELECT * from usuarios where email='$email'";
        
        $conexion = new ConexionBD();
        $conexion->abrir();
        
        $resultado = $conexion->correrQuery($query);
        
        $registro = $resultado[0];
        
        if ($registro) {
            
            return new Usuario(
                    $registro['nombre'],
                    $registro['email'],
                    $registro['clave'],
                    $registro['tipo'],
                    $registro['activo'],
                    $registro['id']);
            
        }
        else {
            
            return $registro;
            
        }
        
        $conexion->cerrar();
        
    }
    
    public static function consultarPorId($id) {
        
        $query = "SELECT * from usuarios where id=$id";
        
        $conexion = new ConexionBD();
        $conexion->abrir();
        
        $resultado = $conexion->correrQuery($query);
        
        $registro = $resultado[0];
        
        if ($registro) {
            
            return new Usuario(
                    $registro['nombre'],
                    $registro['email'],
                    $registro['clave'],
                    $registro['tipo'],
                    $registro['activo'],
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
                    $registro['activo'],
                    $registro['id']));
            
        }
        
        $conexion->cerrar();
        
        return $usuarios;
    }
    
    public static function buscarCoincidencias($cadena) {
        
        if (empty($cadena)) {
            
            $query = "SELECT * FROM usuarios";
            
        }
        else {
            
            $query = "SELECT * 
                FROM usuarios 
                WHERE nombre like '%$cadena%'
                OR email like '%$cadena%'";
            
        }
        
        $conexion = new ConexionBD();
        $conexion->abrir();
        
        $resultado = $conexion->correrQuery($query);
        $usuarios = array();
        
        if (is_array($resultado)) {
            
            foreach ($resultado as $registro) {

                array_push($usuarios, new Usuario($registro['nombre'], 
                        $registro['email'], 
                        $registro['clave'], 
                        $registro['tipo'], 
                        $registro['activo'],
                        $registro['id']));

            }
        }
        else {
            
            return array();
            
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

        if ($this->existeEmail($email) and !isset($this->id)){

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
