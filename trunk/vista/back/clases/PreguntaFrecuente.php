<?php

include_once "ConexionBD.php";

class PreguntaFrecuente {
    
    private $id;
    private $pregunta;
    private $respuesta;
    
    
    public function __construct($pregunta, $respuesta, $id = null) {
        
        $this->pregunta = $pregunta;
        $this->respuesta = $respuesta;
        $this->id = $id;
            
    }
    
    public function obtenerId() {
        
        return $this->id;
        
    }
    
    public function obtenerPregunta() {
        
        return $this->pregunta;
        
    }
    
    public function obtenerRespuesta() {
        
        return $this->respuesta;
        
    }
    
    public function convertirEnArreglo() {
        
        return array(
                "id" => $this->id,
                "pregunta" => $this->pregunta,
                "respuesta" => $this->respuesta);
    }
    
    public function cambiarPregunta($preguntaNueva) {
        
        $mensajeErrores = $this->validarPregunta($preguntaNueva);
        
        if ($mensajeErrores == "") {
            
            $this->pregunta = $preguntaNueva;
            
        }
        else {
            
            throw new Exception($mensajeErrores);
        
        }
        
        return true;
    }
    
    public function cambiarRespuesta($respuestaNueva) {
        
        $mensajeErrores = $this->validarRespuesta($respuestaNueva);
        
        if ($mensajeErrores == "") {
            
            $this->respuesta = $respuestaNueva;
            
        }
        else {
            
            throw new Exception($mensajeErrores);
        
        }
        
        return true;
    }
    
    public function Guardar() {
        
        $mensajeErrores = "";
        $mensajeErrores .= $this->validarPregunta($this->pregunta);
        $mensajeErrores .= $this->validarRespuesta($this->respuesta);
        
        if ($mensajeErrores == "") {
            
            if (isset($this->id)) { //Si la pregunta frecuente ya esta en la base de datos

                $query = "UPDATE preguntas_frecuentes SET 
                            pregunta='$this->pregunta', 
                            respuesta='$this->respuesta' 
                            WHERE id=$this->id";
                
                $conexion = new ConexionBD();
                $conexion->abrir();

                if ($conexion->correrQuery($query)){

                    $conexion->cerrar();
                    return true;

                }

                return false;

            }
            else { //Si el usuario no esta en la base de datos

                $query = "INSERT INTO preguntas_frecuentes (pregunta, respuesta) 
                            VALUES ('$this->pregunta', '$this->respuesta')";

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
    
    public static function consultarPorId($id) {
        
        $query = "SELECT * from preguntas_frecuentes where id=$id";
        
        $conexion = new ConexionBD();
        $conexion->abrir();
        
        $resultado = $conexion->correrQuery($query);
        $conexion->cerrar();
        
        $registro = $resultado[0];
        
        if ($registro) {
            
            return new PreguntaFrecuente(
                    $registro['pregunta'],
                    $registro['respuesta'],
                    $registro['id']);
        }
        else {
            
            return $registro;
            
        }
    }
    
    public static function consultarTodos() {
        
        $query = "SELECT * from preguntas_frecuentes";
        
        $conexion = new ConexionBD();
        $conexion->abrir();
        
        $resultado = $conexion->correrQuery($query);
        $preguntas = array();
        $conexion->cerrar();
        
        foreach ($resultado as &$registro) {
            
            array_push($preguntas, new PreguntaFrecuente($registro['pregunta'], 
                    $registro['respuesta'], 
                    $registro['id']));
            
        }
        
        return $preguntas;
    }
    
    public static function buscarCoincidencias($cadena) {
        
        if (empty($cadena)) {
            
            $query = "SELECT * FROM preguntas_frecuentes";
            
        }
        else {
            
            $query = "SELECT * 
                FROM preguntas_frecuentes 
                WHERE pregunta like '%$cadena%'
                OR respuesta like '%$cadena%'";
            
        }
        
        $conexion = new ConexionBD();
        $conexion->abrir();
        
        $resultado = $conexion->correrQuery($query);
        $preguntas = array();
        $conexion->cerrar();
        
        if (is_array($resultado)) {
            
            foreach ($resultado as $registro) {

                array_push($preguntas, new PreguntaFrecuente($registro['pregunta'], 
                        $registro['respuesta'], 
                        $registro['id']));

            }
        }
        else {
            
            return array();
            
        }
        
        return $preguntas;
    }
    
    private function validarPregunta($pregunta) {

        $mensaje = "";

        if (empty($pregunta)) {

            return "- Es necesario especificar una pregunta.\n";

        }

        if (strlen($pregunta) > 1000){

            $mensaje = $mensaje . "- La pregunta no debe exceder los 1000 
                    caracteres.\n";

        }

        return $mensaje;
    }
    
    private function validarRespuesta($respuesta) {

        $mensaje = "";

        if (empty($respuesta)) {

            return "- Es necesario especificar una respuesta.\n";

        }

        if (strlen($respuesta) > 1000){

            $mensaje = $mensaje . "- La respuesta no debe exceder los 100 
                    caracteres.\n";

        }

        return $mensaje;
    }    
    
}
?>
