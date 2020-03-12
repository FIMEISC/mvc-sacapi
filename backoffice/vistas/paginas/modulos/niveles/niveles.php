<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Gestión de grupos de ingles
						<a class="btn btn-outline-success pull-right" href="niveles/agregar" title="Agregar nuevo nivel" data-toggle="tooltip">
						<i class="fa fa-plus"></i> Agregar</a>
					</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
						<li class="breadcrumb-item active">Grupos de ingles</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<?php 
			if($_GET["subpage"] == "exitoalum"){
				echo '<script>

					swal({

						type:"success",
						title: "¡Eliminacion correcta!",
						text: "¡Alumno eliminado correctamente del nivel!",
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
		<!-- Default box -->
		<div class="card">
			<div class="card-body" style="display: block;">
				<div class="box-body">
					<table id="dataTable" class="table table-sm table-striped table-hover">
						<thead>
							<tr>
								<th class="center">SEMESTRE</th>
								<th class="center">GRUPO</th>
								<th class="center">NIVEL</th>
								<th class="center">PROFESOR ASIGNADO</th>
								<th class="center">FACULTAD</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php  
								$dataa = new ControladorFac_car();
								$result = $dataa ->ctrMostrarFac_car("niveles","","");
								foreach($result as $row){

									$dat = new ControladorGeneral();
									$data = $dat -> ctrlMostrarGeneral("profesores","numcontrol",$row[4]);
									$dataF = $dat -> ctrlMostrarGeneral("facultades","id_facultad",$data["idFacultad"]);
							?>
								<tr>
									<td class="center"><?php echo $row[1]; ?></td>
									<td class="center"><?php echo $row[2]; ?></td>
									<td class="center"><?php echo $row[3]; ?></td>
									<td class="center"><?php echo $data['nombreu']; echo " "; echo $data['apellidop']; echo " "; echo $data['apellidom']; ?></td>
									<td class="center"><?php echo $dataF["nombre_facultad"]; ?></td>
									<input type="hidden" name="grupoV" value="<?php echo $row[2]; ?>">
									<input type="hidden" name="semestreV" value="<?php echo $row[1]; ?>">
									<input type="hidden" name="idProfesorV" value="<?php echo $row[3]; ?>">
									<input type="hidden" name="idFacultadV" value="<?php echo $data["idFacultad"]; ?>">
									<td class="center" width="150">
										<a data-toggle='tooltip' data-placement='top' title='Ver nivel' class='btn btn-success btn-sm' href='niveles/ver/<?php echo $row[4]; ?>/<?php echo $row[1]; ?>/<?php echo $row[2]; ?>'>
											<i style='color:#fff' class='far fa-eye'></i>
										</a>
										<a data-toggle='tooltip' data-placement='top' title='Editar nivel' class='btn btn-success btn-sm' href='niveles/editar/<?php echo  $row[0]?>'>
											<i style='color:#fff' class='fas fa-edit'></i>
										</a>
										<!-- <a data-toggle='tooltip' data-placement='top' title='Eliminar nivel' class='btn btn-danger btn-sm' href='niveles/eliminar/<?php echo  $row[0]?>'>
											<i style='color:#fff' class="far fa-trash-alt"></i>
										</a> -->
									</td>
								</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->

	</section>
</div>