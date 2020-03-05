<div id="login-box" class="login-box" >
	<div style="color:#669933" class="login-logo">
		<img style="margin-top:-12px" src="img/udc.png" alt="Logo" height="50"> <b>SACAPI</b>
	</div><!-- /.login-logo -->

	<div class="login-box-body">
		<p class="login-box-msg"><i class="fa fa-user icon-title"></i> Ingreso al sistema</p>
		<br/>
		<form method="POST" class="mt-5">
			<div class="form-group has-feedback">
				<input type="text" class="form-control" name="num_c" placeholder="Numero de cuenta" autocomplete="off" required />
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>

			<div class="form-group has-feedback">
				<input type="password" class="form-control" name="password" placeholder="Contraseña" required />
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<br/>
			<?php 
				$ingreso = new ControladorUsuarios();
				$ingreso -> ctrIngresoUsuario();
			?>
			<div class="row" >
				<div class="col-xs-12" >
					<input type="submit" class="btn btn-primary btn-lg btn-block btn-flat" value="Ingresar"/>
				</div><!-- /.col -->
			</div>
		</form>
	</div><!-- /.login-box-body -->
</div><!-- /.login-box -->

