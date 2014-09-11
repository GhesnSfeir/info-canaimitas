<?php

include_once "ConexionBD.php";

abstract class Entidad {
    
    protected $id;
    
    public function obtenerId() { return $this->id; }
    
    protected function establecerId($id) { $this->id = $id; return $this;}
    
    protected function estaEnBaseDeDatos() { 
        
        return (empty($this->id)) ? false : true;
        
    }
    
    public function guardar() {
        
        $clase = get_called_class();
        $this->validarTodo();

        $conexion = new ConexionBD();

        if($this->estaEnBaseDeDatos()) {

            $procedimiento = $clase::SP_MODIFICAR;
            $parametros = $this->obtenerParametrosSPModificar();

            if($conexion->correrProcedimiento($procedimiento, $parametros)) {

                return $this;

	    }

            return false;

        }
        else {

            $procedimiento = $clase::SP_AGREGAR;
            $parametros = $this->obtenerParametrosSPAgregar();
            $resultado = $conexion->correrProcedimiento($procedimiento, $parametros);
            $id = $resultado[0]['id'];
            
            if ($id > 0) {

                $this->id = $id;
                return $this;

	    }

            return false;
        }
    }
    
    public function eliminar() {
        
        $clase = get_called_class();
        
        if (!$this->estaEnBaseDeDatos())
            throw new Exception ("No se puede eliminar el objeto de tipo $clase 
                    porque el mismo no se encuentra en la base de datos");
        
        $conexion = new ConexionBD();
        $procedimiento = $clase::SP_ELIMINAR;
        $parametros = array($this->id);
        
        return $conexion->correrProcedimiento($procedimiento, $parametros);
        
    }
    
    public static function consultarTodos() {
        
        $conexion = new ConexionBD();
        $clase = get_called_class();
        $procedimiento = $clase::SP_CONSULTAR_TODOS;
        $resultado = $conexion->correrProcedimiento($procedimiento);
        $entidades = array();

        foreach ($resultado as $registro) {

            $entidad = $clase::armarDesdeRegistro($registro);
            array_push($entidades, $entidad);

        }

        return $entidades;
    }

    public static function consultarPorId($id) {

        $conexion = new ConexionBD();
        $clase = get_called_class();
        $procedimiento = $clase::SP_CONSULTAR_POR_ID;
        $resultado = $conexion->correrProcedimiento($procedimiento, array($id));
        $registro = $resultado[0];
        
        if ($registro) {

            return $clase::armarDesdeRegistro($registro);;

        }
        else return $registro;
    }
    
    /*public static function crearDesdeJSON($json) {
        
        if (is_string($json)) {
            
            try {

                $reflect = new ReflectionClass(get_called_class());
                $entidad = $reflect->newInstanceWithoutConstructor();
                
                foreach (json_decode($json, true) as $nombre => $valor) {
                    
                    $funcion = "establecer" . ucfirst($nombre);
                    call_user_func_array(array($entidad, $funcion), array($valor));
                    
                }
                
                return $entidad;

            }
            catch (Exception $e) {
                
                echo $e->getMessage();
                
            }
        }
        else {
            
            throw new Exception ("El método 'crearDesdeJSON' requiere como ".
                    "argumento un string en formato JSON");
            
        }
    }
    
    public function convertirEnArreglo() {
        
        $arreglo = array();
        
        foreach (get_class_vars(get_called_class()) as $atributo => $valor) {
            
            $funcion = "obtener" . $atributo;
            $arreglo[$atributo] = call_user_func(array($this, $funcion));
            
        }
        
        return $arreglo;
    }*/
    
    
    
}
?>
