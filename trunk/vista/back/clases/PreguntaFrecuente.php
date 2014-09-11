<?php

include_once "Entidad.php";

class PreguntaFrecuente extends Entidad {
    
    const SP_CONSULTAR_TODOS = SP_CONSULTAR_PREGUNTAS_FRECUENTES;
    const SP_CONSULTAR_POR_ID = SP_CONSULTAR_PREGUNTA_FRECUENTE_ID;
    const SP_AGREGAR = SP_AGREGAR_PREGUNTA_FRECUENTE;
    const SP_MODIFICAR = SP_MODIFICAR_PREGUNTA_FRECUENTE;
    const SP_ELIMINAR = SP_ELIMINAR_PREGUNTA_FRECUENTE;
    
    protected $pregunta;
    protected $respuesta;
    protected $visible;
    
    protected static function armarDesdeRegistro($registro) {
        
        $preguntaFrecuente = new PreguntaFrecuente();
        $preguntaFrecuente->establecerId($registro['id'])
            ->establecerPregunta($registro['pregunta'])
            ->establecerRespuesta($registro['respuesta']);
        if ($registro['visible'] == 0) $preguntaFrecuente->cambiarEstado();
        
        return $preguntaFrecuente;
    }
    
    protected function obtenerParametrosSPAgregar() {
        
        return array($this->pregunta, $this->respuesta, $this->visible);
        
    }
    
    protected function obtenerParametrosSPModificar() {
        
        return array($this->id, $this->pregunta, $this->respuesta, 
            $this->visible);
        
    }
    
    protected function validarTodo() {
        
        $this->validarPregunta($this->pregunta);
        $this->validarRespuesta($this->respuesta);
        
    }
    
    public function __construct($pregunta = null, $respuesta = null) {
        
        if (!empty($pregunta)) $this->establecerPregunta($pregunta);
        if (!empty($respuesta)) $this->establecerRespuesta($respuesta);
        $this->visible = 1;
            
    }
    
    public function obtenerEstado() {
        
        return $this->visible;
        
    }
    
    public function obtenerPregunta() {
        
        return $this->pregunta;
        
    }
    
    public function obtenerRespuesta() {
        
        return $this->respuesta;
        
    }

    public function cambiarEstado() {

        $this->visible = $this->visible == 1 ? 0 : 1;
        return $this;

    }
    
    public function establecerPregunta($pregunta) {
        
        $this->validarPregunta($pregunta);
        $this->pregunta = $pregunta;
        return $this;
        
    }
    
    public function establecerRespuesta($respuesta) {
        
        $this->validarRespuesta($respuesta);
        $this->respuesta = $respuesta;
        return $this;
        
    }
    
    private function validarPregunta($pregunta) {

        if (empty($pregunta))
            throw new Exception("La pregunta en una pregunta frecuente no puede
                estar vacía");

        else if (!is_string($pregunta))
            throw new Exception("La pregunta en una pregunta frecuente debe
                ser una cadena de caracteres");

        else if (strlen($pregunta) > 1000)
            throw new Exception("La pregunta en una pregunta frecuente debe 
                tener máximo 1000 caracteres");

        return true;

    }
    
    private function validarRespuesta($respuesta) {

        if (empty($respuesta))
            throw new Exception("La respuesta en una pregunta frecuente no puede
                estar vacía");

        else if (!is_string($respuesta))
            throw new Exception("La respuesta en una pregunta frecuente debe
                ser una cadena de caracteres");

        else if (strlen($respuesta) > 1000)
            throw new Exception("La respuesta en una pregunta frecuente debe 
                tener máximo 1000 caracteres");

        return true;

    }
    
    public static function buscarPorFiltro($filtro) {
        
        $conexion = new ConexionBD();
        $procedimiento = SP_BUSCAR_PREGUNTAS_FRECUENTES_FILTRO;
        $parametros = array($filtro);
        $resultado = $conexion->correrProcedimiento($procedimiento, $parametros);
        $preguntasFrecuentes = array();

        foreach ($resultado as $registro) {

            $preguntaFrecuente = new PreguntaFrecuente();
            $preguntaFrecuente->establecerId($registro['id'])
                ->establecerPregunta($registro['pregunta'])
                ->establecerRespuesta($registro['respuesta']);
            if ($registro['visible'] == 0) $preguntaFrecuente->cambiarEstado();

            array_push($preguntasFrecuentes, $preguntaFrecuente);

        }

        return $preguntasFrecuentes;
    }
    
}
?>
