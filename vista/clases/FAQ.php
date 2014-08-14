<?php
header('Content-Type: text/html; charset=UTF-8'); 

include_once "class/ConexionBD.php";

class Faq 
{
	//Atributo(s)

	var $_id;
	var $_pregunta;
	var $_respuesta;
    var $_procedimiento = new Procedimientos();

	//Fin Atributo(s)


	//Constructor(es)
	
	public function __construct($id = null, $pregunta, $respuesta) {
        
        $this->_id = $id;
        $this->_pregunta = $pregunta;
        $this->_respuesta = $respuesta;
    }

    
    //Fin Constructor(es)


    //Propiedad(es)

    public function ObtenerId()
    {
    	return $this->_id;
    }

    public function ObtenerPregunta()
    {
    	return $this->_pregunta;
    }

    public function ObtenerRespuesta()
    {
    	return $this->_respuesta;
    }

    //Fin Propiedad(es)

			
	//Funciones	

    function Ejecutar($query)
    {

    	$conexion = new ConexionBD();
        $conexion->abrir();
        $resultado = $conexion->correrQuery($query);
        if ($resultado)
        {
        	$this->_id = $conexion->ObtenerId();
        }

		$conexion->cerrar();

        return $resultado;
    }


	public function ConvertirEnArreglo($pregunta, $respuesta, $id) {
        
        $retorno = array($pregunta,
                		$respuesta,
                		$id 
		               );
        
        return $retorno;
    }


    /*
    * M'etodo que obtiene todas las FAQ.
    * Funciona para ambas vistas (front y back)
    */
    public function ObtenerPreguntasFrecuentes()
	{
		$procedimiento = $this->_procedimiento;
		$query = $procedimiento->ComandoConsultarPreguntasFrecuentes();
        $resultado = $this->Ejecutar($query);

        $retorno = array();
       
		foreach ($resultado as &$registro) 
		{
			$temporal = $this->ConvertirEnArreglo( 
								$registro['pregunta'], 
								$registro['respuesta'], 
								$registro['id'] );
			
			array_push($retorno, $temporal);
	    }
		
		return $retorno;
	}


	public function ToArrayKeyValue() {
        
        $retorno = array(
                "pregunta" => $this->_pregunta,
                "respuesta" => $this->_respuesta,
                "id" => strval( $this->_id )
               );
        
        return $retorno;
    }


    public function ToString() {
        
    	$retorno = $retorno."\nPregunta: ".$this->_pregunta;
    	$retorno = $retorno."\nRespuesta: ".$this->_respuesta;
		
		return $retorno;
    }

    //Fin Funciones
	
}


?>