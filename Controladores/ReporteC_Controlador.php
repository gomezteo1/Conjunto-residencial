<?php 
	Class ReporteC_Controlador{
		public function __construct(){}
		public function index(){
			require_once('reportes/reporte_cuenta_cobro.php');	
		}

	}
	if(isset($_GET['action'])){
		if($_GET['action']=='index'){
			$controlador = new ReporteC_Controlador();
			$controlador->index();
		}
	}
 ?> 