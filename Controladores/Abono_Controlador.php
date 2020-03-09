<?php 
	class Abono_Controlador
	{	
		public function __construct(){}

		public function index(){
			$abonos=Abono::listar_todos();
			require_once('Vistas/Abono/index.php');
		}
		
		public function indexusuario(){
          $abonos=Abono::listar_abono_usuario($_SESSION['acceso']['id_usuario']);
          
          require_once('Vistas/Abono/indexusuario.php');
      }
		  
	// Formularios registrar

	    // public function formulario_registrar(){
		// 	require_once('Vistas/Abono/formulario_registrar.php');
        // }
		
		public function formulario_registrar(){
        	require_once('Modelos/Cuenta_cobro.php');
        	Cuenta_cobro::UpMora();
			require_once('Vistas/Abono/formulario_registrar.php');
        }

		//guardar
		public function registrar_abono($abono){
			Abono::registrar_abono($abono);
			session_start();
			 $_SESSION['guardar'] = "Agregado con éxito";
			 header('Location: ../index.php?controller=abono&action=index');
			
		}
		
	//------------------------------------------------------	
		//Mostar vista para modificar el inmueble
        public function formulario_modificar(){
			require_once('Modelos/Abono.php');				
			$abono=Abono::Obtener_por_codigo_abono($_GET['codigo_abono']);		
			require_once('Vistas/Abono/formulario_modificar.php');
        }
		
		//guardar cambios
		public function modificar_abono($codigo_abono,$codigo_pago,$fecha,$deuda,$abono,$saldo){
			Abono::modificar_abono($codigo_abono,$codigo_pago,$fecha,$deuda,$abono,$saldo);
			session_start();
			$_SESSION['modificar'] = "Se han modificado los datos con éxito";
			header('Location: ../index.php?controller=abono&action=index');
		}
				
		public function eliminar_abono(){
			Abono::eliminar_abono($_GET['codigo_abono']);
			header('Location: index.php');
		}

		public function buscar_abono($dato){
			//echo "buscar_abono";
			$abonos = Abono::buscar_abono($dato);
			require_once('../Vistas/Abono/listar_abonos.php');

		}
		
		public function consultar_valor($dato){
			$deuda = Abono::buscar_valor($dato);
			echo $deuda;
		}
		
		public function llenar_select_abono(){
			require_once('Modelos/Abono.php');
			require_once('conexion.php');
			$controller= new Abono_Controlador();
			$abonos=Abono::listar_todos();
			//$inmueble_controlador=new Inmueble_Controlador();
			//$inmueble= new Inmueble('','','','');
			//$inmueble_controlador->consultar_valor($_POST['dato_buscar']);
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
	
	if(isset($llenar_select_abono))
	{
		require_once('Modelos/Abono.php');
		$abonos=Abono::listar_todos();
		require_once('Vistas/Abono/select_abono.php');
	}
	  


	/*
	if(isset($llenar_select_pago))
	{
		require_once('Modelos/Pago.php');
		$pagos=Pago::listar_todos();
		require_once('Vistas/Pago/select_pago.php');
	}
	*/
	
	if(isset ($_POST['action'])) {
		
		if(($_POST['action']=='registrar_abono')) {
			require_once('../Modelos/Abono.php');
			require_once('../conexion.php');
			$abono_controlador=new Abono_Controlador();
			$abono_controlador=new Abono_Controlador();
			$abono= new Abono('', $_POST['slcpago'], '', $_POST['deuda'], $_POST['abono'], $_POST['saldo']);
			$abono_controlador->registrar_abono($abono);
			//echo" llego el paro papi ";

		}
		
		if(($_POST['action']=='modificar_abono')) {
			
			require_once('../Modelos/Abono.php');
			require_once('../conexion.php');
			
			//$inmueble_controlador=new Inmueble_Controlador();

			/*$abono_controlador=new Abono_Controlador();
			$abono= new Abono($_POST[''],$_POST['slcpago'],$_POST['slcusuario'],$_POST['fecha'],$_POST['deuda'],$_POST['abono'],$_POST['saldo']);
			$abono_controlador->modificar_abono($_POST[''],$_POST['slcpago'],$_POST['slcusuario'],$_POST['fecha'],$_POST['deuda'],$_POST['abono'],$_POST['saldo']);

				echo"Avanzando :D";
			*/
			//Medio codigo de Modificar abono sin cambi
			$abono_controlador=new Abono_Controlador();
			$abono= new Abono($_POST['codigo_abono'],$_POST['slcpago'],$_POST['fecha'],$_POST['deuda'],$_POST['abono'],$_POST['saldo']);
			$abono_controlador->modificar_abono($_POST['codigo_abono'],$_POST['slcpago'],$_POST['fecha'],$_POST['deuda'],$_POST['abono'],$_POST['saldo']);
			

		}

		/*
		if(($_POST['action']=='modificar_inmueble')) {
			
			require_once('../Modelos/Inmueble.php');
			require_once('../conexion.php');
			
			$inmueble_controlador=new Inmueble_Controlador();
			$inmueble= new Inmueble($_POST['id_inmueble'],$_POST['torre'],$_POST['id_categoria'],$_POST['precio']);
			$inmueble_controlador->modificar_inmueble($_POST['id_inmueble'],$_POST['torre'],$_POST['id_categoria'],$_POST['precio']);
		*/

		if(($_POST['action']=='eliminar_abono')) {	
			$abono_controlador->eliminar_abono($_GET['codigo_abono']);			//require_once(//'Vistas/Inmueble/formulario_modificar.php');
		}
		
		if($_POST['action']=='Buscar') {
		require_once('../Modelos/Abono.php');
		require_once('../conexion.php');
		$abono_controlador=new Abono_Controlador();
		$abono= new Abono('','','','','','','');
		$abono_controlador->buscar_abono($_POST['dato_buscar']);
		}
		
		if($_POST['action']=='consultar_valor'){
		require_once('../Modelos/Abono.php');	
		require_once('../conexion.php');
		$abono_controlador=new Abono_Controlador();
		$abono = new Abono('','','','','','','');
		$abono_controlador->consultar_valor($_POST['dato_buscar']);

		}
		
	}

?>