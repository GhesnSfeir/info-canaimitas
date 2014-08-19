<?php

class ElementoHTML {
    
    protected $etiqueta;
    protected $atributos;
    protected $contenido;
    
    public function __construct($etiqueta, $contenido = null, $atributos = null) {
        
        if (is_null($etiqueta) or (empty($etiqueta))) {
            
            throw new Exception("Se necesita especificar una etiqueta.");
            
        }
        
        $this->etiqueta = $etiqueta;
        $this->contenido = array();
        $this->atributos = array();
        
        $this->agregarContenidos($contenido);
        $this->agregarAtributos($atributos);
        /*$this->atributos = is_null($atributos) ? array() : is_array($atributos) ? $atributos : null;
        $this->contenido = is_null($contenido) ? array() : is_array($contenido) ? $contenido : null;
        
        if (is_null($this->atributos) or is_null($this->contenido)){
            
            throw new Exception("Los atributos y el contenido de un elemento 
                    HTML deben ser arreglos.");
            
        }*/
    }
    
    public function toString() {
        
        $string = "<$this->etiqueta";
        
        foreach ($this->atributos as $llave => $valor) {
            
            if (is_string($llave)){
                
                $string .= " $llave=\"$valor\"";
                
            }
            else {
                
                $string .= " $valor";
                
            }
            
        }
        
        $string .= ">";
        
        foreach ($this->contenido as $item){

            $string .= is_string($item) ? $item : $item->toString();

        }
        
        if ($this->requiereCierre()) {
            
            $string .= "</$this->etiqueta>";
        }
        
        return $string;
    }
    
    public function agregarContenidos($contenido) {
        
        if (!is_null($contenido)) {
            
            if (is_array($contenido)) {

                foreach ($contenido as $item) {

                    $this->agregarContenido($item);

                }
            }
            else {

                $this->agregarContenido($contenido);

            }
        }
    }
    
    public function agregarAtributos($atributos) {
        
        if (!is_null($atributos)) {

            if (is_array($atributos)){

                foreach ($atributos as $llave => $valor) {

                    if (is_string($llave)) {

                        $this->atributos[$llave] = 
                                $this->filtrarCaracteresEspeciales($valor);

                    }
                    else {

                        array_push($this->atributos, $valor);

                    }
                }
                
                foreach ($atributos as $atributo) {
                    
                    if (is_string($atributo)) {
                        
                        //
                        
                    }
                    else {
                        
                        throw new Exception("Los atributos deben ser un arreglo
                            de string o pares de string");
                        
                    }
                    
                }
            }
            else {

                throw new Exception("Los atributos deben ser un arreglo de pares de 
                        string");

            }
        }
        
    }
    
    public function filtrarCaracteresEspeciales($string) {
        
        $string = str_replace("\"", "&quot;", $string);
        
        return $string;
        
    }
    
    protected function agregarContenido($item) {
        
        if (is_string($item)){
            
            array_push($this->contenido, $item);
            
        }
        else if (is_object($item)){
            
            if (get_class($item) == "ElementoHTML" or 
                    array_search("ElementoHTML", class_parents($item))) {
                
                array_push($this->contenido, $item);
                
            }
        }
        else {

            throw new Exception("El contenido debe ser de tipo string o
                    ElementoHTML");

        }
    }
    
    protected function requiereCierre() {
        
        if ($this->etiqueta === "area" or 
                $this->etiqueta === "base" or 
                $this->etiqueta === "br" or 
                $this->etiqueta === "col" or 
                $this->etiqueta === "command" or 
                $this->etiqueta === "embed" or 
                $this->etiqueta === "hr" or 
                $this->etiqueta === "img" or 
                $this->etiqueta === "input" or 
                $this->etiqueta === "link" or 
                $this->etiqueta === "meta" or 
                $this->etiqueta === "param" or 
                $this->etiqueta === "source" ) {
            
            return false;
            
        }
        else {
            
            return true;
            
        }
    }
}
?>
