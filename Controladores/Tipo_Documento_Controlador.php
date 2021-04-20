<?php 
	class Tipo_Documento_Controlador{	
		public function __construct(){}
		public function index(){
			$tipo_documentos=Tipo_Documento::listar_todos();
			require_once('Vistas/Tipo_Documento/index.php');
		}
		public function formulario_registrar(){
			require_once('Vistas/Tipo_Documento/formulario_registrar.php');
		}
		public function registrar_tipo_documento($tipo_documento){
			Tipo_Documento::registrar_tipo_documento($tipo_documento);
			session_start();
			$_SESSION['guardar'] = "Agregado Con Éxito";
			header('Location: ../index.php?controller=tipo_documento&action=index');
		}
		public function formulario_modificar(){
			require_once('Modelos/Tipo_Documento.php');				
			$tipo_documento=Tipo_Documento::Obtener_por_identificacion($_GET['id_tipo_documento']);		
			require_once('Vistas/Tipo_Documento/formulario_modificar.php');
		}
		public function modificar_tipo_documento($id_tipo_documento,$documento){
			Tipo_Documento::modificar_tipo_documento($id_tipo_documento,$documento);
			session_start();
			$_SESSION['modificar'] = "Se Han Modificado Los Datos Con Éxito";
			header('Location: ../index.php?controller=tipo_documento&action=index');
		}
			
		public function eliminar_tipo_documento(){
			Tipo_Documento::eliminar_tipo_documento($_GET['id_tipo_documento']);
			header('Location: index.php');
		}
		public function consultar_tipo_documento($dato){
			$tipo_documento = Tipo_Documento::consultar_tipo_documento($dato);
		}
		public function llenar_select_tipo_documento(){
			require_once('Modelos/Tipo_Documento.php');
			require_once('conexion.php');
			$controller= new Tipo_Documento_Controlador();
			$tipo_documentos=Tipo_Documento::listar_todos();
		}
		public function error(){
			header('Vistas/error.php');
		} 
	}

	if(isset($llenar_select_tipo_documento)){
		require_once('Modelos/Tipo_Documento.php');
		$tipo_documentos=Tipo_Documento::listar_todos();
		require_once('Vistas/Tipo_Documento/select_tipo_documento.php');
	}

	if(isset ($_POST['action'])) {
		if(($_POST['action']=='registrar_tipo_documento')) {
			require_once('../Modelos/Tipo_Documento.php');
			require_once('../conexion.php');
			$tipo_documento_controlador=new Tipo_Documento_Controlador();
			$tipo_documento_controlador=new Tipo_Documento_Controlador();
			$tipo_documento= new tipo_documento('',$_POST['documento']);
			$tipo_documento_controlador->registrar_tipo_documento($tipo_documento);
			
		}
		
		if(($_POST['action']=='modificar_tipo_documento')) {
			
			require_once('../Modelos/Tipo_Documento.php');
			require_once('../conexion.php');
			$tipo_documento_controlador=new Tipo_Documento_Controlador();
			$tipo_documento= new Tipo_Documento($_POST['id_tipo_documento'],$_POST['documento']);
			$tipo_documento_controlador->modificar_tipo_documento($_POST['id_tipo_documento'],$_POST['documento']);
		}

		if(($_POST['action']=='eliminar_tipo_documento')) {	
			$tipo_documento_controlador->eliminar_tipo_documento($_GET['id_tipo_documento']);			
		}
		
		if($_POST['action']=='Buscar') {
		require_once('../Modelos/Tipo_Documento.php');
		require_once('../conexion.php');
		$tipo_documento_controlador=new Tipo_Documento_Controlador();
		$tipo_documento= new Tipo_Documento('','');
		$tipo_documento_controlador->buscar_documento($_POST['dato_buscar']);
		}
		
		if($_POST['action']=='consultar_tipo_documento') {
		require_once('../Modelos/Tipo_Documento.php');
		require_once('../conexion.php');
		$tipo_documento_controlador=new Tipo_Documento_Controlador();
		$tipo_documento = new Tipo_Documento('','');
		$tipo_documento_controlador->consultar_tipo_documento($_POST['dato_buscar']);
		}
	}
?>