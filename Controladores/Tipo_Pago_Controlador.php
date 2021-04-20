<?php 
	class Tipo_Pago_Controlador{	
		public function __construct(){}
		public function index(){
			$tipo_pagos=Tipo_pago::listar_todos();
			require_once('Vistas/Tipo_Pago/index.php');
		}
		public function formulario_registrar(){
			require_once('Vistas/Tipo_Pago/formulario_tipo_pago.php');
			} 
		public function registrar_tipoPago($tipo_pago){
			Tipo_pago::registrar_tipoPago($tipo_pago);
			session_start();
			$_SESSION['guardar'] = "Agregado Con Éxito";
			header('Location: ../index.php?controller=tipo_pago&action=index');
		}
		public function formulario_modificar(){
			require_once('Modelos/Tipo_Pago.php');
			$tipo_pago=Tipo_pago::Obtener_por_codigo_tipo_pago($_GET['codigo_tipo_pago']);
			require_once('Vistas/Tipo_Pago/formulario_modificar.php');
		}
		public function modificar_tipo_pago($codigo_tipo_pago,$tipo_pago,$descripcion){
			Tipo_pago::modificar_tipo_pago($codigo_tipo_pago,$tipo_pago,$descripcion);
			session_start();
			$_SESSION['modificar'] = "Se Han Modificado Los Datos Con Éxito";
			header('Location: ../index.php?controller=tipo_pago&action=index');
		}
		public function eliminar_tipo_pago(){
			Tipo_pago::eliminar_tipo_pago($_GET['codigo_tipo_pago']);
			header('Location: index.php');
		}
		public function consultar_tipo_pago($dato){
			$tipo_pago = Tipo_pago::consultar_tipo_pago($dato);
		}
		public function error(){
			header('Vistas/error.php');
		} 
	}
	if(isset($llenar_select_tipo_pago)){
		require_once('Modelos/Tipo_Pago.php');
		$tipo_pagos=Tipo_pago::listar_todos();
		require_once('Vistas/Tipo_Pago/select_tipo_pago.php');
	}
	if (isset($_POST['action'])){
		if(($_POST['action']=='registrar_tipoPago')){
			require_once('../Modelos/Tipo_Pago.php');
			require_once('../conexion.php');
			$tipo_pago_controlador=new Tipo_Pago_Controlador();
			$tipo_pago= new Tipo_pago($_POST['codigo_tipo_pago'],$_POST['tipo_pago'],$_POST['descripcion']);
			$tipo_pago_controlador->registrar_tipoPago($tipo_pago);
		}
	} 
	if (isset($_POST['action'])){
		if(($_POST['action']=='eliminar_tipo_pago')) {	
			$tipo_pago_controlador->eliminar_tipo_pago($_GET['codigo_tipo_pago']);	
		}
		if(($_POST['action']=='modificar_tipo_pago')){
			require_once('../Modelos/Tipo_Pago.php');
			require_once('../conexion.php');
			$tipo_pago_controlador=new Tipo_Pago_Controlador();
			$tipo_pago= new Tipo_pago($_POST['codigo_tipo_pago'],$_POST['tipo_pago'],$_POST['descripcion']);
			$tipo_pago_controlador->modificar_tipo_pago($_POST['codigo_tipo_pago'],$_POST['tipo_pago'],$_POST['descripcion']);
		}
	}
	if (isset($_POST['action'])){
		if($_POST['action']=='Buscar'){
			require_once('../Modelos/Tipo_Pago.php');
			require_once('../conexion.php');
			$tipo_pago_controlador=new Tipo_Pago_Controlador();
			$tipo_pago= new Tipo_pago('','','');
			$tipo_pago_controlador->buscar_pago($_POST['dato_buscar']);
		}
		if($_POST['action']=='consultar_tipo_pago'){
			require_once('../Modelos/Tipo_Pago.php');
			require_once('../conexion.php');
			$tipo_pago_controlador=new Tipo_Pago_Controlador();
			$tipo_pago = new Tipo_pago('','','');
			$tipo_pago_controlador->consultar_tipo_pago($_POST['dato_buscar']);
		}	

	}
?>