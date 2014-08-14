<?php

	//Llamada al Nvo. PHP contenido dentro de la carpeta Class  
	include("../class/FAQ.php"); 
	include_once("../class/utils/StoredProcedure.php");

	$mensajeError = "No es un m'etodo de conexion valida: ";
	
	$clase = new Faq();
	
	$method = $_SERVER['REQUEST_METHOD'];

	if ($method === 'GET')
	{
		$retorno = $clase->ObtenerPreguntasFrecuentes(); 
		
		if (!empty($retorno))
		{
			//Llamada a la funcion contenida dentro del php de la primera linea
			foreach ($retorno as $key=>$value)
			{ 
				$col1 = "<div class=\"panel panel-default\"><div class=\"panel-heading\"><h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-target=\"#col$key\" value=\"$key\">$value[0]</a></h4></div><div id=\"col$key\" class=\"panel-collapse collapse\"><div class=\"panel-body\">$value[1]</div></div></div>";
				echo $col1;
			}
		}
			
	}
	else
	{
		if ($method === 'POST')
		{
			$val_1 = $_POST['pregunta'];
			echo "Valor 1> ".$val_1;
			
			if ($val_1 != "")
			{
				$clase->_pregunta = $val_1;
				$retorno = $clase->AgregarPParticulares();
				var_dump($retorno);
			}
			
		}else
		{
			echo sprintf($mensajeError." %s.", $method);
		}
	}




?>