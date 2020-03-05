<?php 
    $res = new ControladorGeneral();
    if($_GET["pagina"] == "facultades"){
        $id_name = "id_facultad";
        $titulo_header = "facultad";
        $titlo_breadcrumb = "Facultades";
        $total_inputs = 1;
    }else if ($_GET["pagina"] == "carreras"){
        $id_name = "id_carrera";
        $titulo_header = "carrera";
        $titlo_breadcrumb = "Carreras";
        $total_inputs = 2;
    }

    $data = $res ->ctrlMostrarGeneral($_GET["pagina"],$id_name,$_GET["id"]);
?>
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
					<form action="">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="id<?php echo $titulo_header; ?>">Nombre <?php echo $titulo_header; ?></label>
                                <input type="email" class="form-control" id="id<?php echo $titulo_header; ?>" value="<?php echo $data["nombre_".$titulo_header.""]?>">
                            </div>
                            <?php if($total_inputs > 1){ 
                                $datafac = $res -> ctrlMostrarGeneral("facultades","id_facultad",$data["id_facultad"]); 
                                $datafact = $res -> ctrlMostrarGeneral("facultades","","");    
                            ?>
                                <div class="form-group">
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