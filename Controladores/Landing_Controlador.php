<?php 
	class Landing_Controlador{   
		public function __construct(){}
		public function landing(){
			require_once('Vistas/Landing/landing.php');
		}
		public function inicio(){
			require_once('Vistas/Landing/landing.php');
		}
		public function contactanos(){ 
			require_once('Vistas/Landing/contactanos.php');
		}
		public function acercaDe(){ 
			require_once('Vistas/Landing/acercaDe.php');
		}
	}
?>
