<?php

include_once "Entidad.php";
include_once "PeriodoAcademico.php";

class FabricaEntidades {
    
    public static function crearPeriodoAcademico ($nombre, $abreviacion, $id) {
        
        return PeriodoAcademico($nombre, $abreviacion, $id);
        
    }
    
    public static function crearPeriodoAcademicoDesdeJSON($json){
        
        return PeriodoAcademico::crearDesdeJSON($json);
        
    }
    
}
?>
