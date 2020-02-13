<?php 
	class Rol_Controlador
	{	
		public function __construct(){}

		//---------------------------------------------------------
		public function index(){
			$roles=Rol::listar_todos();
			require_once('Vistas/Rol/index.php');
		}
		//--------------------------------------------------------
		public function formulario_registrar(){
			require_once('Vistas/Rol/formulario_registrar.php');
        }

		public function registrar_rol($rol){
			Rol::registrar_rol($rol);
			header('Location: ../index.php?controller=rol&action=index');
		}
		
		public function formulario_modificar(){
			require_once('Modelos/Rol.php');				
			$rol=Rol::Obtener_por_identificacion($_GET['id_rol']);		
			require_once('Vistas/Rol/formulario_modificar.php');
			//header('Location: /index.php');
        }
		
		public function modificar_rol($id_rol,$rol,$estado){
			Rol::modificar_rol($id_rol,$rol,$estado);
			header('Location: ../index.php?controller=rol&action=index');
		}
			
		public function cambiar_estado_rol(){
			Rol::cambiar_estado_rol($_GET['id_rol']);
			//header('Location: ../index.php');
		}

		public function eliminar_rol(){
			Rol::eliminar_rol($_GET['id_rol']);
			header('Location: index.php');
		}
//---------------------------------------------------------
		public function buscar_rol($dato){
			$roles = Rol::buscar_rol($dato);
		require_once('../Vistas/Rol/listar_roles.php');

		}
		
		public function consultar_tipo_rol($dato){
			$rol = Rol::consultar_tipo_rol($dato);
			echo $rol;
		}
		
		public function llenar_select_rol(){
			require_once('Modelos/Rol.php');
			require_once('conexion.php');
			$controller= new Rol_Controlador();
			$roles=Rol::listar_todos();
		}
//---------------------------------------------------------		
		public function error(){
			header('Vistas/error.php');
		} 
		
    }

 	if(isset($llenar_select_rol))
		{
		require_once('Modelos/Rol.php');
		$roles=Rol::listar_todos();
		require_once('Vistas/Rol/select_rol.php');
		}

	if(isset ($_POST['action'])) {
		if(($_POST['action']=='registrar_rol')) {
			require_once('../Modelos/Rol.php');
			require_once('../conexion.php');
			$rol_controlador=new Rol_Controlador();
			$rol_controlador=new Rol_Controlador();
			$rol= new rol('',$_POST['rol'],$_POST['estado']);
			$rol_controlador->registrar_rol($rol);
			
		}
		
		if(($_POST['action']=='modificar_rol')) {
			
			require_once('../Modelos/Rol.php');
			require_once('../conexion.php');
			
			$rol_controlador=new Rol_Controlador();
			$rol= new Rol($_POST['id_rol'],$_POST['rol'],$_POST['estado']);
			$rol_controlador->modificar_rol($_POST['id_rol'], $_POST['rol'], $_POST['estado']);
		}

		if(($_POST['action']=='eliminar_rol')) {	
			$rol_controlador->eliminar_rol($_GET['id_rol']);			
		}
		
		//----------------------------------------------------------------------
		if($_POST['action']=='Buscar') {
		require_once('../Modelos/Rol.php');
		require_once('../conexion.php');
		$rol_controlador=new Rol_Controlador();
		$rol= new Rol('','','');
		$rol_controlador->buscar_rol($_POST['dato_buscar']);
		}
		
		if($_POST['action']=='consultar_tipo_rol') {
		require_once('../Modelos/Rol.php');
		require_once('../conexion.php');
		$rol_controlador=new Rol_Controlador();
		$rol = new Rol('','','');
		$rol_controlador->consultar_tipo_rol($_POST['dato_buscar']);
		}
		//--------------------------------------------------------------------
	}

?>