<?php

include_once "Entidad.php";

class Usuario extends Entidad {
    
    const SP_CONSULTAR_TODOS = SP_CONSULTAR_USUARIOS;
    const SP_CONSULTAR_POR_ID = SP_CONSULTAR_USUARIO_ID;
    const SP_AGREGAR = SP_AGREGAR_USUARIO;
    const SP_MODIFICAR = SP_MODIFICAR_USUARIO;
    const SP_ELIMINAR = SP_ELIMINAR_USUARIO;
    
    protected $nombre;
    protected $email;
    protected $clave;
    protected $tipo;
    protected $activo;
    
    protected static function armarDesdeRegistro($registro) {
        
        $usuario = new Usuario();
        $usuario->establecerId($registro['id'])
            ->establecerNombre($registro['nombre'])
            ->establecerEmail($registro['email'])
            ->establecerClave($registro['clave'])
            ->establecerTipo($registro['tipo']);
        if ($registro['activo'] == 0) $usuario->cambiarEstado();
        
        return $usuario;
    }
    
    protected function obtenerParametrosSPAgregar() {
        
        return array($this->nombre,$this->email,$this->clave,$this->tipo);
        
    }
    
    protected function obtenerParametrosSPModificar() {
        
        return array($this->id, $this->nombre, $this->email, $this->clave, 
            $this->tipo, $this->activo);
        
    }
    
    protected function validarTodo() {
        
        $this->validarNombre($this->nombre);
        $this->validarEmail($this->email);
        $this->validarClave($this->clave);
        $this->validarTipo($this->tipo);
        
    }
    
    public function __construct($nombre = null, $email = null, $clave = null, $tipo = "gestor") {
        
        if (!empty($nombre)) $this->establecerNombre($nombre);
        if (!empty($email)) $this->establecerEmail($email);
        if (!empty($clave)) $this->establecerClave($clave);
        if (!empty($tipo)) $this->establecerTipo($tipo);
        $this->activo = 1;
        
    }

    public function cambiarEstado() {

        $this->activo = $this->activo == 1 ? 0 : 1;
        return $this;

    }

    public function establecerNombre($nombre) {

        $this->validarNombre($nombre);
        $this->nombre = $nombre;
        return $this;

    }

    public function establecerEmail($email) {

        $this->validarEmail($email);
        $this->email = $email;
        return $this;

    }

    public function establecerClave($clave) {

        $this->validarClave($clave);
        $this->clave = $clave;
        return $this;

    }

    public function establecerTipo($tipo) {

        $this->validarTipo($tipo);
        $this->tipo = strtolower($tipo);
        return $this;

    }

    public function obtenerNombre() { return $this->nombre; }

    public function obtenerEmail() { return $this->email; }

    public function obtenerClave() { return $this->clave; }

    public function obtenerEstado() { return $this->activo; }

    public function obtenerTipo() { return $this->tipo; }

    private function validarNombre($nombre) {

        if (empty($nombre))
            throw new Exception("El nombre del usuario no puede estar vacío");

        else if (!is_string($nombre))
            throw new Exception("El nombre del usuario debe ser una cadena de caracteres");

        else if (strlen($nombre) > 100)
            throw new Exception("El nombre del usuario debe tener máximo 100 caracteres");

        return true;

    }

    private function validarEmail($email) {

        if (empty($email))
            throw new Exception("El email del usuario no puede estar vacío");

        else if (!is_string($email))
            throw new Exception("El email del usuario debe ser una cadena de caracteres");

        else if (strlen($email) > 100)
            throw new Exception("El email del usuario debe tener máximo 100 caracteres");

        else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            throw new Exception("El email especificado para el usuario no tiene un formato válido");

        if ($this->existeEmail($email) and empty($this->id)) 
            throw new Exception("El email especificado para el usuario ya existe.");

        return true;

    }

    private function validarClave($clave) {

        if (empty($clave))
            throw new Exception("La clave del usuario no puede estar vacía");

        else if (!is_string($clave))
            throw new Exception("La clave del usuario debe ser una cadena de caracteres");

        else if (strlen($clave) > 32)
            throw new Exception("La clave del usuario debe tener máximo 32 caracteres");

        return true;

    }

    private function validarTipo($tipo) {

        if (empty($tipo))
            throw new Exception("EL tipo del usuario no debe estar vacío");

        else if (!is_string($tipo))
            throw new Exception("El tipo del usuario debe ser una cadena de caracteres");

        else if (strlen($tipo) > 50)
            throw new Exception("EL tipo del usuario debe tener máximo 50 caracteres");

        else if (strtolower($tipo) != "gestor" and
                strtolower($tipo) != "administrador" and
                strtolower($tipo) != "general")
            throw new Exception("El tipo del usuario debe ser 'administrador', 'gestor', o 'general'");

        return true;

    }

    private function existeEmail($email) {

        $procedimiento = SP_CONTAR_USUARIOS_EMAIL;
        
        $conexion = new ConexionBD();
        
        $resultado = $conexion->correrProcedimiento($procedimiento, array ($email));

        if ($resultado[0]["cuenta"] == 1 ) return true;
        
        return false;

    }
    
    public static function buscarPorFiltro ($filtro) {
        
        $conexion = new ConexionBD();
        $procedimiento = SP_BUSCAR_USUARIOS_FILTRO;
        $parametros = array($filtro);
        $resultado = $conexion->correrProcedimiento($procedimiento, $parametros);
        $usuarios = array();

        foreach ($resultado as $registro) {

            array_push($usuarios, self::armarDesdeRegistro($registro));

        }

        return $usuarios;
    }

    public static function consultarPorEmail($email) {

        $conexion = new ConexionBD();
        $procedimiento = SP_CONSULTAR_USUARIOS_EMAIL;
        $parametros = array($email);
        $resultado = $conexion->correrProcedimiento($procedimiento, $parametros);
        $registro = $resultado[0];

        if ($registro) {

            return self::armarDesdeRegistro($registro);

        }
        else return $registro;

    }
}
?>
