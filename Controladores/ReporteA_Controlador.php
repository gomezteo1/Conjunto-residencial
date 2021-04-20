<?php 
	Class ReporteA_Controlador{
		public function __construct(){}
		public function index(){
			require_once('reportes/reportes_abono.php');	
		}
	}
	if(isset($_GET['action'])){
		if($_GET['action']=='index'){
			$controlador = new ReporteA_Controlador();
			$controlador->index();
		}
	}
 ?>