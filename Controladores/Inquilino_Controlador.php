<?php 
// 	class Inquilino_Controlador
// 	{	
// 		public function __construct(){}

// 		public function index(){
// 			$inquilinos=Inquilino::listar_todos();
// 			require_once('Vistas/Inquilino/index.php');
// 		}
		
//         public function formulario_registrar(){
// 			require_once('Vistas/Inquilino/formulario_registrar.php');
//         }

// 		public function registrar_inquilino($inquilino){
// 			Inquilino::registrar_inquilino($inquilino);
// 		}
		
//         public function formulario_modificar(){
// 			require_once('Modelos/Inquilino.php');				
// 			$inquilino=Inquilino::Obtener_por_documeto($_GET['documeto']);		
// 			require_once('Vistas/Inquilino/formulario_modificar.php');
//         }
		
// 		public function modificar_inquilino($documeto,$nombres,$apellidos,$telefono){
// 			Inquilino::modificar_inquilino($documeto,$nombres,$apellidos,$telefono);
// 			header('Location: ../index.php');
// 		}
			
// 		public function eliminar_inquilino(){
// 			Inquilino::eliminar_inquilino($_GET['documeto']);
// 			header('Location: index.php');
// 		}

// 		public function buscar_inquilino($dato){
// 			echo "buscar_inquilino";
// 			$inquilinos = Inquilino::buscar_inquilino($dato);
// require_once('../Vistas/Inquilino/listar_inquilinos.php');

// 		}
		
	
		
//     }

    
	
// 	if(isset($llenar_select_inquilino))
// 	{
// 		require_once('Modelos/Inquilino.php');
// 		$inquilinos=Inquilino::listar_todos();
// 		require_once('Vistas/Inquilino/select_inquilinos.php');
// 	}
	
	
// 	if(isset ($_POST['action'])) {
// 		if(($_POST['action']=='registrar_inquilino')) {
// 			require_once('../Modelos/Inquilino.php');
// 			require_once('../conexion.php');
// 			$inquilino_controlador=new Inquilino_Controlador();
// 			$inquilino_controlador=new Inquilino_Controlador();
// 			$inquilino= new Inquilino($_POST['documeto'],$_POST['nombres'],$_POST['apellidos'],$_POST['telefono']);
// 			$inquilino_controlador->registrar_inquilino($inquilino);
			
// 		}
// 		if(($_POST['action']=='modificar_inquilino')) {
// 			require_once('../Modelos/Inquilino.php');
// 			require_once('../conexion.php');
// 			$inquilino_controlador=new Inquilino_Controlador();
// 			$inquilino= new Inquilino($_POST['documeto'],$_POST['nombres'],$_POST['apellidos'],$_POST['telefono']);
// 			$inquilino_controlador->modificar_inquilino($_POST['documeto'],$_POST['nombres'],$_POST['apellidos'],$_POST['telefono']);
// 		}
// 		if (isset($_POST['action'])){
// 		if($_POST['action']=='Buscar') {
// 		require_once('../Modelos/Inquilino.php');
// 		require_once('../conexion.php');
// 		$inquilino_controlador=new Inquilino_Controlador();
// 		$inquilino= new Inquilino('','','','');
//         $inquilino_controlador->buscar_inquilino($_POST['dato_buscar']);
// 		}
	
// 	}
// }	
?>