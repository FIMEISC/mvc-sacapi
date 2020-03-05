<?php 
	if($_GET['pagina']=='facultades') { 
		$nombre = "Facultades";
		$subTitulo = "FACULTAD";
		$nombre_singular = "facultad";
	} elseif($_GET['pagina']=='carreras') { 
		$nombre = "Carreras";
		$subTitulo = "CARRERA";
		$nombre_singular = "carrera";
	}
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Gestión de <?php echo $nombre;?>
						<a class="btn btn-outline-success pull-right" href="<?php echo $_GET["pagina"];?>/agregar" title="Agregar nueva <?php echo $nombre_singular;?>" data-toggle="tooltip">
						<i class="fa fa-plus"></i> Agregar</a>
					</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
						<li class="breadcrumb-item active"><?php echo $nombre;?></li>
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
			<div class="card-body" style="display: block;">
				<div class="box-body">
					<?php 
						if($_GET["subpage"] == "exito"){
							echo '<script>

								swal({

									type:"success",
									title: "¡Eliminacion correcta!",
									text: "¡Los datos se han eliminado corrctamente!",
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
						}
					?>

					<table id="dataTable" class="table table-sm table-striped table-hover">
						<thead>
							<tr>
								<th class="center">ID</th>
								<th class="center">NOMBRE DE LA <?php echo $subTitulo; ?></th>
							<?php if($_GET['pagina']=='carreras') { ?>
								<th class="center">FACULTAD PERTENECIENTE</th>
							<?php } ?>
							<th></th>
							</tr>
						</thead>
						<tbody>
							<?php  
								$dataa = new ControladorFac_car();
								if($_GET['pagina']=='facultades'){
									$result = $dataa ->ctrMostrarFac_car("facultades","","");
								}else{
									$result = $dataa ->ctrMostrarFac_car("carreras","","");
								}
								foreach($result as $row){
							?>
									<?php if($_GET['pagina']=='facultades'){ ?>
										<tr>
											<td class="center"><?php echo $row[0]; ?></td>
											<td class="center"><?php echo $row[1] ?></td>
											<td class="center" width="100">
												<a data-toggle='tooltip' data-placement='top' title='Modificar' class='btn btn-success btn-sm' href='<?php echo $_GET["pagina"];?>/editar/<?php echo $row[0];?>'>
													<i style='color:#fff' class='fas fa-edit'></i>
												</a>
												<a data-toggle='tooltip' data-placement='top' title='Eliminar' class='btn btn-danger btn-sm' href='<?php echo $_GET["pagina"];?>/eliminar/<?php echo $row[0];?>'>
													<i style='color:#fff' class="far fa-trash-alt"></i>
												</a>
											</td>
										</tr>
									<?php } else if ($_GET['pagina']=='carreras') { ?>
										<tr>
											<td class="center"><?php echo $row[0] ?></td>
											<td class="center"><?php echo $row[1] ?></td>
											
											<?php 
												$data_fac = new ControladorFac_car();
												$result_fac = $data_fac ->ctrMostrarFac_car("facultades","id_facultad",$row[2]);
											?>

											<td class="center"><?php echo $result_fac['nombre_facultad'];?></td>
											<td class="center" width="100">
												<a data-toggle='tooltip' data-placement='top' title='Modificar' class='btn btn-success btn-sm' href='<?php echo $_GET["pagina"];?>/editar/<?php echo $row[0];?>'>
													<i style='color:#fff' class='fas fa-edit'></i>
												</a>
												<a data-toggle='tooltip' data-placement='top' title='Eliminar' class='btn btn-danger btn-sm' href='<?php echo $_GET["pagina"];?>/eliminar/<?php echo $row[0];?>'>
													<i style='color:#fff' class="far fa-trash-alt"></i>
												</a>
											</td>
										</tr>
									<?php } ?>
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