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

	static public function mdlMostrarCarreraDirector($tabla, $item, $valor){

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


	static public function mdlVerAlumnos($semestre, $grupo, $idnivel){

		if($semestre != null && $grupo != null ){

			$stmt = mysqli_query(Conexion::conectar(),"SELECT * FROM alumnos WHERE semestre = $semestre and grupo = '$grupo' and idnivel = '$idnivel' ");
			return mysqli_fetch_all($stmt);

		}else{

			$stmt = mysqli_query(Conexion::conectar(),"SELECT * FROM alumnos");
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

	static public function mdlMostrarTutoresDirector($id){	
		$stmt = mysqli_query(Conexion::conectar(),"SELECT * FROM profesores WHERE permisos_acceso='Tutor' || sub_permiso_acceso='Tutor' WHERE idFacultad='$id[0]' or idFacultad='$id[2]' or idFacultad='$id[4]' or idFacultad='$id[6]'");
		
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


	static public function mdlAgregar($tabla, $valor, $idFacultad){

		if($idFacultad >= 1){
			$stmt = mysqli_query(Conexion::conectar(),"INSERT INTO $tabla ( nombre_carrera, id_facultad ) VALUES ( '$valor', '$idFacultad' )");
		}else{
			$stmt = mysqli_query(Conexion::conectar(),"INSERT INTO $tabla ( nombre_facultad ) VALUES ( '$valor' )");
		}
		
		if($stmt){
			return "success";
		}else{
			return "error";
		}

		mysqli_close(Conexion::conectar());
		$stmt = null;
	}

	static public function mdlAgregarGrupo($semestre, $grupo, $idnivel){

		$stmt = mysqli_query(Conexion::conectar(),"INSERT INTO niveles ( semestre, grupo, numcontrol ) VALUES ( '$semestre', '$grupo', '$idnivel' )");
		
		if($stmt){
			return "success";
		}else{
			return "error";
		}

		mysqli_close(Conexion::conectar());
		$stmt = null;
	}

	static public function mdlUpdateGrupo($id, $semestre, $grupo, $idnivel){

		$stmt = mysqli_query(Conexion::conectar(),"UPDATE niveles SET semestre = '$semestre', grupo = '$grupo', numcontrol = '$idnivel' WHERE id = '$id'");
		
		if($stmt){
			return "success";
		}else{
			return "error";
		}

		mysqli_close(Conexion::conectar());
		$stmt = null;
	}

	static public function mdlAgregarProfesor(
		$tabla, 
		$numControl, 
		$nombre,
		$apellidoPaterno,
		$apellidoMaterno,
		$password,
		$email,
		$foto,
		$permisoAcceso,
		$SubPermisoAcceso,
		$idFacultad1,
		$idFacultad2,
		$idFacultad3,
		$idFacultad4
	){

		$pass = md5(mysqli_real_escape_string(Conexion::conectar(), trim($password)));
		$stmt = mysqli_query(
			Conexion::conectar(),
			"
				INSERT INTO profesores ( numcontrol, nombreu, apellidop, apellidom, `password`, email, foto, permisos_acceso, sub_permiso_acceso, idFacultad )
				VALUES ( $numControl, '$nombre', '$apellioPaterno', '$apellidoMaterno', '$pass', '$email', '$foto', '$permisoAcceso', '$SubPermisoAcceso', '$idFacultad1,$idFacultad2,$idFacultad3,$idFacultad4' );
			"
		);

		if($stmt){
			return "success";
		}else{
			return "error";
		}

		mysqli_close(Conexion::conectar());
		$stmt = null;
	}

	static public function mdlUpdateProfesor(
		$tabla, 
		$numControl, 
		$nombre,
		$apellidoPaterno,
		$apellidoMaterno,
		$password,
		$email,
		$foto,
		$permisoAcceso,
		$SubPermisoAcceso,
		$idFacultad1,
		$idFacultad2,
		$idFacultad3,
		$idFacultad4
	){
		$queryPassword = mysqli_query(Conexion::conectar(),"SELECT password FROM profesores WHERE numcontrol = $numControl");
		$passwordFetch = mysqli_fetch_assoc($queryPassword);

		if($password == $passwordFetch["password"]){
			$stmt = mysqli_query(Conexion::conectar(),"UPDATE profesores SET numcontrol = '$numControl', nombreu = '$nombre', apellidop = '$apellidoPaterno', apellidom = '$apellidoMaterno', password = '$passwordFetch', email = '$email', foto = '$foto', permisos_acceso = '$permisoAcceso', sub_permiso_acceso = '$SubPermisoAcceso', idFacultad ='$idFacultad1,$idFacultad2,$idFacultad3,$idFacultad4' WHERE numcontrol=$numControl");
		}else{
			$pass = md5(mysqli_real_escape_string(Conexion::conectar(), trim($password)));
			$stmt = mysqli_query(Conexion::conectar(),"UPDATE profesores SET numcontrol = $numControl, nombreu = '$nombre', apellidop = '$apellidoPaterno', apellidom = '$apellidoMaterno', password = '$pass', email = '$email', foto = '$foto', permisos_acceso = '$permisoAcceso', sub_permiso_acceso = '$SubPermisoAcceso', idFacultad ='$idFacultad1,$idFacultad2,$idFacultad3,$idFacultad4' WHERE numcontrol=$numControl");
		}

		if($stmt){
			return "success";
		}else{
			return "error";
		}

		mysqli_close(Conexion::conectar());
		$stmt = null;
	}

	static public function mdlAgregarAlumno(
		$tipo, $noCuenta, $nombre,
		$apellidoP, $apellidoM,
		$password,
		$email,
		$foto,
		$permiasoA,
		$status,
		$semestre,
		$grupo,
		$generacion,
		$idnivel,
		$idtutor,
		$idcarrera,
		$idfacultad,
		$passok,
		$url
	){

		$pass = md5(mysqli_real_escape_string($mysqli, trim($password)));
		$stmt = mysqli_query(
			Conexion::conectar(),
			"
				INSERT INTO alumnos ( numcuenta, nombreu, apellidop, apellidom, password, email, foto, permisos_acceso, status, semestre, grupo, generacion, idnivel, idtutor, idcarrera, idfacultad, pass_ok )
				VALUES ( $noCuenta, '$nombre', '$apellidoP', '$apellidoM', '$pass', '$email', '$foto', '$permiasoA', '$status', $semestre, '$grupo', '$generacion', $idnivel, '$idtutor', $idcarrera, $idfacultad, $passok );
			"
		);

		if($stmt){
			return "success";
		}else{
			return "error";
		}

		mysqli_close(Conexion::conectar());
		$stmt = null;
	}

	static public function mdlUpdateAlumno(
		$tipo, $noCuenta, $nombre,
		$apellidoP, $apellidoM,
		$password,
		$email,
		$foto,
		$permiasoA,
		$status,
		$semestre,
		$grupo,
		$generacion,
		$idnivel,
		$idtutor,
		$idcarrera,
		$idfacultad,
		$passok,
		$url
	){

		$queryPassword = mysqli_query(Conexion::conectar(),"SELECT password FROM alumnos WHERE numcuenta = $noCuenta");
		$passwordFetch = mysqli_fetch_assoc($queryPassword);

		if($password == $passwordFetch["password"]){
			$stmt = mysqli_query(Conexion::conectar(),"UPDATE alumnos SET numcuenta = $noCuenta, nombreu = '$nombre', apellidop = '$apellidoP', apellidom = '$apellidoM', password = '$password', email = '$email', foto = '$foto', permisos_acceso = '$permiasoA', status='$status', semestre = '$semestre', grupo = '$grupo', idnivel = '$idnivel', idtutor = '$idtutor', idcarrera = '$idcarrera', idfacultad = '$idfacultad', pass_ok = $passok WHERE numcuenta=$noCuenta");
		}else{
			$pass = md5(mysqli_real_escape_string(Conexion::conectar(), trim($password)));
			$stmt = mysqli_query(Conexion::conectar(),"UPDATE alumnos SET numcuenta = $noCuenta, nombreu = '$nombre', apellidop = '$apellidoP', apellidom = '$apellidoM', password = '$pass', email = '$email', foto = '$foto', permisos_acceso = '$permiasoA', status='$status', semestre = '$semestre', grupo = '$grupo', idnivel = '$idnivel', idtutor = '$idtutor', idcarrera = '$idcarrera', idfacultad = '$idfacultad', pass_ok = $passok WHERE numcuenta=$noCuenta");	
		}

		if($stmt){
			return "success";
		}else{
			return "error";
		}

		mysqli_close(Conexion::conectar());
		$stmt = null;
	}
}

?>