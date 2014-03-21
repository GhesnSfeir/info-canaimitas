<?php
	header('Content-Type: text/html; charset=UTF-8'); 
	  
	//Llamada al Nvo. PHP contenido dentro de la carpeta Class  
	include("class/USERS.php"); 

	$selects = new selects();
	$Clases = $selects->CargarUsuarios(); 

	//Llamada a la funcion contenida dentro del php de la primera linea
	$flag = 'False';

	foreach ($Clases as $key=>$value)
	{ 
		$col1 = '<tr>';
		$col2 = "<td value=\"$key\"><a>$value[0]</a></td>";
		$col3 = "<td value=\"$key\">$value[1]</td>";
		if ($value[2]=='True'){
			$col4 = "<td><input type=\"checkbox\" class=\"checkbox\" value=\"true\" checked></input></td>";	
		}
		else{
			$col4 = "<td><input type=\"checkbox\" class=\"checkbox\" value=\"true\"></input></td>";	
		}

		$col5 = "<td><button id=\"btnInTable\" class=\"btn btn-default\" 
                            onclick=\"cargarContenido('eliminar_cuenta.php')\">
                            <img class=\"glyphicon search\" src=\"../fonts/glyphicons_remove.png\">
                            </img></button></td>";
		echo $col1.$col2.$col3.$col4.$col5;
	}
	

?>