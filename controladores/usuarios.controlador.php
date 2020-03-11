<?php 
// https://github.com/PHPMailer/PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "modelos/conexion.php";

Class ControladorUsuarios{
	
	/*=============================================
	Ingreso al Sistema Como Alumno / Profesor / Adminsitrador
	=============================================*/
	public function ctrIngresoUsuario(){

		if(isset($_POST["num_c"])){
			if(preg_match('/^[a-zA-Z0-9]+$/',$_POST["num_c"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])){

				$user = mysqli_real_escape_string(Conexion::conectar(), stripslashes(strip_tags(htmlspecialchars(trim($_POST['num_c'])))));
				$password = md5(mysqli_real_escape_string(Conexion::conectar(), stripslashes(strip_tags(htmlspecialchars(trim($_POST['password']))))));
				
				/* DATOS DE CONEXION PARA MYSQL ALUMNOS */
				$tabla = "alumnos";
				$item = "numcuenta";
				$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $user);
			 	if($respuesta["numcuenta"] == $user && $respuesta["password"] == $password){
					
			 		if($respuesta["status"] == "bloqueado"){

			 			echo'<script>
							swal({
									type:"error",
								  	title: "¡ERROR!",
								  	text: "¡El Usuario se encuentra bloqueado, por favor ponganse en contacto con su MAESTRO DE INGLES O TUTOR para poder ingresar al sistema!",
								  	showConfirmButton: true,
									confirmButtonText: "Cerrar"
								  
							}).then(function(result){if(result.value){}});
						</script>';

						return;

			 		}else{
						$hora = date('H:i');
						$session_id = $valor;
						$token = hash('sha256', $hora.$session_id);
		
						$_SESSION['user_token']   = $token;
						$_SESSION['validarSesion'] = $respuesta['status'];
						$_SESSION['num_c']  = $respuesta['numcuenta'];
						$_SESSION['password']  = $respuesta['password'];
						$_SESSION['nombreu'] = $respuesta['nombreu'];
						$_SESSION['apellidop'] = $respuesta['apellidop'];
						$_SESSION['apellidom'] = $respuesta['apellidom'];
						$_SESSION['permisos_acceso'] = $respuesta['permisos_acceso'];
						$_SESSION['idnivel'] = $respuesta['idnivel'];
						$_SESSION['semestre'] = $respuesta['semestre'];
						$_SESSION['grupo'] = $respuesta['grupo'];
						$_SESSION['email'] = $respuesta['email'];
						$_SESSION['foto_perfil'] = $respuesta['foto'];
						$_SESSION['pass_check'] = $respuesta['pass_ok'];
						$_SESSION['id_facultad'] =  $respuesta['idfacultad'];
					
			 			$ruta = ControladorRuta::ctrRuta();

			 			echo '<script>
					
							window.location = "'.$ruta.'backoffice";				

						</script>';

			 		}

			 	}else{
					 /* DATOS DE CONEXION PARA MYSQL PROFESORES/ADMINISTRADORES */
					$tabla = "profesores";
					$item = "numcontrol";
					$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $user);

					if($respuesta["numcontrol"] == $user && $respuesta["password"] == $password){
						if($respuesta["status"] == "bloqueado"){

							echo'<script>
							   swal({
									   type:"error",
										 title: "¡ERROR!",
										 text: "¡El Usuario se encuentra bloqueado, por favor ponganse en contacto con su MAESTRO DE INGLES O TUTOR para poder ingresar al sistema!",
										 showConfirmButton: true,
									   confirmButtonText: "Cerrar"
									 
							   }).then(function(result){if(result.value){}});
						   </script>';
   
						   return;
   
						}else{
						   $hora = date('H:i');
						   $session_id = $valor;
						   $token = hash('sha256', $hora.$session_id);
		   
						   	$_SESSION['user_token']   = $token;
						   	$_SESSION['validarSesion'] = $respuesta['status'];
						   	$_SESSION['num_c']  = $respuesta['numcontrol'];
						   	$_SESSION['password']  = $respuesta['password'];
						   	$_SESSION['nombreu'] = $respuesta['nombreu'];
							$_SESSION['apellidop'] = $respuesta['apellidop'];
							$_SESSION['apellidom'] = $respuesta['apellidom'];
						   	$_SESSION['permisos_acceso'] = $respuesta['permisos_acceso'];
						   	$_SESSION['idnivel'] = $respuesta['idnivel'];
						   	$_SESSION['semestre'] = $respuesta['semestre'];
						   	$_SESSION['email'] = $respuesta['email'];
						   	$_SESSION['foto_perfil'] = $respuesta['foto'];
						   	$_SESSION['pass_check'] = $respuesta['pass_ok'];
						   	$_SESSION['id_facultad'] =  $respuesta['idFacultad'];
   
							$ruta = ControladorRuta::ctrRuta();
   
							echo '<script>
					   
							   window.location = "'.$ruta.'backoffice";				
   
						   </script>';
   
						}
					}else{
						echo'<script>

						swal({
								type:"error",
							  	title: "¡ERROR!",
							  	text: "¡Numero de cuenta o contraseña incorrecto, verifique los datos ingresados profesor!",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){if(result.value){}});
						</script>';
					}
			 	}

			}else{
				echo'<script>

						swal({
								type:"error",
							  	title: "¡CORREGIR!",
							  	text: "¡No se permiten caracteres especiales, verifica los datos ingresados!",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){if(result.value){}});
					</script>';
			}
		}

	}
}
?>