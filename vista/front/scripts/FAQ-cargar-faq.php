<?php
	header('Content-Type: text/html; charset=UTF-8'); 
	  
	//Llamada al Nvo. PHP contenido dentro de la carpeta Class  
	include("class/FAQ.php"); 

	$selects = new selects();
	$Clases = $selects->CargarFaq(); 

	//Llamada a la funcion contenida dentro del php de la primera linea
	foreach ($Clases as $key=>$value)
	{ 
		$col1 = "<li value=\"$key\"><a>$value</a></li>";
		echo $col1;
	}
	

?>