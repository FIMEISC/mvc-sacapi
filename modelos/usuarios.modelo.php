<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	Mostrar Usuarios
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){

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
	Actualizar usuario
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $id, $item, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE id_usuario = :id_usuario");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":id_usuario", $id, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return print_r(Conexion::conectar()->errorInfo());

		}

		$stmt-> close();

		$stmt = null;
		
	}

}

?>