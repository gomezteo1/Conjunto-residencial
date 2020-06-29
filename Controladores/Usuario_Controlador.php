<?php 
class Usuario_Controlador
{
	

	public function __construct(){}
	
	//-----------Error----------------------------------------------------------------
	public function error(){ //este me lleva al indice del administrador
		//$usuarios=Usuario::error();
		require_once('Vistas/error.php');
	} 
	//----------Inicio Usuario--------------------------------------------------------

	public function index(){ //este me lleva al indice del administrador
		$usuarios=Usuario::listar_todos();
		require_once('Vistas/Usuario/index.php');
	} 

	public function validarCorreo(){
		$correo=Usuario::validarCorreo();
	}


	public function indexUsuario(){ //este me lleva al usuario individual
		$usuarios=Usuario::listar_usuario($_GET['id_usuario']);
		require_once('Vistas/Usuario/indexUsuario.php');
	} 
	//-----------Cambio de clave-------------------------------------------------------
	

	public function frm_cambiarClaveAdm(){ 
		require_once('./Vistas/Usuario/frm_cambiarClaveAdm.php');
	}

	public function frm_cambiarClaveUsu(){ 

		require_once('Vistas/Usuario/frm_cambiarClaveUsu.php');
	}


	public function cambiarClaveAdm($usuario,$clave){
	$usuario=Usuario::cambiarClaveAdm($usuario,$clave);
	header('Location: ../index.php');
	}

	public function cambiarClaveUsu($usuario,$clave){
	$usuario=Usuario::cambiarClaveUsu($usuario,$clave);
	header('Location: ../index.php');
	}
	
	//------------------------------------------------------------------
	public function frm_login(){ 
		require_once('Vistas/Usuario/frm_login.php');
	}
	public function frm_singup(){
		require_once('Vistas/Usuario/frm_singup.php');
	}
	public function frm_registrar_usuario(){
		require_once('Vistas/Usuario/frm_registrar_usuario.php');
	} 
	public function frm_modificar_usuario(){
		require_once('Modelos/Usuario.php');
		$usuario=Usuario::Obtener_por_identificacion($_GET['id_usuario']); //obtener por id 
		require_once('Vistas/Usuario/frm_modificar_usuario.php');
	}
	public function frm_modificar_administrador(){
		require_once('Modelos/Usuario.php');
		$usuario=Usuario::Obtener_por_identificacion($_GET['id_usuario']); //obtener por id 
		require_once('Vistas/Usuario/frm_modificar_administrador.php');
	}
	public function eliminar_administrador(){
		Usuario::eliminar_usuario($_GET['id_usuario']);
		//header('Location: ./index.php');
	}
	public function eliminar_usuario(){
		Usuario::eliminar_usuario($_GET['id_usuario']);
		//header('Location: ./index.php');
	}
	public function desactivar_estado_usuario($id_usuario,$on){
		require_once('../Modelos/Usuario.php');
		
		if($on==1){

		return Usuario::desactivar_estado_usuario($id_usuario);
		}
		//header('Location: index.php?controller=usuario&action=index');
		else{

		return Usuario::activar_estado_usuario($id_usuario);	

		}
	}
	public function activar_estado_usuario($id_usuario){
		require_once('../Modelos/Usuario.php');
		return Usuario::activar_estado_usuario($id_usuario);
	}		
//-------------------------------------------------------------------------

	public function desactivarEstadoLista(){
		require_once('Modelos/Usuario.php');
		Usuario::desactivarEstadoLista($_GET['id_usuario']);
		//header('Location: index.php?controller=usuario&action=index');
	}
	public function activarEstadoLista(){
		require_once('Modelos/Usuario.php');
		Usuario::activarEstadoLista($_GET['id_usuario']);
		//header('Location: index.php?controller=usuario&action=index');
	}		
	public function registrar_usuario($usuario){
		Usuario::registrar_usuario($usuario);
		//echo $usuario->id_usuario, $usuario->nombres, $usuario->apellidos, $usuario->id_tipo_documento, $usuario->numero_documento, $usuario->id_rol, $usuario->telefono, $usuario->fecha_nacimiento, $usuario->estado, $usuario->clave, $usuario->correo, $usuario->correo_recuperacion;
		//var_dump($usuario);
		//exit();
		session_start();
		$_SESSION['guardar'] = "Agregado Con Éxito";
		header('Location: ../index.php');
	} 
	 	
