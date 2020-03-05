<?php 
require_once "modelos/conexion.php";

Class ControladorAlumnos{
	
	/*=============================================
	Mostrar Alumnos
	=============================================*/

	static public function ctrMostrarAlumnos($tabla, $item, $valor){
        $respuesta = ModeloAlumnos::mdlMostrarAlumnos($tabla, $item, $valor);
		return $respuesta;
	}
    
}
?>