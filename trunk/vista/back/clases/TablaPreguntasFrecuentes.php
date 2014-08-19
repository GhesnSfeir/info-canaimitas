<?php

include_once "ElementoHTML.php";
include_once "PreguntaFrecuente.php";

class TablaPreguntasFrecuentes extends ElementoHTML{
    
    private $preguntas;
    
    public function __construct($filtro, $atributos = null) {
        
        $this->preguntas = PreguntaFrecuente::buscarCoincidencias($filtro);
        
        $this->etiqueta = "table";
        $this->contenido = array();
        $this->atributos = array();
        
        $this->agregarAtributos($atributos);
        
        $encabezado = new ElementoHTML("thead", new ElementoHTML("tr", array (
            new ElementoHTML("th", "Pregunta"),
            new ElementoHTML("th", "Respuesta"),
            new ElementoHTML("th", "Visible")
        )));
        
        $cuerpo = new ElementoHTML("tbody");
        
        foreach ($this->preguntas as $preguntaFrecuente) {
            
            $pregunta = strlen($preguntaFrecuente->getPregunta()) > 40 ? 
                    substr($preguntaFrecuente->getPregunta(), 0, 40) . "..." : 
                    $preguntaFrecuente->getPregunta();
            $respuesta = strlen($preguntaFrecuente->getRespuesta()) > 40 ? 
                    substr($preguntaFrecuente->getRespuesta(), 0, 40) . "..." : 
                    $preguntaFrecuente->getRespuesta();
            $id = $preguntaFrecuente->getId();
            
            $celdaPregunta = new ElementoHTML("td", 
                    new ElementoHTML("a", $pregunta, array(
                        "onclick" => "verPreguntaFrecuente($id, '".
                        $preguntaFrecuente->getPregunta()."', '".
                        $preguntaFrecuente->getRespuesta()."')"
                    )));
            $celdaRespuesta = new ElementoHTML("td", $respuesta);
            $celdaVisible = new ElementoHTML("td", 
                    new ElementoHTML("input", null, array(
                        "type" => "checkbox", 
                        "class" => "checkbox"
                        
                    )));
            
            $filaPreguntaFrecuente = new ElementoHTML("tr", array(
                $celdaPregunta, 
                $celdaRespuesta, 
                $celdaVisible
            ));
            
            $cuerpo->agregarContenidos($filaPreguntaFrecuente);
            
        }
        
        $this->agregarContenidos(array($encabezado, $cuerpo));
    }
    
}
?>
