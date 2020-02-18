<?php
class Rol
{
	//atributos
	public $id_rol;
	public $rol;
	public $estado;
	
	//constructor de la clase
	function __construct($id_rol, $rol, $estado)
	{
		$this->id_rol=$id_rol;
		$this->rol=$rol;
		$this->estado=$estado;
		
	}

	//función para obtener todos los pagos
	public static function listar_todos(){
		$lista_roles =[];
		$db=Db::getConnect();
		$sql=$db->query("SELECT * FROM rol WHERE estado!='0'");

		// carga en la $lista_pagos cada registro desde la base de documentoddocumentoatos
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
		 if($insert->execute())
		 {
			 echo "Rol registrado con exito ";
		 }
		 else
		 {
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
	
	public static function buscar_rol($dato){
		$lista_roles =[];
		$db=Db::getConnect();
		$sql=$db->query("SELECT * FROM rol
		WHERE estado like '%$dato%' 
		OR rol like '%$dato%'
		OR id_rol like '%$dato%' 
		");
		
		foreach ($sql->fetchAll() as $rol) {
			$lista_roles[]= new Rol($rol['id_rol'],$rol['rol'],$rol['estado']);
		}
		return $lista_roles;
    }	
	
	public static function buscar_tipo_rol($id_rol){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare("SELECT * FROM rol 
		WHERE id_rol=$id_rol");
		$select->execute();
		$rolDb=$select->fetch();
		return $rolDb['rol'];
	}

}?>