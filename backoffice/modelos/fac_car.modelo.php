<?php

require_once "conexion.php";

class ModeloFac_car{

	/*=============================================
	Mostrar Facultades
	=============================================*/

	static public function mdlMostrarFac_car($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = mysqli_query(Conexion::conectar(),"SELECT * FROM $tabla WHERE $item = $valor");
			return mysqli_fetch_assoc($stmt);

		}else{

			$stmt = mysqli_query(Conexion::conectar(),"SELECT * FROM $tabla");
			return mysqli_fetch_all($stmt); 

		}

		mysqli_close(Conexion::conectar());
		$stmt = null;

	}

	/*=============================================
	Agregar Facultades/
	=============================================*/
}

?>