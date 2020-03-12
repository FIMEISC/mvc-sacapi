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

	static public function mdlMostrarCarreraDirector($tabla, $item, $valor){
		$res = ModeloGeneral::mdlMostrarCarreraDirector($tabla, $item, $valor);
		return $res;
	}

	static public function ctrlMostrarGeneralTodos($tabla, $item, $valor){
		$res = ModeloGeneral::mdlMostrarGeneralTodos($tabla, $item, $valor);
		return $res;
	}

	static public function ctrVerAlumnos($semestre, $grupo, $idnivel){
		$res = ModeloGeneral::mdlVerAlumnos($semestre, $grupo, $idnivel);
		return $res;
	}

	static public function ctrlMostrarTutores(){
		$res = ModeloGeneral::mdlMostrarTutores();
		return $res;
	}

	static public function ctrlMostrarTutoresDirector($id){
		$res = ModeloGeneral::mdlMostrarTutoresDirector($id);
		return $res;
	}
	
	static public function ctrlAgregar($tabla, $valor, $idFacultad){
		$res = ModeloGeneral::mdlAgregar($tabla, $valor, $idFacultad);
		if($res == "success"){
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().''.$tabla.'/exitoa";</script>';
		}else{
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().''.$tabla.'/error";</script>';
		}
	}

	static public function ctrlAgregarGrupo($semestre, $grupo, $idnivel, $nivel){
		$res = ModeloGeneral::mdlAgregarGrupo($semestre, $grupo, $idnivel, $nivel);
		if($res == "success"){
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().'niveles/exito";</script>';
		}else{
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().'niveles/error";</script>';
		}
	}

	static public function ctrlUpdateGrupo($id, $semestre, $grupo, $idnivel, $nivel){
		$res = ModeloGeneral::mdlUpdateGrupo($id, $semestre, $grupo, $idnivel, $nivel);
		if($res == "success"){
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().'niveles/exitou";</script>';
		}else{
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().'niveles/error";</script>';
		}
	}

	static public function ctrlEditar($tabla, $id, $valor){
		$res = ModeloGeneral::mdlEditar($tabla, $id, $valor);
		if($res == "success"){
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().''.$tabla.'/exitoe";</script>';
		}else{
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().''.$tabla.'/error";</script>';
		}
	}

	static public function ctrlBorrarGeneral($tabla, $item, $valor){
		$res = ModeloGeneral::mdlBorrarGeneral($tabla, $item, $valor);
		if($res == "success"){
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().''.$tabla.'/exito";</script>';
		}else{
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().''.$tabla.'/error";</script>';
		}
	}

	static public function ctrlBorrarAlumnoNivel($tabla, $item){
		$res = ModeloGeneral::mdlBorrarAlumnoNivel($tabla, $item);
		if($res == "success"){
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().'niveles/exitoalum";</script>';
		}else{
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().'niveles/error";</script>';
		}
	}

	static public function ctrlAgregarProfesor(
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
		$idFacultad4,
		$url
	){
		$res = ModeloGeneral::mdlAgregarProfesor(
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
		);
		if($res == "success"){
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().''.$url.'/exitop";</script>';
		}else{
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().''.$url.'/error";</script>';
		}
	}

	static public function ctrlUpdateProfesor(
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
		$idFacultad4,
		$url
	){
		$res = ModeloGeneral::mdlUpdateProfesor(
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
		);
		if($res == "success"){
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().''.$url.'/exitop";</script>';
		}else{
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().''.$url.'/error";</script>';
		}
	}

	static public function ctrlAgregarAlumno(
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
		$res = ModeloGeneral::mdlAgregarAlumno(
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
		);
		if($res == "success"){
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().''.$url.'/exitop";</script>';
		}else{
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().''.$url.'/error";</script>';
		}
	}

	static public function ctrlUpdateAlumno(
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
		$res = ModeloGeneral::mdlUpdateAlumno(
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
		);
		if($res == "success"){
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().''.$url.'/exitoe";</script>';
		}else{
			echo '<script>window.location = "'.ControladorGeneral::ctrRutaBackoffice().''.$url.'/error";</script>';
		}
	}
}

?>