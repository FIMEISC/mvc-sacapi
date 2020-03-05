<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Gestión de alumnos
						<a class="btn btn-outline-success pull-right" href="#" title="Agregar nuevo alumno" data-toggle="tooltip">
						<i class="fa fa-plus"></i> Agregar</a>
					</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
						<li class="breadcrumb-item active">Alumnos</li>
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
					<table id="dataTable" class="table table-sm table-striped table-hover">
						<thead>
							<tr>
								<th class="center">FOTO</th>
								<th class="center">NO. CUENTA</th>
								<th class="center">NOMBRE</th>
								<!-- <th class="center">EMAIL</th> -->
								<th class="center">FACULTAD</th>
								<th class="center">SEMESTRE</th>
								<th class="center">GRUPO</th>
								<th class="center">GENERACION</th>
								<th class="center">NIVEL</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php  
								$dataa = new ControladorAlumnos();
								$result = $dataa ->ctrMostrarAlumnos("alumnos","","");
								foreach($result as $row){
							?>
							<tr> 
								<?php 
									$res_gen = new ControladorGeneral();
									$result_gen = $res_gen -> ctrlMostrarGeneral("generaciones","id_generacion",$row[11]);
									$result_nivel = $res_gen -> ctrlMostrarGeneral("niveles","idnivel",$row[12]);
									$result_fac = $res_gen -> ctrlMostrarGeneral("facultades","id_facultad",$row[15]);

								?>
								<td class="center"><img src="vistas/img/usuarios/default/<?php echo $row[6];?>" alt="Foto de perfil" width='30'></td>
								<td class="center"><?php echo $row[0]; ?></td>
								<td class="center"><?php echo $row[1]; ?> <?php echo $row[2]; ?> <?php echo $row[3]; ?></td>
								<!-- <td class="center"><?php echo $row[5]; ?></td> -->
								<td class="center"><?php echo $result_fac['nombre_facultad']; ?></td>
								<td class="center"><?php echo $row[9]; ?></td>
								<td class="center"><?php echo $row[10]; ?></td>
								
								

								<td class="center"><?php echo $result_gen['nombre_generacion']; ?></td>
								<td class="center"><?php echo $result_nivel['nivel']; ?></td>
								<td class="center" width="100">
									<?php if($row[8]=="activo"){?>
										<a data-toggle="tooltip" data-placement="top" title="Bloquear" style="margin-right:5px" class="btn btn-warning btn-sm" href="">
											<i style="color:#fff" class="fas fa-user-lock"></i>
										</a>
									<?php }else{ ?>
										<a data-toggle="tooltip" data-placement="top" title="Desbloquear" style="margin-right:5px" class="btn btn-warning btn-sm" href="">
											<i style="color:#fff" class="fas fa-unlock"></i>
										</a>
									<?php } ?>
										<a data-toggle="tooltip" data-placement="top" title="Editar" style="margin-right:5px" class="btn btn-success btn-sm" href="">
											<i style="color:#free" class="fas fa-edit"></i>
										</a>
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