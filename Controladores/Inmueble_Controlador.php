<?php 
	class Inmueble_Controlador
	{	
		public function __construct(){}

		public function index(){
			$inmuebles=Inmueble::listar_todos();
			require_once('Vistas/Inmueble/index.php');
		}
		
		//Mostar vista para registrar el inmueble
        public function formulario_registrar(){
			require_once('Vistas/Inmueble/formulario_registrar.php');
        }

		//guardar
		public function registrar_inmueble($inmueble){
			Inmueble::registrar_inmueble($inmueble);
			header('Location: ../index.php?controller=inmueble&action=index');
		}
		
		//Mostar vista para modificar el inmueble
        public function formulario_modificar(){
			require_once('Modelos/Inmueble.php');				
			$inmueble=Inmueble::Obtener_por_codigo_inmueble($_GET['codigo_inmueble']);		
			require_once('Vistas/Inmueble/formulario_modificar.php');
        }
		
		//guardar cambios
		public function modificar_inmueble($codigo_inmueble,$numero_matricula,$tipo,$torre,$numero,$metros,$estado){
			Inmueble::modificar_inmueble($codigo_inmueble,$numero_matricula,$tipo,$torre,$numero,$metros,$estado);
			header('Location: ../index.php?controller=inmueble&action=index');
		}
			
		public function eliminar_inmueble(){
			Inmueble::eliminar_inmueble($_GET['codigo_inmueble']);
			//header('Location: index.php');
		}

		public function buscar_inmueble($dato){
			//echo "buscar_inmueble";
			$inmuebles = Inmueble::buscar_inmueble($dato);
			require_once('../Vistas/Inmueble/listar_inmuebles.php');

		}

		public function desactivar_estado_inmueble($codigo_inmueble,$on){
		require_once('../Modelos/Inmueble.php');
		
		if($on==1){

		return Inmueble::desactivar_estado_inmueble($codigo_inmueble);
		}
		//header('Location: index.php?controller=usuario&action=index');
		else{

		return Inmueble::activar_estado_inmueble($codigo_inmueble);	

		}

	}
	public function desactivarEstadoLista(){
		require_once('Modelos/Inmueble.php');
		Inmueble::desactivarEstadoLista($_GET['codigo_inmueble']);
		//header('Location: index.php?controller=usuario&action=index');
	}
	public function activarEstadoLista(){
		require_once('Modelos/Usuario.php');
		Inmueble::activarEstadoLista($_GET['codigo_inmueble']);
		//header('Location: index.php?controller=usuario&action=index');
	}	

	public function activar_estado_inmueble($codigo_inmueble){
		require_once('../Modelos/Inmueble.php');
		return Inmueble::activar_estado_inmueble($codigo_inmueble);
	}		
		
		public function consultar_precio($dato){
			$precio = Inmueble::buscar_precio($dato);
			// echo $precio;
		}
		
		public function llenar_select_inmueble(){
			require_once('Modelos/Inmueble.php');
			require_once('conexion.php');
			$controller= new Inmueble_Controlador();
			$inmuebles=Inmueble::listar_todos();
			
			//$inmueble_controlador=new Inmueble_Controlador();
			//$inmueble= new Inmueble('','','','');
			//$inmueble_controlador->consultar_precio($_POST['dato_buscar']);
		}
		
		public function error(){
			header('Vistas/error.php');
		} 
		
    }

    //se verifica que action esté definida
	/*
	if (isset($_GET['action'])) {
		if ($_GET['action']!='index') {
			//require_once('../conexion.php');
            $inmueble_controlador=new Inmueble_Controlador();
        }
		
		
    }
	*/
	
	if(isset($llenar_select_inmueble))
	{
		require_once('Modelos/Inmueble.php');
		$inmuebles=Inmueble::listar_todos();
		require_once('Vistas/Inmueble/select_inmueble.php');
	}
	
	if(isset ($_POST['action'])) {

		if($_POST['action'] == 'desactivar_estado'){
 			$inmueble_controlador = new Inmueble_Controlador();
 			echo $inmueble_controlador->desactivar_estado_inmueble($_POST['codigo_inmueble'],$_POST['on']);
 		}

 		if($_POST['action'] == 'activar_estado'){
 			$inmueble_controlador = new Inmueble_Controlador();
 			echo $inmueble_controlador->activar_estado_inmueble($_POST['codigo_inmueble']);
 		}
		
		 
		if(($_POST['action']=='registrar_inmueble')) {
			require_once('../Modelos/Inmueble.php');
			require_once('../conexion.php');
			$inmueble_controlador=new Inmueble_Controlador();
			$inmueble_controlador=new Inmueble_Controlador();
			$inmueble= new Inmueble('', $_POST['numero_matricula'], $_POST['tipo'], $_POST['torre'], $_POST['numero'], $_POST['metros'], '');
			$inmueble_controlador->registrar_inmueble($inmueble);
			
		}

	if(($_POST['action']=='modificar_inmueble')) {
			
			require_once('../Modelos/Inmueble.php');
			require_once('../conexion.php');
			
			//$inmueble_controlador=new Inmueble_Controlador();
			$inmueble_controlador=new Inmueble_Controlador();
			$inmueble= new Inmueble($_POST['codigo_inmueble'],$_POST['numero_matricula'], $_POST['tipo'], $_POST['torre'],$_POST['numero'],$_POST['metros'],$_POST['estado']);
			$inmueble_controlador->modificar_inmueble($_POST['codigo_inmueble'],$_POST['numero_matricula'],$_POST['tipo'],$_POST['torre'],$_POST['numero'],$_POST['metros'],$_POST['estado']);
		}

		if(($_POST['action']=='eliminar_inmueble')) {	
			$inmueble_controlador->eliminar_inmueble($_GET['codigo_inmueble']);			//require_once(//'Vistas/Inmueble/formulario_modificar.php');
		}
		
		if($_POST['action']=='Buscar') {
		require_once('../Modelos/Inmueble.php');
		require_once('../conexion.php');
		$inmueble_controlador=new Inmueble_Controlador();
		$inmueble= new Inmueble('','','','','','','');
		$inmueble_controlador->buscar_inmueble($_POST['dato_buscar']);
		}
		
		if($_POST['action']=='consultar_precio') {
		require_once('../Modelos/Inmueble.php');
		require_once('../conexion.php');
		$inmueble_controlador=new Inmueble_Controlador();
		$inmueble= new Inmueble('','','','','','','');
		$inmueble_controlador->consultar_precio($_POST['dato_buscar']);
		}
	}

?>