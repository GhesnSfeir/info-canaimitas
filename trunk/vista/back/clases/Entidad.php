<?php

include_once "ConexionBD.php";

abstract class Entidad {
    
    protected $id;
    
    public function obtenerId() { return $this->id; }
    
    protected function establecerId($id) { $this->id = $id; }
    
    public static function crearDesdeJSON($json) {
        
        if (is_string($json)) {
            
            try {

                $reflect = new ReflectionClass(get_called_class());
                $entidad = $reflect->newInstanceWithoutConstructor();
                
                foreach (json_decode($json, true) as $nombre => $valor) {
                    
                    $funcion = "establecer" . ucfirst($nombre);
                    call_user_func_array(array($entidad, $funcion), array($valor));
                    
                }
                
                return $entidad;

            }
            catch (Exception $e) {
                
                echo $e->getMessage();
                
            }
        }
        else {
            
            throw new Exception ("El método 'crearDesdeJSON' requiere como ".
                    "argumento un string en formato JSON");
            
        }
    }
    
    public function convertirEnArreglo() {
        
        $arreglo = array();
        
        foreach (get_class_vars(get_called_class()) as $atributo => $valor) {
            
            $funcion = "obtener" . $atributo;
            $arreglo[$atributo] = call_user_func(array($this, $funcion));
            
        }
        
        return $arreglo;
    }
    
    
    
}
?>
