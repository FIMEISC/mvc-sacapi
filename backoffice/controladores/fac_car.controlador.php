<?php 
require_once "modelos/conexion.php";

Class ControladorFac_car{
	
	/*=============================================
	Mostrar Usuarios
	=============================================*/

	static public function ctrMostrarFac_car($tabla, $item, $valor){
        $respuesta = ModeloFac_car::mdlMostrarFac_car($tabla, $item, $valor);
		return $respuesta;
    }
    
    
}
?>