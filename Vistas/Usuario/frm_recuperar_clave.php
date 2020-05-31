<?php
	
?>

<html>
	<head>
		<title>Recuperar Clave</title>
		
	</head>
	
	<body>
		
		<div class="container">    
			<div id="loginbox" style="margin-top:20%;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
				<div class="panel panel-info" >
					<div class="panel-heading">
						<div class="panel-title">Recuperar Clave</div>
						<!--<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="?controller=usuario&action=frm_login">Iniciar Sesi&oacute;n</a></div>
					</div> -->    
					
					<div style="padding-top:75px" class="panel-body" >
						
						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						<div id="registrar">
							
						

						<form id="resRegistrar" class="form-horizontal" role="form" action="Controladores/Usuario_Controlador.php" method="POST" autocomplete="on">
							
							<div style="margin-bottom: 50px" class="input-group">
								<span class="input-group-addon">
								<i class="glyphicon glyphicon-user"></i>
								</span>
								<input id="correo_recuperacion" type="correo_recuperacion" class="form-control" name="correo_recuperacion" placeholder="Correo de recuperacion">                                        
							</div>
							   <input type='hidden' name='action' id="action" value='recuperarClave'>
							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls">
									<button id="buttonR" class="btn btn-primary" value="resRegistrar">Recuperar
                                        Clave</button>
                                    <div id="resRegistrar" style="width:100%; margin:0px; padding:0px;">
                                    </div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-12 control">
									<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
										¿No tiene Una Cuenta? 
										<a href="?controller=usuario&action=frm_registrar_usuario">¡Registrate Aqui!</a>
									</div>
								</div>
							</div>    
						</form>
					</div>
					
					</div>                     
				</div>  
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="js/recuperarPass.js"></script>
	</body>
</html>


<script type="text/javascript">

$(document).ready(function(){
		$('#action').click(function(){

			if($('#correo_recuperacion').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Correo Alternativo!',
					})
					return false;
			}
			else
				swal({
						title: "Hecho!",
						text: "Se ha actualizado correctamente",
						icon: "info",
						button: "Continuar",
					});
		});
	});

	

</script>

