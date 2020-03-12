<?php 
	$res = new ControladorGeneral();
	if($_GET["pagina"] == "facultades"){
		$id_name = "id_facultad";
		$res ->ctrlBorrarGeneral($_GET["pagina"],$id_name,$_GET["id"]);
	}else if ($_GET["pagina"] == "carreras"){
		$id_name = "id_carrera";
		$res ->ctrlBorrarGeneral($_GET["pagina"],$id_name,$_GET["id"]);
	}else if( $_GET["pagina"] == "niveles"){
		if($_GET["subpage"] == "eliminar"){
			$res -> ctrlBorrarAlumnoNivel("alumnos", $_GET["id"]);
		}
	}
   
?>