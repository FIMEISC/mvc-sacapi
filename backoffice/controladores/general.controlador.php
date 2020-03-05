<?php 

class ControladorGeneral{

	static public function ctrRuta(){

		return "http://localhost/mvc-sacapi/";

	}
	static public function ctrRutaBackoffice(){

		return "http://localhost/mvc-sacapi/backoffice/";

	}

	static public function ctrlMostrarGeneral($tabla, $item, $valor){
		$res = ModeloGeneral::mdlMostrarGeneral($tabla, $item, $valor);
		return $res;
	}

	static public function ctrlMostrarGeneralTodos($tabla, $item, $valor){
		$res = ModeloGeneral::mdlMostrarGeneralTodos($tabla, $item, $valor);
		return $res;
	}

	static public function ctrlMostrarTutores(){
		$res = ModeloGeneral::mdlMostrarTutores();
		return $res;
	}

	static public function ctrlAgregar($tabla, $item, $valor){
		$res = ModeloGeneral::mdlAgregar($tabla, $item, $valor);
		return $res;
	}

	static public function ctrlEditar($tabla, $id, $valor){
		$res = ModeloGeneral::mdlEditar($tabla, $id, $valor);
		return $res;
	}

	static public function ctrlBorrarGeneral($tabla, $item, $valor){
		$res = ModeloGeneral::mdlBorrarGeneral($tabla, $item, $valor);
		if($res == "success"){
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().''.$tabla.'/exito";</script>';
		}else{
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().''.$tabla.'/error";</script>';
		}
	}
}

?>