<?php
  class Usuario_Inmueble_Controlador
{
      public function __construct(){}

      public function select_usuario_inmueble(){
          $usuario_inmuebles=Usuario_Inmueble::select_usuario_inmueble();
          require_once('Vistas/Usuario_Inmueble/select_usuario_inmueble.php');
    }

      public function index(){
          $usuario_inmuebles=Usuario_Inmueble::listar_todos();
          require_once('Vistas/Usuario_Inmueble/index.php');
      }

       public function indexusuario(){
          $usuario_inmuebles=Usuario_Inmueble::listar_usuario_inmueble($_SESSION['acceso']['id_usuario']);

          require_once('Vistas/Usuario_Inmueble/indexusuario.php');
      }

      public function formulario_registrar(){
          require_once('Vistas/Usuario_Inmueble/formulario_registrar.php');
        }

      public function registrar_usuario_inmueble($usuario_inmueble){
        Usuario_Inmueble::registrar_usuario_inmueble($usuario_inmueble);
        session_start();
			  $_SESSION['guardar'] = "Agregado con éxito";
        header('Location: ../index.php?controller=usuario_inmueble&action=index');

      }
      public function formulario_modificar(){
          require_once('Modelos/Usuario_inmueble.php');
          $usuario_inmueble=Usuario_inmueble::Obtener_por_id_usuario_inmueble($_GET['id_usuario_inmueble']);
          require_once('Vistas/Usuario_Inmueble/formulario_modificar.php');
      }

      public function modificar_usuario_inmueble($id_usuario_inmueble,$id_usuario,$codigo_inmueble){
        Usuario_Inmueble::modificar_usuario_inmueble($id_usuario_inmueble,$id_usuario,$codigo_inmueble);
        session_start();
			 $_SESSION['modificar'] = "Se han modificado los datos con éxito";
			 header('Location: ../index.php?controller=usuario_inmueble&action=index');
      }

      public function eliminar_usuario_inmueble($id_usuario_inmueble){
        Usuario_Inmueble::eliminar_usuario_inmueble($id_usuario_inmueble);
        //header('Location: index.php');
      }
      public function buscar_usuario_inmueble($dato){
        echo "buscar_usuario_inmueble";
        $usuario_inmuebles = Usuario_Inmueble::buscar_Usuario_Inmueble($dato);
        require_once('../Vistas/Usuario_Inmueble/listar_usuario_inmuebles.php');
      }


      public function consultar_usuario_inmueble($dato){
      $id_usuario = Usuario_Inmueble::consultar_valor($dato);
      return $id_usuario;
    }

      public function llenar_select_usuario_inmueble(){
      require_once('Modelos/Usuario_Inmueble.php');
      require_once('conexion.php');
      $controller= new Usuario_Inmueble_Controlador();
      $usuario_inmuebles=Usuario_Inmueble::listar_todos();
      //$inmueble_controlador=new Inmueble_Controlador();
      //$inmueble= new Inmueble('','','','');
      //$inmueble_controlador->consultar_precio($_POST['dato_buscar']);
    }

      public function error(){
        header('Vistas/error.php');
      }

      }


// Acciones que se solicitan por POST: Crear y modificar (producto en base de datos)
 if(isset($llenar_select_usuario_inmueble))
  {
    require_once('Modelos/Usuario_Inmueble.php');
    $usuario_inmuebles=Usuario_Inmueble::listar_todos();
    require_once('Vistas/Usuario_Inmueble/select_usuario_inmueble.php');
  }


if (isset($_POST['action'])){
     //echo $_POST['action'];//hw_Array2Objrec(z)y que borrarlo

     if(($_POST['action']=='registrar_usuario_inmueble')){
         require_once('../Modelos/Usuario_Inmueble.php');
         require_once('../conexion.php');
         $usuario_inmueble_controlador=new Usuario_Inmueble_Controlador();
         $usuario_inmueble= new Usuario_Inmueble('', $_POST['slcusuario'], $_POST['slcinmueble']);
         $usuario_inmueble_controlador->registrar_usuario_inmueble($usuario_inmueble);
     }


     //para modificar
     if(($_POST['action']=='modificar_usuario_inmueble')){
         require_once('../Modelos/Usuario_Inmueble.php');
         require_once('../conexion.php');

         $usuario_inmueble_controlador=new Usuario_Inmueble_Controlador();
         $usuario_inmueble_controlador->modificar_usuario_inmueble($_POST['id_usuario_inmueble'], $_POST['slcusuario'],$_POST['slcinmueble']);
     }
   }
 // Acciones que se solicitan por GET: Eliminar
 if (isset($_GET['action'])){

     // Para eliminar producto
     if(($_GET['action']=='eliminar_usuario_inmueble')){
        require_once('Modelos/Usuario_Inmueble.php');
        require_once('conexion.php');

        $usuario_inmueble_controlador=new Usuario_Inmueble_Controlador();
        $usuario_inmueble_controlador->eliminar_usuario_inmueble($_GET['id_usuario_inmueble']);
    }
 }
 if (isset($_POST['action'])){

    if($_POST['action']=='Buscar') {
        require_once('../Modelos/Usuario_Inmueble.php');
        require_once('../conexion.php');
        $usuario_inmueble_controlador=new Usuario_Inmueble_Controlador();
        $usuario_inmueble= new Usuario_Inmueble('','','');
        $usuario_inmueble_controlador->buscar_usuario_inmueble($_POST['dato_buscar']);
    }

    if($_POST['action']=='consultar_usuario_inmueble') {
    require_once('../Modelos/Usuario_Inmueble.php');
    require_once('../conexion.php');
    $usuario_inmueble_controlador=new Usuario_Inmueble_Controlador();
    $usuario_inmueble= new Usuario_Inmueble('','','');
    echo  $usuario_inmueble_controlador->consultar_usuario_inmueble($_POST['dato_buscar']);
    }
  }







?>
