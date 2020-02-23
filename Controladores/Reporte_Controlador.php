<?php 
Class Reporte_Controlador{


	public function __construct(){}

	public function index(){
		
	require_once('reportes/reportes_pago.php');	

	}

}
if(isset($_GET['action'])){
 	if($_GET['action']=='index'){
		$controlador = new Reporte_Controlador();
		$controlador->index();
			}
}
 ?>