<?php
 require_once('conexion.php');
	// la variable controller guarda el nombre del controlador y action guarda la acción por ejemplo registrar 
	//si la variable controller y action son pasadas por la url desde layout.php entran en el if
	if(isset($_GET['controller']) && isset($_GET['action'])
	) {
		
	 if($_GET['controller'] =='reporte'){
		$controller=$_GET['controller'];
		$action=$_GET['action'];
		//$codigo_factura =$_GET['codigo_factura'];
		require_once('Controladores/Reporte_Controlador.php');
		}
	 
	else if($_GET['controller'] =='reportea'){
		
		$controller=$_GET['controller'];
		$action=$_GET['action'];
		//$codigo_factura =$_GET['codigo_factura'];
		require_once('Controladores/ReporteA_Controlador.php');
		
		}
		
	else if($_GET['controller'] =='reportec'){
		
		$controller=$_GET['controller'];
		$action=$_GET['action'];
		//$codigo_factura =$_GET['codigo_factura'];
		require_once('Controladores/ReporteC_Controlador.php');
		
		}	
	else{ 
			$controller=$_GET['controller'];
			$action=$_GET['action'];	
			require_once('Vistas/layout.php');
		}
	}



/*else if( $_GET['controller']==null){
		require_once('Vistas/layout.php');
	    //$controller='usuario';
		//$action='index';

		}*/




	 else {
		$controller='landing';
		$action='landing';
		require_once('Vistas/layout.php');

	}	
	//carga la vista layout.php
?>

