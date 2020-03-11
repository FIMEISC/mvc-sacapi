<?php 

session_start();
$ruta = ControladorGeneral::ctrRuta();
$ruta_backoffice = ControladorGeneral::ctrRutaBackoffice();

if(!isset($_SESSION["validarSesion"])){

	echo '<script>

		window.location = "'.$ruta.'";

	</script>';

	return;

}

$item = "numcuenta";
$valor = $_SESSION["num_c"];

$usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>SACAPI | Universidad de Colima</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<base href="<?php echo $ruta_backoffice;?>">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
		<!-- Tempusdominus Bbootstrap 4 -->
		<link rel="stylesheet" href="vistas/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
		<!-- iCheck -->
		<link rel="stylesheet" href="vistas/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
		<!-- JQVMap -->
		<link rel="stylesheet" href="vistas/plugins/jqvmap/jqvmap.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="vistas/css/adminlte.min.css">
		<link rel="stylesheet" href="vistas/css/style.css">
		<!-- overlayScrollbars -->
		<link rel="stylesheet" href="vistas/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
		<!-- Daterange picker -->
		<link rel="stylesheet" href="vistas/plugins/daterangepicker/daterangepicker.css">
		<!-- summernote -->
		<link rel="stylesheet" href="vistas/plugins/summernote/summernote-bs4.css">
		<!-- DataTables -->
		<link rel="stylesheet" href="vistas/plugins/datatables/dataTables.bootstrap4.css">
		<!-- Google Font: Source Sans Pro -->
		
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<!-- Content Wrapper. Contains page content -->
			<?php
				include "paginas/modulos/menu.php";
				include "paginas/modulos/header.php";
			
				if(isset($_GET["pagina"])){
					if( $_GET["pagina"] == "inicio" ||  
						$_GET["pagina"] == "salir"){

						include "paginas/".$_GET["pagina"].".php";

					}else if( $_GET["pagina"] == "perfil" ||
						$_GET["pagina"] == "calificaciones" ||
						$_GET["pagina"] == "niveles" ||
						$_GET["pagina"] == "reportes" ||
						$_GET["pagina"] == "alumnos" 
					){
						if( $_GET["subpage"] == "ver" ) {
						
							include "paginas/modulos/".$_GET["pagina"]."/".$_GET["subpage"].".php";
						
						}else if($_GET["subpage"] == "agregar" || 
								$_GET["subpage"] == "editar" ||
								$_GET["subpage"] == "eliminar"){

							include "paginas/modulos/formularios/".$_GET["subpage"].".php";

						}else{
							
							include "paginas/modulos/".$_GET["pagina"]."/".$_GET["pagina"].".php";
						
						}
					}else if(
						$_GET["pagina"] == "facultades" ||
						$_GET["pagina"] == "carreras" ){
							
						if($_GET["subpage"] == "agregar" || 
							$_GET["subpage"] == "editar" ||
							$_GET["subpage"] == "eliminar"){
							include "paginas/modulos/formularios/".$_GET["subpage"].".php";
						}else{
							include "paginas/modulos/facultad_carrera/view.php";
						}
					}else if(
						$_GET["pagina"] == "coordinadores" ||
						$_GET["pagina"] == "directores" ||
						$_GET["pagina"] == "jefes" ||
						$_GET["pagina"] == "tutores"  ||
						$_GET["pagina"] == "maestros"
					){
						if($_GET["subpage"] == "agregar" || 
							$_GET["subpage"] == "editar" ||
							$_GET["subpage"] == "eliminar"){
							include "paginas/modulos/formularios/".$_GET["subpage"].".php";
						}else{
							include "paginas/modulos/profesores/view.php";
						}
					}else{
						include "paginas/404.php";
					}
				}else{
					include "paginas/inicio.php";
				}

				include "paginas/modulos/footer.php";
		?>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

<!-- jQuery -->
<script src="vistas/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="vistas/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="vistas/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="vistas/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="vistas/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="vistas/plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- jQuery Knob Chart -->
<script src="vistas/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="vistas/plugins/moment/moment.min.js"></script>
<script src="vistas/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="vistas/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="vistas/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="vistas/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- FastClick -->
<script src="vistas/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="vistas/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="vistas/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="vistas/js/demo.js"></script>
<!-- maskMoney -->
<script src="vistas/js/jquery.maskMoney.min.js"></script>
<!-- SWEET ALERT 2 -->	
<!-- https://sweetalert2.github.io/ -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- DATA TABES SCRIPT -->
<script src="vistas/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="vistas/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- datepicker -->
<script src="vistas/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#dataTable").DataTable({
		"paging": true,
		"ordering": true,
		"info": true,
	    "autoWidth": true,
		"lengthChange": false,
		"language": idioma_español
	});
  });

  var idioma_español= {
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "Mostrar _MENU_ registros",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Ningún dato disponible en esta tabla",
					"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix":    "",
					"sSearch":         "Buscar:",
					"sUrl":            "",
					"sInfoThousands":  ",",
					"sLoadingRecords": "Cargando...",
					"oPaginate": {
							"sFirst":    "Primero",
							"sLast":     "Último",
							"sNext":     "Siguiente",
							"sPrevious": "Anterior"
					},
					"oAria": {
							"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
							"sSortDescending": ": Activar para ordenar la columna de manera descendente"
					}
			}
</script>
</body>
</html>
