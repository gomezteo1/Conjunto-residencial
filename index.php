<?php
 	require_once('conexion.php');
	if(isset($_GET['controller']) && isset($_GET['action'])) {
		if($_GET['controller'] =='reporte'){
			$controller=$_GET['controller'];
			$action=$_GET['action'];
			require_once('Controladores/Reporte_Controlador.php');
		}
		else if($_GET['controller'] =='reportea'){
			$controller=$_GET['controller'];
			$action=$_GET['action'];
			require_once('Controladores/ReporteA_Controlador.php');
		}
		else if($_GET['controller'] =='reportec'){
			$controller=$_GET['controller'];
			$action=$_GET['action'];
			require_once('Controladores/ReporteC_Controlador.php');
		}	
		else{ 
				$controller=$_GET['controller'];
				$action=$_GET['action'];	
				require_once('Vistas/layout.php');
		}
	}
	else {
		$controller='landing';
		$action='landing';
		require_once('Vistas/layout.php');
	}	
?>

