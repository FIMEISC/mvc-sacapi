<?php 
    $res = new ControladorGeneral();
    if($_GET["pagina"] == "facultades"){
        $id_name = "id_facultad";
        $titulo_header = "facultad";
		$titlo_breadcrumb = "Facultades";
		$base="facultades";
        $total_inputs = 1;
    }else if ($_GET["pagina"] == "carreras"){
        $id_name = "id_carrera";
        $titulo_header = "carrera";
        $titlo_breadcrumb = "Carreras";
		$total_inputs = 2;
		$base="carreras";
    }

    $data = $res ->ctrlMostrarGeneral($_GET["pagina"],$id_name,$_GET["id"]);
?>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Editar <?php echo $titulo_header; ?>
						<a class="btn btn-outline-success pull-right" href="<?php echo $_GET["pagina"];?>" title="Editar" data-toggle="tooltip">
						<i class="fa fa-undo"></i> Regresar</a>
					</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
						<li class="breadcrumb-item"><a href="<?php echo $_GET["pagina"]; ?>"><?php echo $titlo_breadcrumb; ?></a></li>
                        <li class="breadcrumb-item active">Editar</li>
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
				<form role="form" class="form-horizontal" method="POST" action="ajax/editar_proces.php" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="id<?php echo $titulo_header; ?>">Nombre <?php echo $titulo_header; ?></label>
                                <input type="text" class="form-control" name="nombre" id="id<?php echo $titulo_header; ?>" value="<?php echo $data["nombre_".$titulo_header.""]?>">
								<input type="hidden" name="id" value="<?php echo $data["id_".$titulo_header.""]?>">
								<input type="hidden" name="tabla" value="<?php echo $base ?>">
                            </div>
                            <?php if($total_inputs > 1){ 
                                $datafac = $res -> ctrlMostrarGeneral("facultades","id_facultad",$data["id_facultad"]); 
                                $datafact = $res -> ctrlMostrarGeneral("facultades","","");    
                            ?>
                                <div class="form-group">
									<input type="hidden" name="id_facultad" value="<?php echo $datafac["id_facultad"]; ?>">
                                    <label>Facultad perteneciente</label>
                                    <select class="form-control" name="facultad_perteneciente" required>
                                        <option value="<?php echo $datafac["id_facultad"];?>"><?php echo $datafac["nombre_facultad"];?></option>
                                        <option style="font-size: 1pt; background-color: #000000;" disabled>&nbsp;</option>
                                        <?php foreach($datafact as $row){?>
                                            <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <?php }?>
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
</div>