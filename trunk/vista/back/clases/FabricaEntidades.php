<?php

include_once "Entidad.php";
include_once "PeriodoAcademico.php";
include_once "Usuario.php";

class FabricaEntidades {
    
    public static function crearUsuario ($nombre = null, $email = null, 
            $clave = null, $tipo = "gestor") {
        
        return new Usuario($nombre, $email, $clave, $tipo);
        
    }
    
    public static function crearPeriodoAcademico ($nombre, $abreviacion, $id) {
        
        return new PeriodoAcademico($nombre, $abreviacion, $id);
        
    }
    
    public static function crearPeriodoAcademicoDesdeJSON($json){
        
        return PeriodoAcademico::crearDesdeJSON($json);
        
    }
    
}
?>
