<?php 
// https://github.com/PHPMailer/PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "modelos/conexion.php";

Class ControladorUsuarios{
	
	/*=============================================
	Mostrar Usuarios
	=============================================*/

	static public function ctrMostrarUsuarios($item, $valor){
	
		$tabla = "alumnos";
		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
		if($respuesta['numcuenta'] == $valor){
			return $respuesta;
		}else{
			$tabla = "profesores";
			$item_pro = "numcontrol";
			$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item_pro, $valor);
			return $respuesta;
		}
	}
}
?>