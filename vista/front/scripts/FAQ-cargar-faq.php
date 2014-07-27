<?php
	header('Content-Type: text/html; charset=UTF-8'); 
	  
	//Llamada al Nvo. PHP contenido dentro de la carpeta Class  
	include("class/FAQ.php"); 

	$selects = new selects();
	$Clases = $selects->CargarFaq(); 

	//Llamada a la funcion contenida dentro del php de la primera linea
	foreach ($Clases as $key=>$value)
	{ 

		$col1 = "<div class=\"panel panel-default\"><div class=\"panel-heading\"><h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-target=\"#col$key\" value=\"$key\">$value[0]</a></h4></div><div id=\"col$key\" class=\"panel-collapse collapse\"><div class=\"panel-body\">$value[1]</div></div></div>";
		echo $col1;
	}
	

?>