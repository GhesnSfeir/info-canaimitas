<?php
	header('Content-Type: text/html; charset=UTF-8'); 
	  
	//Llamada al Nvo. PHP contenido dentro de la carpeta Class  
	include("class/FAQ.php"); 

	$selects = new selects();
	$Clases = $selects->CargarFaq(); 

	//Llamada a la funcion contenida dentro del php de la primera linea


	$i = 0;
	foreach ($Clases as $key=>$value)
	{ 
		$i = $i + 1;
		$col1 = "<tr><td value=\"$i\">$i</td>";
		$col2 = "<td value=\"$key\"><a>$value</a></td>";
		$col3 = "<td value=\"predeterminado\">Predeterminado</td>";
		$col4 = "<td><input type=\"checkbox\" class=\"checkbox\" value=\"true\"></input></td>";
		$col5 = "<td><button id=\"btnDel\" class=\"btn btn-default\" 
                            onclick=\"cargarContenido('eliminar_pregunta_frecuente.php')\">
                            <img class=\"glyphicon search\" src=\"../fonts/glyphicons_remove.png\">
                            </img></button></td>";
		echo $col1.$col2.$col3.$col4.$col5;
	}
	

?>