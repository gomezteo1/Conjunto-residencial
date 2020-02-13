<?php
class Inquilino
{
	//atributos
	public $documeto;
	public $nombres;
	public $apellidos;
	public $telefono;

	//constructor de la clase
	function __construct($documeto,$nombres,$apellidos,$telefono)
	{
		$this->documeto=$documeto;
		$this->nombres=$nombres;
		$this->apellidos=$apellidos;
		$this->telefono=$telefono;
	}

	//función para obtener todos los productos
	public static function listar_todos(){
		$lista_inquilinos =[];
		$db=Db::getConnect();
        $sql=$db->query('SELECT * FROM inquilino
        ORDER BY nombres ASC');

		// carga en la $lista_productos cada registro desde la base de datos
		foreach ($sql->fetchAll() as $inquilino) {
			$lista_inquilinos[]= new Inquilino($inquilino['documeto'],$inquilino['nombres'],$inquilino['apellidos'],$inquilino['telefono']);
		}
		return $lista_inquilinos;
    }
        
    //la función para registrar un producto
	/*public static function registrar_inquilino($inquilino){
        $db=Db::getConnect();
        $insert=$db->prepare('INSERT INTO inquilino   
        VALUES(:documeto,:nombres,:apellidos,:telefono)');
        $insert->bindValue('documeto',$inquilino->documeto);
        $insert->bindValue('nombres',$inquilino->nombres);
        $insert->bindValue('apellidos',$inquilino->apellidos);
        $insert->bindValue('telefono',$inquilino->telefono);
		if($insert->execute())*/
		public static function registrar_inquilino($inmueble){
       
			$db=Db::getConnect();
			  $insert=$db->prepare("INSERT INTO 
			  inquilino(documeto,nombres,apellidos,telefono)  
			  VALUES('$inmueble->documeto','$inmueble->nombres',
			  '$inmueble->apellidos','$inmueble->telefono')");
			  if($insert->execute())
          {
              echo "Registro exitoso.";
          }
          else
          {
              echo "Problemas en el registro.";
          }
    }
	
	//la función para actualizar 
	public static function modificar_inquilino($documeto,$nombres,$apellidos,$telefono){
		$db=Db::getConnect();
		$update=$db->prepare("UPDATE inquilino SET 
		nombres='$nombres',
		apellidos='$apellidos',
		telefono='$telefono'
		WHERE documeto='$documeto'");
		$update->execute();
	}
	
	//la función para eliminar 
	public static function eliminar_inquilino($documeto){
		$db=Db::getConnect();
		$update=$db->prepare("DELETE FROM inquilino 
		WHERE documeto=$documeto");
		$update->execute();
	}
	
	public static function Obtener_por_documeto($documeto){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare("SELECT * FROM inquilino 
		WHERE documeto=$documeto");
		$select->execute();
		//asignarlo al objeto producto
		$inquilinoDb=$select->fetch();
		$inquilino= new Inquilino($inquilinoDb['documeto'],$inquilinoDb['nombres'],$inquilinoDb['apellidos'],$inquilinoDb['telefono']);
		return $inquilino;
	}
	
	public static function buscar_inquilino($dato){
		$lista_inquilinos =[];
		$db=Db::getConnect();
		$sql=$db->query("SELECT * FROM inquilino
		WHERE nombres like '%$dato%' 
		OR telefono like '%$dato%'
		");
		
		// carga en la $lista_productos cada registro desde la base de datos
		foreach ($sql->fetchAll() as $inquilino) {
			$lista_inquilinos[]= new Inquilino($inquilino['documeto'],$inquilino['nombres'],$inquilino['apellidos'], $inquilino['telefono']);
		}
		return $lista_inquilinos;
    }
	/*public static function buscar_precio($documento){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare("SELECT * FROM inquilino WHERE referencia=$referencia");
		$select->execute();
		$productoDb=$select->fetch();
		return $productoDb['precio'];
		
		//return 122;
		//echo 3332;
    }*/

}
?>