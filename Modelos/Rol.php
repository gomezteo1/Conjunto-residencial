<?php
	$datos;
	class Rol{	
		public $id_rol;
		public $rol;
		public $estado;
		
		function __construct($id_rol, $rol, $estado){
			$this->id_rol=$id_rol;
			$this->rol=$rol;
			$this->estado=$estado;
		}
		public static function listar_todos(){
			$lista_roles =[];
			$db=Db::getConnect();
			$sql=$db->query("SELECT DISTINCT * FROM rol WHERE estado!='0'");
			foreach ($sql->fetchAll() as $rol) {
				$lista_roles[]= new Rol($rol['id_rol'], $rol['rol'], $rol['estado']);
			}
			return $lista_roles;
		}
		public static function registrar_rol($rol){
			$db=Db::getConnect();
			$insert=$db->prepare("INSERT INTO 
			rol(rol,estado)  
			VALUES('$rol->rol','$rol->estado')");
			if($insert->execute()){
				echo "Rol registrado con exito ";
			}
			else{
				echo "problemas en el registro";
			}
		}
		public static function modificar_rol($id_rol, $rol, $estado){
			$db=Db::getConnect();
			$update=$db->prepare("UPDATE rol SET 
			rol='$rol', estado='$estado'
			WHERE id_rol=$id_rol");
			$update->execute();
		}
		public static function cambiar_estado_rol($id_rol){
			$db=Db::getConnect();
			$update=$db->prepare("UPDATE rol SET estado='0' WHERE id_rol=$id_rol");
			$update->execute();
		}
		public static function eliminar_rol($id_rol){
			$db=Db::getConnect();
			$update=$db->prepare("DELETE FROM rol 
			WHERE id_rol=$id_rol");
			$update->execute();
		}
		public static function Obtener_por_identificacion($id_rol){
			$db=Db::getConnect();
			$select=$db->prepare("SELECT * FROM rol 
			WHERE id_rol=$id_rol");
			$select->execute();
			$rolDb=$select->fetch();
			$rol= new Rol($rolDb['id_rol'],$rolDb['rol'],$rolDb['estado']);
			return $rol;
		}
		public static function buscar_tipo_rol($id_rol){
			$db=Db::getConnect();
			$select=$db->prepare("SELECT * FROM rol 
			WHERE id_rol=$id_rol");
			$select->execute();
			$rolDb=$select->fetch();
			return $rolDb['rol'];
		}
	}
?>