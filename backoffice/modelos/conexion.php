<?php

class Conexion{

	static public function conectar(){

		$server   = "localhost";
		$username = "root";
		$password = "d0272197";
		$database = "id10548562_sacapi_db";

		$mysqli = new mysqli($server, $username, $password, $database);
		
		if ($mysqli->connect_error) {
			die('error'.$mysqli->connect_error);
		}else{
			return $mysqli;
		}

	}

}

?>