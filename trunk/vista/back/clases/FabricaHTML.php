<?php

include_once "ElementoHTML.php";

class FabricaHTML {
    
    public static function a($contenido = null, $atributos = null) {
        
        return new ElementoHTML("a", $contenido, $atributos);
        
    }
    
    public static function body($contenido = null, $atributos = null) {
        
        return new ElementoHTML("body", $contenido, $atributos);
        
    }
    
    public static function h1($contenido = null, $atributos = null) {
        
        return new ElementoHTML("h1", $contenido, $atributos);
        
    }
    
    public static function html($contenido = null, $atributos = null) {
        
        return new ElementoHTML("html", $contenido, $atributos);
        
    }
    
    public static function inputText($contenido = null, $atributos = null) {
        
        $elemento = new ElementoHTML("input", null, array("type" => "text"));
        $elemento->agregarAtributos($atributos);
        $elemento->agregarContenidos($contenido);
        
        return $elemento;
        
    }
    
    public static function div($class = null, $id = null) {
        
        $div = new ElementoHTML("div");
        
        if (!is_null($class)) $div->agregarAtributos (array("class" => $class));
        if (!is_null($id)) $div->agregarAtributos (array("id" => $id));
        
        for ($i = 2 ; $i <= sizeof(func_get_args())-1 ; $i++) {
            
            $div->agregarContenidos(func_get_arg($i));
            
        }
        
        return $div;
    }
    
    public static function container() {
        
        return self::div("container", null, func_get_args());
        
    }
    
}
?>
