<?php
header('Content-Type: text/html; charset=UTF-8'); 

include ("ConexionBD.php");

class selects 
{
	var $_code = "";
			
	function CargarRecursos()
	{

		$Clases['Plantas'] = array("6", "Estudios de la Naturaleza", "Plantas", "Arbustos del Amazonas", "PDF", "Ghesn S.");
		$Clases['Arboles'] = array("6", "Estudios de la Naturaleza","Plantas", "Naturaleza", "PDF", "CL. O.");
		$Clases['Naturaleza'] = array("6", "Estudios de la Naturaleza", "Plantas","Arboles", "Video", "Ale. H. T.");
		$Clases['Savia'] = array("6", "Estudios de la Naturaleza", "Plantas", "Troncos", "JClick", "Thomas T. Lop");
		
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