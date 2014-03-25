<?php
	header('Content-Type: text/html; charset=UTF-8'); 
	  
	//Llamada al Nvo. PHP contenido dentro de la carpeta Class  
	include("class/RESOURCES.php"); 

	$selects = new selects();
	$Clases = $selects->CargarRecursos(); 
	//Llamada a la funcion contenida dentro del php de la primera linea

	foreach ($Clases as $key=>$value)
	{ 
		$col1 = "<tr><td value=\"$key\">$value[0]</td>";
		$col2 = "<td value=\"$key\">$value[1]</td>";
		$col3 = "<td value=\"$key\">$value[2]</td>";
		$col4 = "<td value=\"$key\"><a onclick=\"cargarContenido('descripcion_recurso.php')\">$value[3]</a></td>";
		$col5 = "<td value=\"$key\">$value[4]</td>";
		$col6 = "<td value=\"$key\">$value[5]</td>";
		$col7 = "<td><button id=\"btnInTable\" class=\"btn btn-default\" 
                            onclick=\"cargarContenido('mostrar_caracterizacion.php')\">
                            <img class=\"glyphicon search\" src=\"../fonts/glyphicons_file.png\">
                            </img></button></td>";
		$col8 = "<td><button id=\"btnInTable\" class=\"btn btn-default\" 
                            onclick=\"cargarContenido('bajar_caracterizacion.php')\">
                            <img class=\"glyphicon search\" src=\"../fonts/glyphicons_download_alt.png\">
                            </img></button></td>";
		echo $col1.$col2.$col3.$col4.$col5.$col6.$col7.$col8;
	}
	

?>
