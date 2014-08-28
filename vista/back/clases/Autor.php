<?php 

include_once "Entidad.php";

class Autor extends Entidad {

    protected $nombre;

    public function __construct($nombre = null) {

        if (!is_null($nombre)) $this->establecerNombre($nombre);

    }

    public function obtenerNombre() { return $this->nombre; }

    public function establecerNombre($nombre) {

        if (empty($nombre)) {

            throw new Exception("Es necesario especificar un nombre para el ".
                    "Autor");

        }
        else if(!is_string($nombre)) {

            throw new Exception("El nombre del autor debe ser un string");

	}
        else if(strlen($nombre) > 50) {

            throw new Exception("El nombre del autor debe ser de máximo 50 ".
                    "caracteres");

	}

        $this->nombre = $nombre;
        return $this;

    }

    public function guardar() {

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

    }

}
?>
