<?php
class Tipo_Documento
{
//atributos
public $id_tipo_documento;
public $documento;

//constructor de la clase
function __construct($id_tipo_documento, $documento)
{
	$this->id_tipo_documento=$id_tipo_documento;
	$this->documento=$documento;
}

//función para obtener todos las categorías
public static function listar_todos(){
	$lista_tipo_documentos =[];
	$db=Db::getConnect();
	$sql=$db->query('SELECT * FROM tipo_documento');

	// carga en la $lista cada registro desde la base de datos
	foreach ($sql->fetchAll() as $tipo_documento) {
	$lista_tipo_documentos[]= new Tipo_Documento($tipo_documento['id_tipo_documento'],$tipo_documento['documento']);
	}
	return $lista_tipo_documentos;
}

 public static function registrar_tipo_documento($tipo_documento){
       
	   $db=Db::getConnect();
		 $insert=$db->prepare("INSERT INTO 
		 tipo_documento(documento)  
		 VALUES('$tipo_documento->documento')");
		 if($insert->execute())
		 {
			 echo "documento registrado con exito ";
		 }
		 else
		 {
			 echo "problemas en el registro";
		 }
    }
	
	public static function modificar_tipo_documento($id_tipo_documento, $documento){
		$db=Db::getConnect();
		$update=$db->prepare("UPDATE tipo_documento SET 
		documento='$documento'
		WHERE id_tipo_documento=$id_tipo_documento");
		$update->execute();
	}
	
	public static function eliminar_tipo_documento($id_tipo_documento){
		$db=Db::getConnect();
		$update=$db->prepare("DELETE FROM tipo_documento 
		WHERE id_tipo_documento=$id_tipo_documento");
		$update->execute();
	}
	
	public static function Obtener_por_identificacion($id_tipo_documento){
		$db=Db::getConnect();
		$select=$db->prepare("SELECT * FROM tipo_documento 
		WHERE id_tipo_documento=$id_tipo_documento");
		$select->execute();
		$tipo_documentoDb=$select->fetch();
		$tipo_documento= new Tipo_Documento($tipo_documentoDb['id_tipo_documento'],$tipo_documentoDb['documento']);
		return $tipo_documento;
	}
	
	public static function buscar_documento($dato){
		$lista_tipo_documentos =[];
		$db=Db::getConnect();
		$sql=$db->query("SELECT * FROM tipo_documento
		WHERE id_tipo_documento like '%$dato%' 
		OR documento like '%$dato%'
		");
		
		foreach ($sql->fetchAll() as $tipo_documento) {
			$lista_tipo_documentos[]= new Tipo_Documento($tipo_documento['id_tipo_documento'], $tipo_documento['documento']);
		}
		return $lista_tipo_documentos;
    }	
	
	public static function buscar_tipo_documento($id_tipo_documento){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare("SELECT * FROM tipo_documento 
		WHERE id_tipo_documento=$id_tipo_documento");
		$select->execute();
		$tipo_documentoDb=$select->fetch();
		return $tipo_documentoDb['documento'];
	}

}


?>