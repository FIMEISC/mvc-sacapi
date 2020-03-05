<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="inicio" class="brand-link navbar-success">
		<img src="vistas/img/plantilla/udc.png" alt="Universidad de Colima logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">SACAPI</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="vistas/img/usuarios/default/user-default.png" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<?php if($_SESSION['permisos_acceso'] != "Alumno"){ ?>
					<a href="perfil" class="d-block"><?php echo $_SESSION['nombreu']; echo " "; echo $_SESSION['apellidop'];?></a>
				<?php } else { ?>
					<a href="perfil" class="d-block"><?php echo $_SESSION['nombreu']; echo " "; echo $_SESSION['apellidop'];?>
						<p style="font-size:12px;"><?php echo $_SESSION['permisos_acceso']; echo " ";?><span class="badge badge-info right"><?php echo $_SESSION['semestre']; echo $_SESSION['grupo'];?></span></p>
					</a>
				<?php } ?>
			</div>
		</div> -->
asdsadsa
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-header">MENU</li>
				<li class="nav-item"> <!-- Inicio-->
					<a href="inicio" class="nav-link">
						<i class="nav-icon fas fa-home"></i>
						<p>Inicio</p>
					</a>
				</li>
				<?php if($_SESSION["pass_check"] != 0) { ?> <!-- Revision de Cambio de contraseña-->
					
					<?php if(($_SESSION["permisos_acceso"] == "Admin") || ($_SESSION["permisos_acceso"] == "Profesor" )) { ?>
						<!-- <li class="nav-item"> Captura de Calificaciones AP
							<a href="<?php echo $ruta_backoffice;?>calificaciones" class="nav-link">
								<i class="nav-icon fas fa-edit"></i>
								<p>Captura de calificaciones</p>
							</a>
						</li> -->
					<?php } ?>
					<?php if(($_SESSION["permisos_acceso"] == "Admin")) { ?>
						<li class="nav-item"> <!-- Facultades A -->
							<a href="<?php echo $ruta_backoffice;?>facultades" class="nav-link">
								<i class="nav-icon fas fa-university"></i>
								<p>Facultades</p>
							</a>
						</li>
					<?php } ?>
					<?php if(($_SESSION["permisos_acceso"] == "Admin") || ($_SESSION["permisos_acceso"] == "Director" ) || ($_SESSION["permisos_acceso"] == "Coordinador" ) ) { ?>
						<li class="nav-item"> <!-- Carreras ADC -->
							<a href="<?php echo $ruta_backoffice;?>carreras" class="nav-link">
								<i class="nav-icon fas fa-graduation-cap"></i>
								<p>Carreras</p>
							</a>
						</li>
					<?php } ?>
					<?php if(($_SESSION["permisos_acceso"] == "Admin") || ($_SESSION["permisos_acceso"] == "Director" ) || ($_SESSION["permisos_acceso"] == "Coordinador" ) || ($_SESSION["permisos_acceso"] == "Jefe de Carrera" ) ) { ?>
						<li class="nav-item has-treeview"> <!-- Personal Docente / Administrativo -->
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-edit"></i>
								<p>
									Personal Docente/Adm
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<?php if(($_SESSION["permisos_acceso"] == "Admin")){ ?>
									<li class="nav-item"> <!-- A -->
										<a href="<?php echo $ruta_backoffice;?>directores" class="nav-link">
											<i class="nav-icon fas fa-circle"></i>
											<p>Directores</p>
										</a>
									</li>
								<?php } ?>
								<?php if(($_SESSION["permisos_acceso"] == "Admin") || ($_SESSION["permisos_acceso"] == "Director" )){ ?>
									<li class="nav-item"> <!-- AD -->
										<a href="<?php echo $ruta_backoffice;?>coordinadores" class="nav-link">
											<i class="nav-icon fas fa-circle"></i>
											<p>Coordiadores</p>
										</a>
									</li>
								<?php } ?>
								<?php if(($_SESSION["permisos_acceso"] == "Admin") || ($_SESSION["permisos_acceso"] == "Director" ) || ($_SESSION["permisos_acceso"] == "Coordinador" )){ ?>
									<li class="nav-item"> <!-- ADC -->
										<a href="<?php echo $ruta_backoffice;?>tutores" class="nav-link">
											<i class="nav-icon fas fa-circle"></i>
											<p>Tutores</p>
										</a>
									</li>
									<li class="nav-item"> <!-- ADC -->
										<a href="jefes" class="nav-link">
											<i class="nav-icon fas fa-circle"></i>
											<p>Jefes de carrera</p>
										</a>
									</li>
								<?php } ?>
								<?php if(($_SESSION["permisos_acceso"] == "Admin") || ($_SESSION["permisos_acceso"] == "Director" ) || ($_SESSION["permisos_acceso"] == "Coordinador" ) || ($_SESSION["permisos_acceso"] == "Jefe de Carrera" ) ) { ?>
									<li class="nav-item"> <!-- ADCJ -->
										<a href="<?php echo $ruta_backoffice;?>maestros" class="nav-link">
											<i class="nav-icon fas fa-circle"></i>
											<p>Maestros de ingles</p>
										</a>
									</li>
								<?php } ?>
							</ul>
						</li>
						<li class="nav-item"> <!-- Alumnos ADCJ -->
							<a href="alumnos" class="nav-link">
								<i class="nav-icon fas fa-user-graduate"></i>
								<p>Alumnos</p>
							</a>
						</li>
					<?php } ?>
					<?php if(($_SESSION["permisos_acceso"] == "Admin")) { ?>
						<li class="nav-item"> <!-- Niveles A-->
							<a href="<?php echo $ruta_backoffice;?>niveles" class="nav-link">
								<i class="nav-icon fas fa-layer-group"></i>
								<p>Niveles</p>
							</a>
						</li>
					<?php } ?>
					<?php if(($_SESSION["permisos_acceso"] == "Admin") || ($_SESSION["permisos_acceso"] == "Director" ) || ($_SESSION["permisos_acceso"] == "Coordinador" ) || ($_SESSION["permisos_acceso"] == "Jefe de Carrera" ) || ($_SESSION["permisos_acceso"] == "Profesor" ) ) { ?>
						<li class="nav-item"> <!-- Reportes ADCJP -->
							<a href="<?php echo $ruta_backoffice;?>reportes" class="nav-link">
								<i class="nav-icon fas fa-poll"></i>
								<p>Reportes</p>
							</a>
						</li>
					<?php } ?>
					<?php if(($_SESSION["permisos_acceso"] == "Profesor")) { ?>
						<li class="nav-item"> <!-- Mis Grupos P-->
							<a href="<?php echo $ruta_backoffice;?>misgrupos" class="nav-link">
								<i class="nav-icon fas fa-users"></i>
								<p>Mis grupos</p>
							</a>
						</li>
						<li class="nav-item"> <!-- Mis Tutorados P-->
							<a href="<?php echo $ruta_backoffice;?>misgrupos" class="nav-link">
								<i class="nav-icon fas fa-users"></i>
								<p>Mis tutorados</p>
							</a>
						</li>
					<?php } ?>
					<?php if(($_SESSION["permisos_acceso"] == "Alumno")) { ?>
						<li class="nav-item"> <!-- Mis Resultados A-->
							<a href="<?php echo $ruta_backoffice;?>misgrupos" class="nav-link">
								<i class="nav-icon fas fa-poll"></i>
								<p>Mis resultados</p>
							</a>
						</li>
					<?php } ?>
				<?php } ?>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
<!-- /.sidebar -->
</aside>