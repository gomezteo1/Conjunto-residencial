<?php
class Month
{
	//atributos
	public $codigo_month;
    public $mes;	
	
	public $porcentaje;
	public $fecha;

	//constructor de la clase
	function __construct($codigo_month,$mes,$porcentaje,$fecha)
	{
		$this->codigo_month=$codigo_month;
		$this->mes=$mes;
		
		$this->porcentaje=$porcentaje;
		$this->fecha=$fecha;
	}

	//función para obtener todos los productos
	public static function listar_todos(){
		$lista_months  =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM month');

		// carga en la $lista_productos cada registro desde la base de datos
		foreach ($sql->fetchAll() as $month) {
			$lista_months []= new Month($month['codigo_month'],$month['mes'],$month['porcentaje'],$month['fecha']);
		}
		return $lista_months;
    }
        
    //la función para registrar un producto
	public static function registrar_month($month){
       
	   $db=Db::getConnect();
		 $insert=$db->prepare("INSERT INTO 
		 month(codigo_month,mes,tarifa,porcentaje,fecha)  
		 VALUES('$month->codigo_month','$month->mes',
		 '$month->tarifa','$month->porcentaje',$month->fecha)");
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
	public static function modificar_month($codigo_month,$mes,$porcentaje){
		$db=Db::getConnect();
		$update=$db->prepare("UPDATE month SET 
		mes='$mes',
		porcentaje='$porcentaje'
		WHERE codigo_month='$codigo_month'");
		$update->execute();
	}
	
	//la función para eliminar 
	public static function eliminar_month($codigo_month){
		$db=Db::getConnect();
		$update=$db->prepare("DELETE FROM month 
		WHERE codigo_month=$codigo_month");
		$update->execute();
	}
	
	public static function Obtener_por_codigo_month($codigo_month){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare("SELECT * FROM month 
		WHERE codigo_month=$codigo_month");
		$select->execute();
		//asignarlo al objeto producto
		$monthDb=$select->fetch();
		$month= new Month($monthDb['codigo_month'],$monthDb['mes'],$monthDb['porcentaje'],$monthDb['fecha']);
		return $month;
	}
	
	public static function buscar_month($dato){
		$lista_months =[];	
		$db=Db::getConnect();
		$sql=$db->query("SELECT * FROM month
		WHERE codigo_month like '%$dato%' 
		OR mes like '%$dato%' or porcentaje like '%$dato%' 
		OR fecha like '%$dato%'
		");
		
		// carga en la $lista_productos cada registro desde la base de datos
		foreach ($sql->fetchAll() as $month) {
			$lista_months[]= new Month($month['codigo_month'],$month['mes'],$month['porcentaje'],$month['fecha']);
		}
		return $lista_months;
    }
	public static function buscar_tarifa($codigo_month){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare("SELECT * FROM month WHERE codigo_month=$codigo_month");
		$select->execute();
		$monthDb=$select->fetch();
		return $monthDb['tarifa'];
		
		//return 122;
		//echo 3332;
	}

}
?>