	public function modificar_usuario($id_usuario, $nombres, $apellidos, $id_tipo_documento, $numero_documento, $id_rol, $telefono, $fecha_nacimiento, $estado, $correo, $correo_recuperacion){
		Usuario::modificar_usuario($id_usuario, $nombres ,$apellidos, $id_tipo_documento, $numero_documento, $id_rol, $telefono, $fecha_nacimiento, $estado,  $correo, $correo_recuperacion);
		session_start();
		$_SESSION['modificar'] = "Se Han Modificado Los Datos Con Éxito";
		header('Location: ../index.php');
	
	}



	public function modificar_administrador($id_usuario, $nombres ,$apellidos, $id_tipo_documento, $numero_documento, $id_rol, $telefono, $fecha_nacimiento, $estado,  $correo, $correo_recuperacion){
		Usuario::modificar_administrador($id_usuario, $nombres ,$apellidos, $id_tipo_documento, $numero_documento, $id_rol, $telefono, $fecha_nacimiento, $estado,  $correo, $correo_recuperacion);
		//echo"$id_usuario, $nombres ,$apellidos, $id_tipo_documento, $numero_documento, $id_rol, $telefono, $fecha_nacimiento, $estado, $clave,$correo, $correo_recuperacion";
		session_start();
		$_SESSION['modificar'] = "Se Han Modificado Los Datos Con Éxito";
		header('Location: ../index.php');
	}
	
	public function login_usuario($correo, $clave){
		$usuario =Usuario::login_usuario($correo, $clave);
			if($usuario)
		{
			session_start();
			$_SESSION['acceso']=$usuario;

		}/*else{

			echo"su correo".$correo;
			echo"su clave".$clave;
			var_dump($usuario);
		}*/
					header('Location: ../index.php');


	} 

	public function cerrarSesion(){
		
		// session_start();
		// $_SESSION['Opcion'] = "¿Desea cerrar la sesión?";
		// header('Location: ./index.php');
		// session_destroy();
		
		
	}  
 //--------------------------------------------------------------
	// public function buscar_usuario($dato){
	// 	$usuarios = Usuario::buscar_usuario($dato);
	// 	require_once('../Vistas/Usuario/listar_usuarios.php');
	// }
		
	public function consultar_tipo_usuario($dato){
			$usuario = Usuario::buscar_tipo_usuario($dato);
			//echo $usuario;
	}
		
	public function llenar_select_usuario(){
			require_once('Modelos/Usuario.php');
			require_once('conexion.php');
			$controller= new Usuario_Controlador();
			$usuarios=Usuario::listar_todos();
		}		
//---------------------------------------------------------------	
	public function frm_recuperar_clave(){
		require_once('Vistas/Usuario/frm_recuperar_clave.php');
	
	}

    public function recuperarClave($referencia)
    {
    	require_once('../Modelos/Usuario.php');
        $usuario = Usuario::obtenerPorReferencia($referencia);
        if (is_array($usuario)) {
            Usuario::modificarClave($usuario['correo'], md5($usuario['clave']));
            require_once('../recuperarPass.php');
        }
        return  '';
    }


}

