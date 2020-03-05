<?php 

	session_start();
	$ruta = ControladorRuta::ctrRuta();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>SACAPI | Inicio de Sesión </title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<base href="vistas/">

		<!-- favicon -->
		<link rel="shortcut icon" href="img/udc.png" />
		

		<!--=====================================
		VÍNCULOS CSS
		======================================-->

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

		<!-- Fuente Open Sans -->
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto:100|Grand+Hotel" rel="stylesheet">

		<!-- Hoja Estilo Personalizada -->
		<link rel="stylesheet" href="css/style.css">

		<!--=====================================
		VÍNCULOS JAVASCRIPT
		======================================-->

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

		<!-- https://easings.net/es# -->
		<script src="js/plugins/jquery.easing.js"></script>

		<!-- https://markgoodyear.com/labs/scrollup/ -->
		<script src="js/plugins/scrollUP.js"></script>

		<!-- https://www.jqueryscript.net/loading/Handle-Loading-Progress-jQuery-Nite-Preloader.html -->
		<script src="js/plugins/jquery.nite.preloader.js"></script>

		<!-- SWEET ALERT 2 -->	
		<!-- https://sweetalert2.github.io/ -->
		<script src="js/plugins/sweetalert2.all.js"></script>

		<!-- Bootstrap 3.3.2 -->
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<!-- Font Awesome Icons -->
		<link href="plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<!-- Theme style -->
		<link href="css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
		<!-- iCheck -->
		<link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
		<!-- Custom CSS -->
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<script src="js/bootstrap.js" type="text/javascript"> </script>
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/app.js" type="text/javascript"> </script>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		

	</head>
	<body class="login-page bg-login" style="background-color:#EEE">
		<?php include "paginas/login.php"; ?>
		<script type="js/script.js"></script>
		<!-- page script -->
	</body>
</html>