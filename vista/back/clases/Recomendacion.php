<?php 

include_once "Entidad.php";

class Recomendacion extends Entidad {

    const SP_CONSULTAR_TODOS = SP_CONSULTAR_RECOMENDACIONES;
    const SP_CONSULTAR_POR_ID = SP_CONSULTAR_RECOMENDACION_ID;
    const SP_AGREGAR = SP_AGREGAR_RECOMENDACION;
    const SP_MODIFICAR = SP_MODIFICAR_RECOMENDACION;
    const SP_ELIMINAR = SP_ELIMINAR_RECOMENDACION;

    protected $recomendacion;
    protected $fkIdRecurso;
    
    protected static function armarDesdeRegistro($registro) {
        
        $recomendacion = new Recomendacion();
        $recomendacion->establecerId($registro['id'])
            ->establecerRecomendacion($registro['recomendacion']);
        
        return $recomendacion;
    }
    
    protected function obtenerParametrosSPAgregar() {
        
        return array($this->recomendacion);
        
    }
    
    protected function obtenerParametrosSPModificar() {
        
        return array($this->id, $this->recomendacion);
        
    }
    
    protected function validarTodo() {
        
        $this->validarRecomendacion($this->recomendacion);
        
    }

    public function __construct($recomendacion = null, $fkIdRecurso = null) {

        if (!empty($recomendacion)) 
            $this->establecerRecomendacion($recomendacion);
        if (!empty($fkIdRecurso)) 
            $this->establecerFkIdRecurso($recomendacion);

    }

    public function obtenerRecomendacion() { return $this->recomendacion; }

    public function establecerRecomendacion($recomendacion) {

        $this->validarRecomendacion($recomendacion);
        $this->recomendacion = $recomendacion;
        return $this;

    }
    
    private function validarRecomendacion ($recomendacion) {
        
        if (empty($recomendacion)) 
            throw new Exception("Es necesario especificar una recomendación.");

        else if(!is_string($recomendacion))
            throw new Exception("La recomendación debe ser un string");

        else if(strlen($recomendacion) > 40)
            throw new Exception("La recomendación debe tener máximo 40 caracteres");

        return true;
    }

    /*public function guardar() {

        $conexion = new ConexionBD();
        $conexion->abrir();

        if(isset($this->id)) {//Si el autor ya existe en la base de datos.

            if($conexion->correrProcedimiento(SP_MODIFICAR_AUTOR,
                array($this->id,$this->nombre))) {

	        $conexion->cerrar();
                return true;

	    }

            $conexion->cerrar();
            return false;

        }
        else {

            $id = $conexion->correrProcedimiento(SP_AGREGAR_AUTOR,
		    array($this->nombre));
            
            if (is_int($id) and $id > 0) {

                $this->id = $id;
                $conexion->cerrar();
                return true;

	    }

            $conexion->cerrar();
            return false;

        }

    }

    public static function consultarPorId($id) {

        $procedimiento = SP_CONSULTAR_AUTOR_ID;

        $conexion = new ConexionBD();
        $conexion->abrir();

        $resultado = $conexion->correrProcedimiento($procedimiento, $id);

        $registro = $resultado[0];

        if ($registro) {

            $autor = new Autor();
            $autor
                ->establecerNombre($registro["nombre"])
                ->establecerId($registro["id"]);

            return $autor;

        }

        return false;

    }

    public static function consultarTodos() {

        $procedimiento = SP_CONSULTAR_AUTORES;

        $conexion = new ConexionBD();
        $conexion->abrir();

        $resultado = $conexion->correrProcedimiento($procedimiento);
        $autores = array();
        $conexion->cerrar();

        foreach ($resultado as $registro) {

            $autor = new Autor();
            $autor
                ->establecerNombre($registro["nombre"])
                ->establecerId($registro["id"]);

            array_push($autores, $autor);

	}

        return $autores;

    }*/

}
?>