if(isset($llenar_select_usuario))
{
		require_once('Modelos/Usuario.php');
		$usuarios=Usuario::listar_todos();
		require_once('Vistas/Usuario/select_usuario.php');
}

	// Acciones que se solicitan por POST: Crear y modificar (producto en base de datos)
 	if(isset ($_POST['action'])){
 		//echo $_POST['action'];

 		if($_POST['action'] == 'desactivar_estado'){
 			$usuario_controlador = new Usuario_Controlador();
 			echo $usuario_controlador->desactivar_estado_usuario($_POST['id_usuario'],$_POST['on']);
 		}

 		if($_POST['action'] == 'activar_estado'){
 			$usuario_controlador = new Usuario_Controlador();
 			echo $usuario_controlador->activar_estado_usuario($_POST['id_usuario']);
		 }
		//Desactivar desde la lista-------------------------------
		//  if($_POST['action'] == 'desactivarEstadoLista'){
		// 	$usuario_controlador = new Usuario_Controlador();
		// 	echo $usuario_controlador->desactivarEstadoLista($_POST['id_usuario']);
		// }

		// if($_POST['action'] == 'activarEstadoLista'){
		// 	$usuario_controlador = new Usuario_Controlador();
		// 	echo $usuario_controlador->activarEstadoLista($_POST['id_usuario']);
		// }
		//----------------------------------------------------------
 		if($_POST['action']=='registrar_usuario'){
			require_once('../Modelos/Usuario.php');
			require_once('../conexion.php');
			$usuario_controlador = new Usuario_Controlador();
			$usuario = new Usuario('', $_POST['nombres'], $_POST['apellidos'], $_POST['slctipo_documento'], $_POST['numero_documento'], '', $_POST['telefono'], $_POST['fecha_nacimiento'], '', md5($_POST['clave']), $_POST['correo'], $_POST['correo_recuperacion']);
			$usuario_controlador->registrar_usuario($usuario);
		}

		if(($_POST['action']=='modificar_usuario')){
			require_once('../Modelos/Usuario.php');
			require_once('../conexion.php');
			$usuario_controlador = new Usuario_Controlador();
			//desde aca
			//$usuario = new Usuario($_POST['id_usuario'], $_POST['nombres'], $_POST['apellidos'], $_POST['slctipo_documento'], $_POST['numero_documento'], $_POST['slcrol'], $_POST['telefono'], $_POST['fecha_nacimiento'], $_POST['estado'], $_POST['clave'], $_POST['correo'],  $_POST['correo_recuperacion']);
			//hasta aca
			//echo "usuario";
			//var_dump($usuario);
			$usuario_controlador->modificar_usuario($_POST['id_usuario'], $_POST['nombres'], $_POST['apellidos'], $_POST['slctipo_documento'], $_POST['numero_documento'],$_POST['slcrol'], $_POST['telefono'], $_POST['fecha_nacimiento'], $_POST['estado'], $_POST['correo'], $_POST['correo_recuperacion']);
		}
		
		if(($_POST['action']=='modificar_administrador')){

			require_once('../Modelos/Usuario.php');
			require_once('../conexion.php');
			$usuario_controlador = new Usuario_Controlador();
			//desde aca
			//$usuario = new Usuario($_POST['id_usuario'], $_POST['nombres'], $_POST['apellidos'], $_POST['slctipo_documento'], $_POST['numero_documento'], $_POST['slcrol'], $_POST['telefono'], $_POST['fecha_nacimiento'], $_POST['estado'], $_POST['clave'], $_POST['correo'],  $_POST['correo_recuperacion']);
			//hasta aca
			$usuario_controlador->modificar_administrador($_POST['id_usuario'], $_POST['nombres'], $_POST['apellidos'], $_POST['slctipo_documento'], $_POST['numero_documento'],$_POST['slcrol'], $_POST['telefono'], $_POST['fecha_nacimiento'], $_POST['estado'], $_POST['correo'], $_POST['correo_recuperacion']);
		}


		if(($_POST['action']=='login_usuario')){
			require_once('../Modelos/Usuario.php');
			require_once('../conexion.php');
			$usuario_controlador = new Usuario_Controlador();
			$usuario_controlador->login_usuario($_POST['correo'], md5($_POST['clave']));
		} 

		if(($_POST['action']=='cerrarSesion')){
			require_once('../conexion.php');
			$usuario_controlador = new Usuario_Controlador();
			$usuario_controlador->cerrarSesion();
		}

		if ($_POST['action'] == 'recuperarClave') {
			require_once('../conexion.php');
			$usuario_controlador = new Usuario_Controlador();
       		$respuesta = $usuario_controlador->recuperarClave($_POST['correo_recuperacion']);
	        if (is_array($respuesta) && count($respuesta)) {
	            echo $respuesta['nombres'];
	        }
	        return '';
	    }

	    //---------------------------------------------------------------------------
	    if($_POST['action']=='Buscar') {
		require_once('../Modelos/Usuario.php');
		require_once('../conexion.php');
		$usuario_controlador=new Usuario_Controlador();
		$usuario= new Usuario('','','','','','','','','','','','');
		$usuario_controlador->buscar_usuario($_POST['dato_buscar']);
		}
		
		if($_POST['action']=='consultar_tipo_usuario') {
		require_once('../Modelos/Usuario.php');
		require_once('../conexion.php');
		$usuario_controlador=new Usuario_Controlador();
		$usuario = new Usuario('','','','','','','','','','','','');
		$usuario_controlador->consultar_tipo_usuario($_POST['dato_buscar']);
		}

			
		if($_POST['action']=='cambiarClaveAdm') {
			echo "eqew";
				require_once('../Modelos/Usuario.php');
				require_once('../conexion.php');
				$usuario_controlador=new Usuario_Controlador();
				$usuario_controlador->cambiarClaveAdm($_POST['id_usuario'],md5($_POST['clave']));
				}


		if($_POST['action']=='cambiarClaveUsu') {
				require_once('../Modelos/Usuario.php');
				require_once('../conexion.php');
				$usuario_controlador=new Usuario_Controlador();
				$usuario_controlador->cambiarClaveUsu($_POST['id_usuario'],md5($_POST['clave']));
				}		
		//------------------------------------------------------------------------------
	
} 


 ?>
