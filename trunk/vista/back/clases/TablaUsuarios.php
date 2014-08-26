<?php

include_once "ElementoHTML.php";
include_once "Usuario.php";

class TablaUsuarios extends ElementoHTML{
    
    private $usuarios;
    
    public function __construct($filtro, $atributos = null) {
        
        $this->usuarios = Usuario::buscarCoincidencias($filtro);
        
        $this->etiqueta = "table";
        $this->contenido = array();
        $this->atributos = array();
        
        $this->agregarAtributos($atributos);
        
        $encabezado = new ElementoHTML("thead", new ElementoHTML("tr", array (
            new ElementoHTML("th", "Usuario"),
            new ElementoHTML("th", "Nombre"),
            new ElementoHTML("th", "Suspendido")
        )));
        
        $cuerpo = new ElementoHTML("tbody");
        
        foreach ($this->usuarios as $usuario) {
            
            if ($usuario->obtenerTipo() == "gestor") {
                
                $emailUsuario = $usuario->obtenerEmail();
                $nombreUsuario = $usuario->obtenerNombre();

                $celdaUsuario = new ElementoHTML("td", $emailUsuario);
                $celdaNombre = new ElementoHTML("td", $nombreUsuario);
                $celdaSuspendido = new ElementoHTML("td", 
                        new ElementoHTML("input", null, array(
                            "type" => "checkbox",
                            "class" => "checkbox",
                            $usuario->obtenerActivo()=="1" ? "" : "checked",
                            "onclick" => "javascript: desactivar('$emailUsuario');"
                        )));

                $filaUsuario = new ElementoHTML("tr", array(
                    $celdaUsuario,
                    $celdaNombre,
                    $celdaSuspendido
                ));

                $cuerpo->agregarContenidos($filaUsuario);
            }
        }
        
        $this->agregarContenidos(array($encabezado, $cuerpo));
    }
    
}
?>
