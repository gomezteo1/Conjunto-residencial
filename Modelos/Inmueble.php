<?php
class Inmueble
{
	//atributos
	public $codigo_inmueble;
	public $numero_matricula;
	public $tipo;
	public $torre;
	public $numero;
	public $metros;
	public $estado;
	
	//constructor de la clase
	function __construct($codigo_inmueble,$numero_matricula,$tipo,$torre,$numero,$metros,$estado)
	{
		$this->codigo_inmueble=$codigo_inmueble;
		$this->numero_matricula=$numero_matricula;
		$this->tipo=$tipo;
		$this->torre=$torre;
		$this->numero=$numero;
		$this->metros=$metros;
		$this->estado=$estado;
		
	}

	//función para obtener todos los productos
	public static function listar_todos(){
		$lista_inmuebles =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT DISTINCT * FROM inmueble');

		// carga en la $lista_productos cada registro desde la base de datos
		foreach ($sql->fetchAll() as $inmueble) {
			$lista_inmuebles[]= new Inmueble($inmueble['codigo_inmueble'],$inmueble['numero_matricula'],$inmueble['tipo'],$inmueble['torre'],$inmueble['numero'], $inmueble['metros'] , $inmueble['estado']);
		}
		return $lista_inmuebles;
    }
        
    //la función para registrar un producto
	public static function registrar_inmueble($inmueble){
        $db=Db::getConnect();
        $insert=$db->prepare('INSERT INTO inmueble   
        VALUES(:codigo_inmueble,:numero_matricula,:tipo,:torre,:numero,:metros,:estado)');
        $insert->bindValue('codigo_inmueble',$inmueble->codigo_inmueble);
        $insert->bindValue('numero_matricula',$inmueble->numero_matricula);
        $insert->bindValue('tipo',$inmueble->tipo);
        $insert->bindValue('torre',$inmueble->torre);
        $insert->bindValue('numero',$inmueble->numero);
        $insert->bindValue('metros',$inmueble->metros);
        $insert->bindValue('estado','1');
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
	public static function modificar_inmueble($codigo_inmueble,$numero_matricula,$tipo,$torre,$numero,$metros,$estado){
		$db=Db::getConnect();
		$update=$db->prepare("UPDATE inmueble SET 
		numero_matricula='$numero_matricula',
		tipo='$tipo',
		torre='$torre',
		numero='$numero',
		metros='$metros',
		estado='$estado'
		WHERE codigo_inmueble='$codigo_inmueble'");
		$update->execute();
	}
	
	//la función para eliminar 
	public static function eliminar_inmueble($codigo_inmueble){
		$db=Db::getConnect();
		$update=$db->prepare("DELETE FROM inmueble 
		WHERE codigo_inmueble=$codigo_inmueble");
		$update->execute();
	}
	
	public static function Obtener_por_codigo_inmueble($codigo_inmueble){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare("SELECT * FROM inmueble 
		WHERE codigo_inmueble=$codigo_inmueble");
		$select->execute();
		//asignarlo al objeto producto
		$inmuebleDb=$select->fetch();
		$inmueble= new Inmueble($inmuebleDb['codigo_inmueble'], $inmuebleDb['numero_matricula'],$inmuebleDb['tipo'], $inmuebleDb['torre'], $inmuebleDb['numero'], $inmuebleDb['metros'], $inmuebleDb['estado']);
		return $inmueble;
	}

	 public static function desactivar_estado_inmueble($codigo_inmueble){ 
        require_once('../conexion.php');
        $db = Db::getConnect();
        $update = $db->prepare("UPDATE inmueble SET estado='0' WHERE codigo_inmueble=$codigo_inmueble");
        $update->execute();                
    }

    public static function activar_estado_inmueble($codigo_inmueble){ 
        require_once('../conexion.php');
        $db = Db::getConnect();
        $update = $db->prepare("UPDATE inmueble SET estado='1' WHERE codigo_inmueble=$codigo_inmueble");
        $update->execute();                
    }
	
	public static function buscar_inmueble($dato){
		$lista_inmuebles =[];
		$db=Db::getConnect();
		$sql=$db->query("SELECT * FROM inmueble
		WHERE tipo like '%$dato%' 
		OR numero like '%$dato%' or 
		numero_matricula like '%$dato%' 
		OR torre like '%$dato%' or estado like '%$dato%'
		");
		
		// carga en la $lista_productos cada registro desde la base de datos
		foreach ($sql->fetchAll() as $inmueble) {
			$lista_inmuebles[]= new Inmueble($inmueble['codigo_inmueble'], $inmueble['numero_matricula'], $inmueble['tipo'], $inmueble['torre'], $inmueble['numero'], $inmueble['metros'] ,$inmueble['estado']);
		}
		return $lista_inmuebles;
	}
	/*
	public static function buscar_precio($inm_id){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare("SELECT * FROM inmueble WHERE inm_id=$inm_id");
		$select->execute();
		$inmuebleDb=$select->fetch();
		return $inmuebleDb['precio'];
		
		//return 122;
		//echo 3332;
	}*/

}
?>