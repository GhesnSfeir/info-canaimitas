<?php
header('Content-Type: text/html; charset=UTF-8'); 

include_once "ConexionBD.php";
include_once "Utilitaria/Procedimientos.php";

class Faq 
{
	//Atributo(s)

	var $_id;
	var $_pregunta;
	var $_respuesta;

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


	public function AgregarPreguntaFrecuente()
	{
		$procedimiento = new Procedimientos();
		$query = $procedimiento->ComandoAgregarPreguntaFrecuente(
												$this->_pregunta, 
												$this->_respuesta);

        $resultado = $this->Ejecutar($query);

		if ($resultado)
		{			
			return true;
		}
		
		return false;
	}


    public function ObtenerPreguntasFrecuentes()
	{
		$procedimiento = new Procedimientos();
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