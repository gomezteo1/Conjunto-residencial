<?php
  class Pago_Controlador
{
      public function __construct(){}

      public function select_pago(){
          //$pagos=Pago::select_pago();
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
       
      
      //----------------------------------------------- Los pagos
      // public function registrar_pago($pago){
      //   Pago::registrar_pago($pago);
      //   header('Location: ../index.php?controller=pago&action=index');
           
      // }
      
      // Este Modelo me da error 
      public function registrar_pago($pago){
        require_once('../Modelos/Cuenta_cobro.php');
        Cuenta_cobro::UpMora();
        Pago::registrar_pago($pago);
        session_start();
			  $_SESSION['guardar'] = "Agregado con éxito";
        header('Location: ../index.php?controller=pago&action=index');
           
      }
      // Este Modelo me da error 
      //--------------------------------------------------------------
      public function formulario_modificar(){
          require_once('Modelos/Pago.php');
          // require_once('Modelos/Usuario.php');
          $pago=Pago::Obtener_por_codigo_pago($_GET['codigo_pago']);
          require_once('Vistas/Pago/formulario_modificar.php');
      }
       
      public function modificar_pago($codigo_pago,$id_usuario,$codigo_cuenta_cobro,$fecha,$codigo_tipo_pago,$monto_cancelado,$monto_a_pagar){
        Pago::modificar_pago($codigo_pago,$id_usuario,$codigo_cuenta_cobro,$fecha,$codigo_tipo_pago,$monto_cancelado,$monto_a_pagar);
         header('Location: ../index.php?controller=pago&action=index');
      }
      
      public function eliminar_pago($codigo_pago){
        Pago::eliminar_pago($codigo_pago);
        //header('Location: index.php');
      }
      public function buscar_pago($dato){
        $pagos = Pago::buscar_Pago($dato);
        require_once('../Vistas/Pago/listar_pagos.php');
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
      //$inmueble_controlador=new Inmueble_Controlador();
      //$inmueble= new Inmueble('','','','');
      //$inmueble_controlador->consultar_precio($_POST['dato_buscar']);
    }

      public function error(){
        header('Vistas/error.php');
      } 
      
      }


// Acciones que se solicitan por POST: Crear y modificar (producto en base de datos)
 if(isset($llenar_select_pago))
  {
    require_once('Modelos/Pago.php');
    $pagos=Pago::listar_todos();
    require_once('Vistas/Pago/select_pago.php');
  }

 if (isset($_POST['action'])){
     //echo $_POST['action'];//hw_Array2Objrec(z)y que borrarlo

     if(($_POST['action']=='registrar_pago')){
         require_once('../Modelos/Pago.php');
         require_once('../conexion.php');
         $pago_controlador=new Pago_Controlador();
         $pago= new pago('', $_POST['slcusuario'], $_POST['slccuenta_cobro'], '', $_POST['slctipo_pago'], $_POST['monto_cancelado'], $_POST['monto_a_pagar']);
         $pago_controlador->registrar_pago($pago);
     }
    

     //para modificar 
     if(($_POST['action']=='modificar_pago')){
         require_once('../Modelos/Pago.php');
         require_once('../conexion.php');

         $pago_controlador=new Pago_Controlador();
         $pago_controlador->modificar_pago($_POST['codigo_pago'], $_POST['slcusuario'], $_POST['slccuenta_cobro'], $_POST['fecha'], $_POST['slctipo_pago'], $_POST['monto_cancelado'], $_POST['monto_a_pagar']);
     }
    
 }

 // Acciones que se solicitan por GET: Eliminar
 if (isset($_GET['action'])){

     // Para eliminar producto
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
        $pago= new Pago('','','','','','','');
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