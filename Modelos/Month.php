<?php
	class Month{
		public $codigo_month;
		public $mes;	
		public $tarifa;
		public $porcentaje;
		public $fecha;

		function __construct($codigo_month,$mes,$porcentaje,$tarifa,$fecha)
		{
			$this->codigo_month=$codigo_month;
			$this->mes=$mes;
			$this->tarifa=$tarifa;
			$this->porcentaje=$porcentaje;
			$this->fecha=$fecha;
		}
		public static function listar_todos(){
			$lista_months  =[];
			$db=Db::getConnect();
			$sql=$db->query("SELECT DISTINCT *, concat('%','',tarifa) as tarifas, concat('$','',porcentaje) as porcentajes, 
			concat(concat(concat('La tarifa del mes:  ', mes),'  es:  '),tarifa) as xx 
			FROM month");
			foreach ($sql->fetchAll() as $month) {
				$tumesesitoOficial= new Month($month['codigo_month'],$month['mes'],$month['tarifas'],$month['porcentajes'],$month['fecha']);
				$tumesesitoOficial->elmesesito=$month['xx'];
				$lista_months[]=$tumesesitoOficial;
			}
			return $lista_months;
		}
		public static function registrar_month($month){
			$db=Db::getConnect();
			$insert=$db->prepare('INSERT INTO month  
			VALUES(:codigo_month, :mes, :tarifa, :porcentaje, :fecha)');
			$insert->bindValue('codigo_month',$month->codigo_month);
			$insert->bindValue('mes',$month->mes);
			$insert->bindValue('tarifa',$month->tarifa);
			$insert->bindValue('porcentaje',$month->porcentaje);
			$insert->bindValue('fecha',date("y-m-d"));
			if($insert->execute())
			{
				echo "Registro exitoso.";
			}
			else
			{
				echo "Problemas en el registro.";
			}
		}
		public static function modificar_month($codigo_month,$mes,$tarifa,$porcentaje,$fecha){
			$db=Db::getConnect();
			$update=$db->prepare("UPDATE month SET 
			mes='$mes',
			tarifa='$tarifa',
			porcentaje='$porcentaje',
			fecha='$fecha'
			WHERE codigo_month='$codigo_month'");
			$update->execute();
		}
		public static function eliminar_month($codigo_month){
			$db=Db::getConnect();
			$update=$db->prepare("DELETE FROM month 
			WHERE codigo_month=$codigo_month");
			$update->execute();
		}
		public static function Obtener_por_codigo_month($codigo_month){
			$db=Db::getConnect();
			$select=$db->prepare("SELECT * FROM month 
			WHERE codigo_month=$codigo_month");
			$select->execute();
			$monthDb=$select->fetch();
			$month= new Month($monthDb['codigo_month'],$monthDb['mes'],$monthDb['tarifa'],$monthDb['porcentaje'],$monthDb['fecha']);
			return $month;
		}
		public static function buscar_tarifa($codigo_month){
			$db=Db::getConnect();
			$select=$db->prepare("SELECT * FROM month WHERE codigo_month=$codigo_month");
			$select->execute();
			$monthDb=$select->fetch();
			return $monthDb['tarifa'];
		}
	}
?>