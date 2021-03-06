<?php 
	if ($_GET["pagina"]=="maestros"){
		$txtTitle = "Gestión de profesores";
		$txtButton = "Agregar Profesor";
		$typeProfesor = 1;
		$Permiso_acceso = "Profesor";
		$_ok = true;
	}
	elseif ($_GET["pagina"]=="tutores"){
		$txtTitle = "Gestión de tutores";
		$txtButton = "Agregar Tutor";
		$typeProfesor = 2;			
		$_ok = false;			
	}
	elseif ($_GET['pagina'] == 'coordinadores'){
		$txtTitle = "Gestión de coordinadores";
		$txtButton = "Agregar Coordinador";
		$typeProfesor = 3;
		$Permiso_acceso = "Coordinador";
		$_ok = true;
		
	}
	elseif ($_GET['pagina'] == 'jefes'){
		$txtTitle = "Gestión de jefes de carrera";
		$txtButton = "Agregar Jefe de carrera";
		$typeProfesor = 4;
		$Permiso_acceso = "Jefe de carrera";
		$_ok = true;
	}
	elseif ($_GET['pagina'] == 'directores'){
		$txtTitle = "Gestión de directores";
		$txtButton = "Agregar Director";
		$typeProfesor = 5;
		$Permiso_acceso = "Director";
		$_ok = true;
	}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark"><?php echo $txtTitle?>
							<a class="btn btn-outline-success pull-right" href="<?php echo $_GET["pagina"];?>/agregar" title="Agregar nueva <?php echo $nombre_singular;?>" data-toggle="tooltip">
							<i class="fa fa-plus"></i> Agregar</a>
						</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
							<li class="breadcrumb-item active"><?php echo $Permiso_acceso; ?></li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<!-- Default box -->
			<div class="card">
				<div class="card-body" >
					<div class="box-body" style="overflow: hidden;">
					<?php 
						if($_GET["subpage"] == "exito"){
							echo '<script>

								swal({

									type:"success",
									title: "¡Eliminacion correcta!",
									text: "¡Los datos se han eliminado correctamente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"

								}).then(function(result){if(result.value){}});	

							</script>';
						}else if ($_GET["subpage"] == "error"){
							echo '<script>

								swal({

									type:"error",
									title: "¡Ocurrio un error!",
									text: "¡Ha ocurrido un error, por favor vuelva a intentarlo!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"

								}).then(function(result){if(result.value){}});	

							</script>';
						}else if($_GET["subpage"] == "exitoe"){
							echo '<script>

								swal({

									type:"success",
									title: "¡Modificacion correcta!",
									text: "¡Los datos se han modificado correctamente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"

								}).then(function(result){if(result.value){}});	

							</script>';
						}else if($_GET["subpage"] == "exitop"){
							echo '<script>

								swal({

									type:"success",
									title: "¡Ha sido registrada correctamente!",
									text: "¡Los datos se han agregado correctamente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"

								}).then(function(result){if(result.value){}});	

							</script>';
						}
					?>
						<table id="dataTable" class="table table-sm  table-striped table-hover">
							<thead>
								<tr>
									<th class="center">FOTO</th>
									<th class="center">NO. DE TRABAJADOR</th>
									<th class="center">NOMBRE</th>
									<th class="center">EMAIL</th>
									<th class="center">PERMISO DE ACCESO</th>
									<th class="center">SUB PERMISO(TUTORES)</th>
									<th class="center">FACULTAD PERTENECIENTE</th>
									<th class="center">STATUS</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							<?php  
								$data = new ControladorGeneral();
								if($_GET['pagina'] != "tutores"){
									$res = $data ->ctrlMostrarGeneralTodos("profesores","permisos_acceso",$Permiso_acceso);
								}else{
									$res = $data ->ctrlMostrarTutores();
								}
								foreach($res as $key => $row){
							?>	
								<tr>			
									<td class='center'><img class='img-user' src='vistas/img/usuarios/default/<?php echo $row[7]; ?>' width='30'></td>
									<td class='center'><?php echo $row[1] ?></td>
									<td class='center' style='text-align:left;'><?php echo $row[2]; echo " "; echo $row[3]; echo " "; echo $rows[4]; ?></td>
									<td class='center'><?php echo $row[6] ?></td>
									<td class='center'><?php echo $row[8] ?></td>
									<td class='center'><?php echo $row[9] ?></td>
									<?php 
										$data = new ControladorFac_car();
										$res_fac = $data -> ctrMostrarFac_car("facultades","id_facultad",$row[11]);
									?>

									<td class='center'><?php echo $res_fac['nombre_facultad'] ?></td>
									
									
									<td class='center'><?php echo $row[9] ?></td>
									<td class='center' width='100'>
										<div>
										<?php if ($row[9] == "activo") { ?>
											<a data-toggle="tooltip" data-placement="top" title="Bloquear" style="margin-right:5px" class="btn btn-warning btn-sm" href="">
												<i style="color:#fff" class="fas fa-user-lock"></i>
											</a>
										<?php } else { ?>
											<a data-toggle="tooltip" data-placement="top" title="Desbloquear" style="margin-right:5px" class="btn btn-warning btn-sm" href="">
												<i style="color:#fff" class="fas fa-unlock"></i>
											</a>
										<?php } ?>
											<a data-toggle="tooltip" data-placement="top" title="Editar" style="margin-right:5px" class="btn btn-success btn-sm" href="<?php echo $_GET["pagina"];?>/editar/<?php echo $row[1] ?>">
												<i style="color:#free" class="fas fa-edit"></i>
											</a>
										</div>
									</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>

					</div>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->

    	</section>
	</div>