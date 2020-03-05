<?php

require_once "conexion.php";

class ModeloGeneral{

	/*=============================================
	Mostrar General
	=============================================*/

	static public function mdlMostrarGeneral($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = mysqli_query(Conexion::conectar(),"SELECT * FROM $tabla WHERE $item = '$valor'");
			return mysqli_fetch_assoc($stmt);

		}else{

			$stmt = mysqli_query(Conexion::conectar(),"SELECT * FROM $tabla");
			return mysqli_fetch_all($stmt); 

		}

		mysqli_close(Conexion::conectar());
		$stmt = null;

	}

	/*=============================================
	Mostrar General Todos/
	=============================================*/

	static public function mdlMostrarGeneralTodos($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = mysqli_query(Conexion::conectar(),"SELECT * FROM $tabla WHERE $item = '$valor'");
			return mysqli_fetch_all($stmt);

		}else{

			$stmt = mysqli_query(Conexion::conectar(),"SELECT * FROM $tabla");
			return mysqli_fetch_all($stmt); 

		}

		mysqli_close(Conexion::conectar());
		$stmt = null;

	}

	/*=============================================
	Mostrar Tutores/
	=============================================*/
	static public function mdlMostrarTutores(){	
		$stmt = mysqli_query(Conexion::conectar(),"SELECT * FROM profesores WHERE permisos_acceso='Tutor' || sub_permiso_acceso='Tutor'");
		
		if($stmt) {
			return mysqli_fetch_all($stmt);
		}else {
			mysqli_close(Conexion::conectar());
			$stmt = null; 
		}
	}


	/*=============================================
	Borrar General/
	=============================================*/
	static public function mdlBorrarGeneral($tabla, $item, $valor){

		$id = mysqli_real_escape_string(Conexion::conectar(), trim($valor));
		$stmt = mysqli_query(Conexion::conectar(),"DELETE FROM $tabla WHERE $item = '$id'");
		
		if($stmt){
			return "success";
		}else{
			return "error";
		}
		mysqli_close(Conexion::conectar());
		$stmt = null;

	}

	static public function mdlEditar($tabla, $id, $valor){

		$id = mysqli_real_escape_string(Conexion::conectar(), trim($id));
		if($tabla == "facultades"){
			$stmt = mysqli_query(Conexion::conectar(),"UPDATE $tabla SET nombre_facultad='$valor' WHERE id_facultad='$id'");
		}else{
			$stmt = mysqli_query(Conexion::conectar(),"UPDATE $tabla SET nombre_carrera='$valor' WHERE id_carrera='$id'");
		}
		
		if($stmt){
			return "success";
		}else{
			return "error";
		}

		mysqli_close(Conexion::conectar());
		$stmt = null;

	}


	static public function mdlAgregar($tabla, $item, $valir){
		
	}
}

?>