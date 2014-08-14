<?php

//back

define("SP_PreguntasFrecuentes", 
		"consultar_preguntas_frecuentes");

define("SP_AgregarPreguntaFrecuente", 
		"agregar_preguntas_frecuentes");

define("SP_EliminarPreguntaFrecuente", 
		"eliminar_preguntas_frecuentes");

define("SP_ModificarPreguntaFrecuente", 
		"modificar_preguntas_frecuentes");


//front

define("SP_Preguntas", 
		"consultar_preguntas_particulares");

define("SP_AgregarPregunta", 
		"agregar_preguntas_particulares");

define("SP_EliminarPregunta", 
		"eliminar_preguntas_particulares");

define("SP_ModificarPregunta", 
		"modificar_preguntas_particulares");


class Procedimientos
{
	var $_comando;
	var $_apertura;
	var $_cierre;
	var $_separador;


	public function __construct() {
        
        $this->_comando = "CALL ";
		$this->_apertura = "( ";
		$this->_cierre = " )";
		$this->_separador = ",";
    }

	
	function ConstruirComando($llamado)
	{
		$linea = $this->_comando . $llamado . $this->_apertura;
		return $linea;
	}
	

	/*
	*Metodos para las preguntas frecuentes (FAQ) de back
	* Y consultar todos los FAQ del front
	*/

	function ComandoConsultarPreguntasFrecuentes()
	{
		$lineaComando = $this->ConstruirComando(SP_PreguntasFrecuentes);
		$lineaComando = $lineaComando . $this->_cierre;

		return $lineaComando;
	}


	function ComandoAgregarPreguntaFrecuente($pregunta, $respuesta)
	{
		$lineaComando = $this->ConstruirComando(SP_AgregarPreguntaFrecuente);
		$lineaComando = $lineaComando . $pregunta . $this->_separador ;
		$lineaComando = $lineaComando . $respuesta . $this->_cierre;
		return $lineaComando;
	}


	/*
	*Metodos para las preguntas particulares de front
	*/

	function ComandoConsultarPreguntasParticulares()
	{
		$lineaComando = $this->ConstruirComando(SP_Preguntas);
		$lineaComando = $lineaComando . $this->_cierre;
		echo "Comando: ".$lineaComando;
		var_dump($lineaComando);
		return $lineaComando;
	}


	function ComandoAgregarPregunta($pregunta)
	{
		$usuario = 1;

		$lineaComando = $this->ConstruirComando(SP_AgregarPregunta);
		$lineaComando = $lineaComando . $pregunta . $this->_separador ;
		$lineaComando = $lineaComando . $usuario ;
		$lineaComando .= $this->_cierre;
		echo "Comando: ".$lineaComando;
		return $lineaComando;
	}

}


?>