<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="inicio" class="nav-link">Inicio</a>
		</li>
		<?php if(($_SESSION["permisos_acceso"] == "Admin") || ($_SESSION["permisos_acceso"] == "Director" ) || ($_SESSION["permisos_acceso"] == "Coordinador" ) || ($_SESSION["permisos_acceso"] == "Jefe de Carrera" ) || ($_SESSION["permisos_acceso"] == "Profesor" ) ) { ?>
			<li class="nav-item d-none d-sm-inline-block">
				<a href="reportes" class="nav-link">Reportes</a>
			</li>
		<?php } ?>
	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
				<img src="vistas/img/usuarios/default/<?php echo $_SESSION['foto_perfil']; ?>" class="img-circle elevation-1" alt="User Image" style="width:35px; height:35px;"/>
				<span class="hidden-xs"><?php echo $_SESSION['nombreu']; ?> <i style="margin-left:5px" class="fa fa-angle-down"></i></span>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<span class="dropdown-item dropdown-header">Notificaciones</span>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<i class="fas fa-envelope mr-2"></i> Sin Notificaciones
					<span class="float-right text-muted text-sm"> --- </span>
				</a>
				<div class="dropdown-divider"></div>
				<span class="dropdown-item dropdown-header"> Configuración </span>
				<div class="dropdown-divider"></div>
					<div style="margin-left:20px; padding:10px;">
						<a href="perfil" class="btn bg-gradient-success btn-sm">Ver Perfil</a>
						<a href="#" class="btn bg-gradient-success btn-sm">Notificaciones</a>
						<a href="salir" class="btn bg-gradient-success btn-sm">Salir</a>
					</div>
			</div>
      </li>
	</ul>
</nav>
<!-- /.navbar -->