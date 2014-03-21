<?php
header('Content-Type: text/html; charset=UTF-8'); 

class selects 
{
	var $_code = "";
			
	function CargarFaq()
	{

		$Clases['What is your question babe'] = "What is your question babe";
		$Clases['What should we do if ....'] = "What should we do if ....";
		$Clases['First question'] = "First question";
		$Clases['Second question'] = "Second question";
		$Clases['Third question'] = "Third question";
		$Clases['Fourth question'] = "Fourth question";
		echo $Clases;
		return $Clases;
		

	    //CONECCION A LA BD CON LA QUE SE ESTÁ TRABAJANDO
		/*
		$conn =  oci_connect("Jazz", "jazz", "localhost/XE");
        if (!$conn) 
        {
	        echo "Unable to connect: " . var_dump( oci_error() );
	        die();
    	}  

        $curs = oci_new_cursor($conn);
		
		//LLAMADA AL LOS PROCEDIMIENTOS QUE CONTIENEN LA CONSULTA DNETRO DE LA BD
		//ComboReporteTotatilizaciones --> PAQUETE QUE CONTIENE LOS PROCEDIMIENTOS
		//CargarVehiMasUtilizados --> PROCEDIMIENTO DENTRO DEL PAQUETE, ESTE CONTIENE LA RESPECTIVA COLUMNA
		
        $stid = oci_parse($conn, 'begin COMBOREPORTE_INST_ARTI.CARGARLISTA_MARCA(:Clases); end;');
	
	
        oci_bind_by_name($stid, ':Clases', $curs, -1, OCI_B_CURSOR);
        ociexecute($stid);
		oci_execute($curs, OCI_DEFAULT);

			
			$i = 0
			while ($linea = oci_fetch_array($curs)) {			
				
				$Clases[$linea['0']]= $linea['0'];
				$i = $i + 1;
				//echo $linea['0'];
			}
			return $Clases;
	
		oci_free_statement($stid);
        oci_close($conn);
        */

	}
	
	
}


?>