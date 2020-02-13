<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<title>Formulario</title>
	<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<meta name="description" content="Add your business website description here">
	<meta name="keywords" content="Add your business website keywords here">
	<link href="favicon.html" rel="icon">	
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/contact-form.css" type="text/css">	

	<style type="text/css">
		.ww{ position: relative; box-shadow: 5px 5px 10px black; /*box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);*/ padding: 10px; background: white;}
	</style> -->
</head>
<body>
	<section id="contact-form-section" class="form-content-wrap">
		<div class="container">
			<div class="row">
				<div class="tab-content">
					<div class="col-sm-12">
						<div class="item-wrap ww">
							<div class="row ">
								
								<div class="col-sm-12 ">
									<div class="item-content colBottomMargin">
										<div class="item-info">
											<h2 class="item-title text-center">Formulario</h2>
											
										</div><!--End item-info -->
										
								   </div><!--End item-content -->
								</div><!--End col -->
								<div class="col-md-12">
								<form action="Controladores/Cuenta_cobro_Controlador.php" method="POST" data-toggle="validator" class="popup-form">
								<input type='hidden' name='action' value='modificar_cuenta_cobro'>                 
								<input hidden readonly name='codigo_cuenta_cobro' id='codigo_cuenta_cobro' value="<?php echo $_GET['codigo_cuenta_cobro'] ?>"  type="text">
							    
								<div class="row">
													<div id="msgContactSubmit" class="hidden"></div>
													
													<div class="form-group col-sm-6"> 
														<div class="help-block with-errors"></div>
														<input name="numero_cuenta" id="numero_cuenta" placeholder="Numero Cuenta*"
														value="<?php echo $cuenta_cobro->numero_cuenta;?>" class="w3-input" type="text" required data-error="Por favor ingresar el tipo pago"> 
														</div><!-- end form-group -->

													<div class="form-group col-sm-6">
														<div class="help-block with-errors"></div>
														<input name="nit" id="nit" placeholder="Nit*" value="<?php echo $cuenta_cobro->nit; ?>" class="w3-input" type="text" required data-error="Por favor escribir la descricion de tipo pago"> 
                                       </div><!-- end form-group -->
                                       
      <div class="form-group col-sm-6">
                                       <?php
      $llenar_select_usuario="si";
      require_once("Controladores/Usuario_Controlador.php");
      ?>
      </div><!-- end form-group -->
      <div class="form-group col-sm-6">
                                       <?php
      $llenar_select_inmueble="si";
      require_once("Controladores/Inmueble_Controlador.php");
      ?>
      </div><!-- end form-group -->

      <div class="form-group col-sm-6">
                                       <?php
      $llenar_select_month="si";
      require_once("Controladores/Month_Controlador.php");
      ?>
      </div><!-- end form-group -->

      <div class="form-group col-sm-6">
                                       <?php
      $llenar_select_tipo_pago="si";
      require_once("Controladores/Tipo_pago_Controlador.php");
      ?>
      </div><!-- end form-group -->
                                        <div class="form-group col-sm-6">
														<div class="help-block with-errors"></div>
														<input name="fecha" id="fecha" placeholder="Fecha del pago*" value="<?php echo $cuenta_cobro->fecha; ?>" class="w3-input" type="date" required data-error="Por favor escribir la fecha de pago"> 
                                       </div><!-- end form-group -->

                                       <div class="form-group col-sm-6">
														<div class="help-block with-errors"></div>
														<input value="<?php echo $cuenta_cobro->codigo_mora ?>" name="codigo_mora" id="codigo_mora" placeholder="Mora*" value='<?php echo $cuenta_cobro->codigo_mora; ?>' class="w3-input" type="number" required data-error="Por favor escribir el monto por pagar"> 
                                       </div><!-- end form-group -->

                                       
										<div class="form-group col-sm-6">
														<div class="help-block with-errors"></div>
														<input type="number" id="monto_por_cancelar" name="monto_por_cancelar" placeholder="Total*" value='<?php echo $cuenta_cobro->monto_por_cancelar; ?>' class="w3-input" type="number" required data-error="Por favor escribir el monto por pagar">                                       </div><!-- end form-group -->
										</div><!-- end form-group -->

										<div class="form-group last col-sm-6">
										<input algin="center" type='submit' value='Guardar'>
													  
													

                                                    </div><!-- end form-group -->	
                                            <br>
                                            <br>
													<span class="sub-text">* Campos requeridos</span>
													<div class="clearfix"></div>
												</div><!-- end row -->
											</form><!-- end form -->
							
								</div>
							</div><!--End row -->
							
						
								
							
							<!-- Popup end -->
							
						</div><!-- end item-wrap -->
					</div><!--End col -->
				</div><!--End tab-content -->
			</div><!--End row -->
		</div><!--End container -->
	</section>
	
<div class="colBottomMargin">
		&nbsp;<div class="colBottomMargin">&nbsp;</div>
	</div>	
	
	<a href="#" class="scrollup"><i class="fa fa-arrow-circle-up"></i></a>
		
	<!-- jQuery Library -->
	<script src="js/jquery-3.2.1.min.js"></script>	
	<!-- Popper js -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap Js -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Form Validator -->
	<script src="js/validator.min.js"></script>
	<!-- Contact Form Js -->
	<script src="js/contact-form.js"></script>
	
</body>
</html>
