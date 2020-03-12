<?php 
	$res = new ControladorGeneral();
	if($_GET["pagina"] == "facultades"){
		$id_name = "id_facultad";
		$titulo_header = "facultad";
		$titlo_breadcrumb = "Facultades";
		$total_inputs = 1;
		$base="facultades";
	}else if ($_GET["pagina"] == "carreras"){
		$id_name = "id_carrera";
		$titulo_header = "carrera";
		$titlo_breadcrumb = "Carreras";
		$total_inputs = 2;
		$base="carreras";
	}else if ($_GET["pagina"] == "alumnos"){
		$id_name = "numcuenta";
		$titulo_header = "alumnos";
		$titlo_breadcrumb = "Alumnos";
		$total_inputs = 2;
		$base="alumnos";
	}else if(($_GET['pagina'] == "directores") || ($_GET['pagina'] == "coordinadores") || ($_GET['pagina'] == "tutores") || ($_GET['pagina'] == "jefes") || ($_GET['pagina'] == "maestros")) {
		$id_name = "numcuenta";
		$titulo_header = "profesor";
		$titlo_breadcrumb = "Profesores";
		$total_inputs = 2;
		$base="profesores";
	}else if ($_GET["pagina"] == "niveles"){
		$titulo_header = "grupos";
		$titlo_breadcrumb = "Grupos";
		$total_inputs = 2;
		$base="niveles";
	}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Agregar <?php echo $titulo_header; ?>
						<a class="btn btn-outline-success pull-right" href="<?php echo $_GET["pagina"];?>" title="" data-toggle="tooltip">
						<i class="fa fa-undo"></i> Regresar</a>
					</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
						<li class="breadcrumb-item"><a href="<?php echo $_GET["pagina"]; ?>"><?php echo $_GET["pagina"]; ?></a></li>
						<li class="breadcrumb-item active">Agregar</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<?php if(($_GET['pagina'] == "facultades") || $_GET['pagina'] == "carreras"){ ?>
	   <?php  $data = $res ->ctrlMostrarGeneral($_GET["pagina"],$id_name,$_GET["id"]); ?>
		<!-- Main content -->
		<section class="content">

			<!-- Default box -->
			<div class="card">
				<div class="card-body" style="display: block;">
					<div class="box-body">
						<form role="form" class="form-horizontal" method="POST" action="ajax/process.php" enctype="multipart/form-data">
							<div class="box-body">
								<div class="form-group">
									<label for="id<?php echo $titulo_header; ?>">Nombre <?php echo $titulo_header; ?></label>
									<input type="text" class="form-control" name="nombre">
								</div>
								<?php if($total_inputs > 1){
									$datafact = $res -> ctrlMostrarGeneral("facultades","","");    
								?>
									<div class="form-group">
										<label>Facultad perteneciente</label>
										<select class="form-control" name="idFacultad" required>
											<option >Selecciona una opcion</option>
											<option style="font-size: 1pt; background-color: #000000;" disabled>&nbsp;</option>
											<?php foreach($datafact as $row){?>
												<option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
											<?php } ?>
										</select>
									</div>
								<?php }?>
							</div>
							<input type="hidden" name="tabla" value="<?php echo $base ?>">
							<input type="hidden" name="value" value="add">
							<div class="box-footer">
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
										<a href="<?php echo $_GET["pagina"];?>" class="btn btn-default btn-reset">Cancelar</a>
									</div>
								</div>
							</div><!-- /.box footer -->
						</form>
					</div>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->

		</section>
	<?php }else if(($_GET['pagina'] == "directores") || ($_GET['pagina'] == "coordinadores") || ($_GET['pagina'] == "tutores") || ($_GET['pagina'] == "jefes") || ($_GET['pagina'] == "maestros")) {?>
		<!-- Main content -->
		<section class="content">

		<!-- Default box -->
		<div class="card">
			<div class="card-body" style="display: block;">
				<div class="box-body">
					<form role="form" class="form-horizontal" method="POST" action="ajax/process.php" enctype="multipart/form-data">
						<div class="box-body">
							<div class="form-group">
								<label class="col-sm-4 control-label">Numero de Trabajador</label>
								<div class="col-sm-12">
								<input type="text" class="form-control" name="num_c" autocomplete="off" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Nombre</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="nombreu" autocomplete="off" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Apellido Paterno</label>
								<div class="col-sm-12">
								<input type="text" class="form-control" name="apellidop" autocomplete="off" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Apellido Materno</label>
								<div class="col-sm-12">
								<input type="text" class="form-control" name="apellidom" autocomplete="off" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Email</label>
								<div class="col-sm-12">
								<input type="email" class="form-control" name="email" autocomplete="off" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Permisos de acceso</label>
								<div class="col-sm-12">
								<select class="form-control" name="permisos_acceso" required>
									<option value=""></option>
									<option value="Director">Director</option>
									<option value="Coordinador">Coordinador</option>
									<option value="Coordinador y Tutor">Coordinador y Tutor</option>
									<option value="Jefe de Carrera">Jefe de carrera</option>
									<option value="Jefe de Carrera y Tutor">Jefe de carrera y Tutor</option>
									<option value="Profesor">Profesor</option>
									<option value="Profesor y Tutor">Profesor y Tutor</option>
									<option value="Tutor">Tutor</option>
								</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Sub permiso de acceso</label>
								<div class="col-sm-12">
								<select class="form-control" name="sub_permiso_acceso" required>
									<option value=""></option>
									<option value="Ninguno">Ninguno</option>
									<option value="Tutor">Tutor</option>
								</select>
								</div>
							</div>

							<?php	$datafact = $res -> ctrlMostrarGeneral("facultades","","");  ?>
								<div class="form-group">
									<label class="col-sm-4 control-label">Facultad perteneciente</label>

									<div class="col-sm-12" style="border: 1px solid #d4cecd; border-radius: 5px 5px 5px 5px;">
										<?php foreach($datafact as $row){?>
											<label class="col-sm-8 control-label"><?php echo $row[1];?></label>
											<input type="checkbox" class="form-control" name="<?php echo $row[0];?>" value="<?php echo $row[0];?>">
										<?php } ?>
									</div>
								</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Contraseña</label>
								<div class="col-sm-12">
									<input type="password" class="form-control" name="password" autocomplete="off">
								</div>
							</div>


							<input type="hidden" name="tipo" value="profesores">
							<input type="hidden" name="url" value="<?php echo $_GET['pagina']?>">
							<input type="hidden" name="value" value="add">
						</div>
						<div class="box-footer">
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
									<a href="<?php echo $_GET["pagina"];?>" class="btn btn-default btn-reset">Cancelar</a>
								</div>
							</div>
						</div><!-- /.box footer -->
					</form>
				</div>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->

		</section>
	<?php }else if($_GET["pagina"] == "alumnos"){ ?>
		<section class="content">
			<div class="card">
			<div class="box box-primary">
				<!-- form start -->
				<form role="form" class="form-horizontal" method="POST" action="ajax/process.php" enctype="multipart/form-data">
					<div class="box-body">

						<div class="form-group">
							<label class="col-sm-2 control-label">Número de cuenta</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="num_c" autocomplete="off" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Nombre</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="nombreu" autocomplete="off" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Apellido paterno</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="apellidop" autocomplete="off" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Apellido materno</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="apellidom" autocomplete="off" required>
							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-12">
								<input type="email" class="form-control" name="email" autocomplete="off" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Facultad</label>
							<div class="col-sm-12">
								<?php  $dataFac = $res ->ctrlMostrarGeneral("facultades","",""); ?>
								<select class="form-control" name="id_facultad" required>
									<?php foreach($dataFac as $key => $data){ ?>
										<option value="<?php echo $data[0] ?>"><?php echo $data[1] ?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Carrera</label>
							<div class="col-sm-12">
								<?php  if($_SESSION["permisos_acceso"] = "Admin") {
									$dataCar = $res ->mdlMostrarCarreraDirector("carreras","", "");
								}else{
									$dataCar = $res ->mdlMostrarCarreraDirector("carreras","id_facultad", $_SESSION["id_facultad"][0]);
								} ?>
								<select class="form-control" name="id_carr" required>
									<?php foreach($dataCar as $dataRC){ ?>
										<option value="<?php echo $dataRC[0] ?>"><?php echo $dataRC[1] ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
	
						<div class="form-group">
							<label class="col-sm-2 control-label">Semestre</label>
							<div class="col-sm-12">
								<select class="form-control" name="semestre" required>
									<option value="">Seleccione una opcion</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Grupo</label>
							<div class="col-sm-12">
								<select class="form-control" name="grupo" required>
									<option value="">Seleccione una opcion</option>
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="C">C</option>
									<option value="D">D</option>
									<option value="E">E</option>
									<option value="F">F</option>
									<option value="G">G</option>
									<option value="H">H</option>
									<option value="I">I</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Generación</label>
							<div class="col-sm-12">
								<?php  $dataGen = $res ->ctrlMostrarGeneral("generaciones","",""); ?>
								<select class="form-control" name="generacion" required>
									<option value="">Seleccione una opcion</option>
									<?php foreach($dataGen as $data){ ?>
										<option value="<?php echo $data[0] ?>"><?php echo $data[1] ?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Profesor de ingles</label>
							<div class="col-sm-12">
								<select class="form-control" name="id_nivel" required>
								<?php
									$dataPro = $res ->ctrlMostrarGeneral("niveles","","");
								?>
									<option value="">Seleccione una opcion</option>
									<?php foreach($dataPro as $data){ 
										$dataProR = $res ->ctrlMostrarGeneral("profesores","numcontrol","$data[4]"); 		
									?>
										<option value="<?php echo $data[4]; ?>"><?php echo $data[1].$data[2],' | '.$dataProR["nombreu"]." ".$dataProR["apellidop"]." ".$dataProR["apellidom"]; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tutor</label>
							<div class="col-sm-12">
								<select class="form-control" name="idtutor" required>
									<option value="">Seleccione una opcion</option>
									<?php
										$dataTut = $res -> ctrlMostrarTutores();
										foreach ($dataTut as $data) {?>
										<option value="<?php echo $data[1] ?>">
											<?php echo $data[2],' ',$data[3],' ',$data[4]; ?>
										</option><?php 
									}?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Contraseña</label>
							<div class="col-sm-12">
								<input type="password" class="form-control" name="password" autocomplete="off" required>
							</div>
						</div>

						<input type="hidden" name="tipo" value="alumnos">
						<input type="hidden" name="url" value="<?php echo $_GET['pagina']?>">
						<input type="hidden" name="value" value="add">
					</div><!-- /.box body -->

					<div class="box-footer">
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
								<a href="<?php echo $_GET["pagina"]?>" class="btn btn-default btn-reset">Cancelar</a>
							</div>
						</div>
					</div><!-- /.box footer -->
				</form>
			</div><!-- /.box -->
			</div>
		</section><!-- /.content -->
	<?php }else if(($_GET['pagina'] == "niveles")){ ?>
		<!-- Main content -->
		<section class="content">

			<!-- Default box -->
			<div class="card">
				<div class="card-body" style="display: block;">
					<div class="box-body">
						<form role="form" class="form-horizontal" method="POST" action="ajax/process.php" enctype="multipart/form-data">
							<div class="box-body">
								<div class="form-group">
									<label class="col-sm-2 control-label">Semestre</label>
									<div class="col-sm-12">
										<select class="form-control" name="semestre" required>
											<option value="">Seleccione una opcion</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Grupo</label>
									<div class="col-sm-12">
										<select class="form-control" name="grupo" required>
										<option value="">Seleccione una opcion</option>
											<option value="A">A</option>
											<option value="B">B</option>
											<option value="C">C</option>
											<option value="D">D</option>
											<option value="E">E</option>
											<option value="F">F</option>
											<option value="G">G</option>
											<option value="H">H</option>
											<option value="I">I</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Nivel</label>
									<div class="col-sm-12">
										<select class="form-control" name="nivel" required>
										<option value="">Seleccione una opcion</option>
											<option value="A1">A1</option>
											<option value="A2">A2</option>
											<option value="B1">B1</option>
											<option value="B1-">B1-</option>
											<option value="B1+">B1+</option>
											<option value="B2">B2</option>
											<option value="B2-">B2-</option>
											<option value="B2+">B2+</option>
											<option value="C">C</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Profesor de ingles</label>
									<div class="col-sm-12">
										<select class="form-control" name="id_nivel" required>
										<?php  $dataPro = $res ->ctrlMostrarGeneralTodos("profesores","permisos_acceso","Profesor"); ?>
											<option value="">Seleccione una opcion</option>
											<?php foreach($dataPro as $data){ ?>
												<option value="<?php echo $data[1]; ?>"><?php echo $data[2],' ',$data[3],' ',$data[4]; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>

								<input type="hidden" name="tipo" value="grupos">
								<input type="hidden" name="value" value="add">
								<input type="hidden" name="tabla" value="niveles">

							</div>
							<input type="hidden" name="tabla" value="<?php echo $base ?>">
							<input type="hidden" name="value" value="add">
							<div class="box-footer">
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
										<a href="<?php echo $_GET["pagina"];?>" class="btn btn-default btn-reset">Cancelar</a>
									</div>
								</div>
							</div><!-- /.box footer -->
						</form>
					</div>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->

		</section>
	<?php } ?>
</div>