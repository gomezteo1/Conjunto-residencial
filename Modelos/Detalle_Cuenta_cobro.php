<?php
	class Detalle_Cuenta_cobro{
		public $codigo_detalle_cuenta_cobro;
		public $codigo_cuenta_cobro;
		public $codigo_month;
		public $fecha_detalle;

		function __construct($codigo_detalle_cuenta_cobro,$codigo_cuenta_cobro,$codigo_month,$fecha_detalle)
		{
			$this->codigo_detalle_cuenta_cobro=$codigo_detalle_cuenta_cobro;
			$this->codigo_cuenta_cobro=$codigo_cuenta_cobro;
			$this->codigo_month=$codigo_month;
			$this->fecha_detalle=$fecha_detalle;
		}
		public static function registrar_detalle_cuenta_cobro($ccc, $cm){
			$db=Db::getConnect();
			$insert=$db->prepare("INSERT INTO 
			detalle_cuenta_cobro(codigo_cuenta_cobro,codigo_month,fecha_detalle) VALUES
			($ccc,$cm,now())");
			$respuesta = $insert->execute(); 
			if($respuesta){
			return "Detalle Guardado";
			}
			else{
			return "Problemas en el registro detalle";
			}
		}
	}
?>