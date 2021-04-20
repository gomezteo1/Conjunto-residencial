<?php
  class Pago_Controlador{
    public function __construct(){}
    public function select_pago(){
      require_once('Vistas/Pago/select_pagos.php');
    }

    public function index(){
      $pagos=Pago::listar_todos();
      require_once('Vistas/Pago/index.php');
    }
    public function indexusuario(){
      $pagos=Pago::listar_pago_usuario($_SESSION['acceso']['id_usuario']);
      require_once('Vistas/Pago/indexusuario.php');
    }
    public function formulario_registrar(){
      require_once('Vistas/Pago/formulario_registrar.php');
    } 
    public function registrar_pago($pago){
      require_once('../Modelos/Cuenta_cobro.php');
      Cuenta_cobro::UpMora();
      Pago::registrar_pago($pago);
      session_start();
      $_SESSION['guardar'] = "Agregado Con Éxito";
      header('Location: ../index.php?controller=pago&action=index');
    }
    public function formulario_modificar(){
      require_once('Modelos/Pago.php');
      $pago=Pago::Obtener_por_codigo_pago($_GET['codigo_pago']);
      require_once('Vistas/Pago/formulario_modificar.php');
    }
    public function modificar_pago($codigo_pago,$codigo_cuenta_cobro,$fecha,$codigo_tipo_pago,$monto_cancelado,$monto_a_pagar){
      Pago::modificar_pago($codigo_pago,$codigo_cuenta_cobro,$fecha,$codigo_tipo_pago,$monto_cancelado,$monto_a_pagar);
      session_start();
      $_SESSION['modificar'] = "Se Han Modificado Los Datos Con Éxito";
      header('Location: ../index.php?controller=pago&action=index');
    }
    public function eliminar_pago($codigo_pago){
      Pago::eliminar_pago($codigo_pago);
    }
    public function consultar_pago($dato){
      $deuda = Pago::consultar_valor($dato);
      return $deuda;
    }
    public function llenar_select_pago(){
      require_once('Modelos/Pago.php');
      require_once('conexion.php');
      $controller= new Pago_Controlador();
      $pagos=Pago::listar_todos();
    }
    public function error(){
      header('Vistas/error.php');
    } 
  }
  if(isset($llenar_select_pago)){
    require_once('Modelos/Pago.php');
    $pagos=Pago::listar_todos();
    require_once('Vistas/Pago/select_pago.php');
  }
  if (isset($_POST['action'])){
    if(($_POST['action']=='registrar_pago')){
      require_once('../Modelos/Pago.php');
      require_once('../conexion.php');
      $pago_controlador=new Pago_Controlador();
      $pago= new pago('',  $_POST['slccuenta_cobro'], '', $_POST['slctipo_pago'], $_POST['monto_cancelado'], $_POST['monto_a_pagar']);
      $pago_controlador->registrar_pago($pago);
    }
    if(($_POST['action']=='modificar_pago')){
      require_once('../Modelos/Pago.php');
      require_once('../conexion.php');
      $pago_controlador=new Pago_Controlador();
      $pago_controlador->modificar_pago($_POST['codigo_pago'], $_POST['slccuenta_cobro'], $_POST['fecha'], $_POST['slctipo_pago'], $_POST['monto_cancelado'], $_POST['monto_a_pagar']);
    }
  }
  if (isset($_GET['action'])){
    if(($_GET['action']=='eliminar_pago')){
      require_once('Modelos/Pago.php');
      require_once('conexion.php');
      $pago_controlador=new Pago_Controlador();
      $pago_controlador->eliminar_pago($_GET['codigo_pago']);
    } 
  }
  if (isset($_POST['action'])){
    if($_POST['action']=='Buscar') {
      require_once('../Modelos/Pago.php');
      require_once('../conexion.php');
      $pago_controlador=new Pago_Controlador();
      $pago= new Pago('','','','','','');
      $pago_controlador->buscar_pago($_POST['dato_buscar']);
    }
    if($_POST['action']=='consultar_valor') {
      require_once('../Modelos/Pago.php');
      require_once('../conexion.php');
      $pago_controlador=new Pago_Controlador();
      $pago= new Pago('','','','','','','');
      echo  $pago_controlador->consultar_pago($_POST['dato_buscar']);
    }
  }
?>