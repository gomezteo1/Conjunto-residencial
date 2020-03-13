<?php
class Abono
{
	public $codigo_abono;
	public $codigo_pago;
	public $fecha;
	public $deuda;
	public $abono;
	public $saldo;

	function __construct($codigo_abono, $codigo_pago, $fecha, $deuda, $abono, $saldo)
	{
		$this->codigo_abono=$codigo_abono;
		$this->codigo_pago=$codigo_pago;
		$this->fecha=$fecha;
		$this->deuda=$deuda;
		$this->abono=$abono;
		$this->saldo=$saldo;
	}
//---------------------Listar------------------------------------------

/*	public static function listar_todos(){
		$lista_abonos =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM abonos_pago');

		// carga en la $lista_inmuebles cada registro desde la base de datos
		foreach ($sql->fetchAll() as $abono) {
			$lista_abonos[]= new Abono($abono['codigo_abono'],$abono['id_cuentaCobro'],$abono['id_usuario'],$abono['fecha'],$abono['deuda'],$abono['abono'],$abono['saldo']);
		}
		return $lista_abonos;
	}
*/
	public static function listar_todos(){ 
        $lista_abonos =[];
        $db=Db::getConnect();
        $sql=$db->query("SELECT DISTINCT a.*, concat(u.nombres,'',u.apellidos) as nombre, concat('$','',p.monto_a_pagar) as monto, a.codigo_abono, a.codigo_pago, a.fecha as fechas , concat('$','',a.deuda) as deudas, concat('$','',a.abono) as abonos ,concat('$','',a.saldo) as saldos
		from abonos_pago a 
		left join pago p on a.codigo_pago = p.codigo_pago
		left join cuenta_cobro c on p.codigo_cuenta_cobro = c.codigo_cuenta_cobro
		left join usuario_inmueble ui on c.id_usuario_inmueble = ui.id_usuario_inmueble 
		left join usuario u on ui.id_usuario = u.id_usuario
		left join inmueble i on ui.codigo_inmueble = i.codigo_inmueble
		left join tipo_pago t on p.codigo_tipo_pago = t.codigo_tipo_pago
		where ((datediff(a.fecha,now())*-1) <= 30)
         and ((datediff(a.fecha,now())*-1) >=0)");

		foreach ($sql->fetchAll() as $abono){
            $itemabono= new Abono($abono['codigo_abono'],$abono['codigo_pago'],$abono['fechas'],$abono['deudas'],$abono['abonos'],$abono['saldos']);
            $itemabono->nombreUsuario=$abono['nombre'];
            $itemabono->nombrePago=$abono['monto'];
              
            $lista_abonos[]= $itemabono;
        }
        return $lista_abonos;
    }
	public static function listar_abono_usuario($id_usuario){ 
        $lista_abonos =[];
        $db=Db::getConnect();
        $sql=$db->query("SELECT DISTINCT a.*, concat(u.nombres,'',u.apellidos) as nombre, concat('$','',p.monto_a_pagar) as monto, a.codigo_abono, a.codigo_pago  
		,a.fecha ,concat('$','',a.deuda) as deudas ,concat('$','',a.abono) as abonos 
		,concat('$','',a.saldo) as saldos
		from abonos a inner join pago p on a.codigo_pago = p.codigo_pago
		left join cuenta_cobro c on p.codigo_cuenta_cobro = c.codigo_cuenta_cobro
		inner join usuario_inmueble ui on c.id_usuario_inmueble = ui.id_usuario_inmueble 
		inner join usuario u on ui.id_usuario = u.id_usuario
		inner join inmueble i on ui.codigo_inmueble = i.codigo_inmueble
		inner join tipo_pago t on p.codigo_tipo_pago = t.codigo_tipo_pago
		 where u.id_usuario='$id_usuario'");

        foreach ($sql->fetchAll() as $abono){
            $itemabono= new Abono($abono['codigo_abono'],$abono['codigo_pago'],$abono['fecha'],$abono['deudas'],$abono['abonos'],$abono['saldos']);
            $itemabono->nombreUsuario=$abono['nombre'];
            $itemabono->nombrePago=$abono['monto'];
              
            $lista_abonos[]= $itemabono;
        }
        return $lista_abonos;
    }
//------------------------CRUD-------------------------------------------------------------------
	public static function registrar_abono($abono){
        $db=Db::getConnect();
        $insert=$db->prepare('INSERT INTO abonos_pago   
        VALUES(:codigo_abono, :codigo_pago,  :fecha, :deuda, :abono, :saldo)');
        $insert->bindValue('codigo_abono',$abono->codigo_abono);
		$insert->bindValue('codigo_pago',$abono->codigo_pago);
		$insert->bindValue('fecha',date("y-m-d"));
        $insert->bindValue('deuda',$abono->deuda);
        $insert->bindValue('abono',$abono->abono);
        $insert->bindValue('saldo',$abono->saldo);
		
		try {
            if($insert->execute()){
			  echo "Registro exitoso.";
			  $update=$db->prepare("UPDATE pago  SET
			monto_cancelado = monto_cancelado + $abono->abono
			WHERE codigo_pago=$abono->codigo_pago");
				if($update->execute()){
					$update=$db->prepare("UPDATE cuenta_cobro ccc
					inner join   pago p on  ccc.codigo_cuenta_cobro =  p.codigo_cuenta_cobro 
					SET ccc.monto_por_cancelar = (ccc.monto_por_cancelar - $abono->abono)
					WHERE p.codigo_pago=$abono->codigo_pago");
					$update->execute();
				}
			}else{
		 	 echo "Problemas en el registro.";
	  		}
	  	}catch (PDOException $e) {
			//return $e->getCode();
			echo"No se puede registrar ese valor existe";
        }
        //se encarga de ejecutar las inserciones    
    }
		
	//la función para actualizar 
	public static function modificar_abono($codigo_abono,$codigo_pago,$fecha,$deuda,$abono,$saldo){
		$db=Db::getConnect();
		$sql=$db->query("SELECT abono FROM abonos_pago where codigo_abono = '$codigo_abono' ");
		$resutlado = $sql->fetch();
		 $abonoViejo = $resutlado['abono'];
		//$pagoReal = ($abonoViejo<$abono) ? $abono - $abonoViejo: $abonoViejo -$abono;
		// carga en la $lista_inmuebles cada registro desde la base de datos
		$update=$db->prepare("UPDATE abonos_pago SET
		codigo_abono=$codigo_abono, 
		codigo_pago=$codigo_pago,
		fecha='$fecha',
		deuda=$deuda +$abonoViejo -abono,
		abono=$abono,
		saldo=$saldo
		WHERE codigo_abono=$codigo_abono");
				
		if($update->execute()){
			$updateP=$db->prepare("UPDATE pago  SET
			monto_cancelado = monto_cancelado - $abonoViejo + $abono
			WHERE codigo_pago='$codigo_pago'");
			if($updateP->execute()){

				$updateC=$db->prepare("UPDATE cuenta_cobro ccc
				inner join pago p on ccc.codigo_cuenta_cobro = p.codigo_cuenta_cobro 
				SET p.monto_a_pagar = ( $abonoViejo + p.monto_a_pagar - $abono)
				WHERE p.codigo_pago='$codigo_pago'");
				$updateC->execute();
			}
		}
	}
	
		public static function buscar_pago($codigo_abono){
			$db=Db::getConnect();
			$select=$db->prepare("SELECT * from pago WHERE codigo_pago='$codigo_abono'");
			$select->execute();
			$abonoDb=$select->fetch();
			return $abonoDb['monto_cancelado'];	
	
	
	
			}

	//la función para eliminar 
	public static function eliminar_abono($codigo_abono){
		$db=Db::getConnect();
		$update=$db->prepare("DELETE FROM abonos_pago 
		WHERE codigo_abono=$codigo_abono");
		$update->execute();
	}
	
	public static function Obtener_por_codigo_abono($codigo_abono){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare("SELECT * FROM abonos_pago 
		WHERE codigo_abono=$codigo_abono");
		$select->execute();
		//asignarlo al objeto inmueble
		$abonoDb=$select->fetch();
		$abono= new Abono($abonoDb['codigo_abono'], $abonoDb['codigo_pago'], $abonoDb['fecha'], $abonoDb['deuda'], $abonoDb['abono'], $abonoDb['saldo']);
		return $abono;
	}
	
	public static function buscar_abono($dato){
		$datos = trim($dato);
		$lista_abonos =[];
		$db=Db::getConnect();
		$sql=$db->query("SELECT DISTINCT a.*, concat(u.nombres,'',u.apellidos) as nombre, concat('$','',p.monto_a_pagar) as monto, a.codigo_abono ,a.codigo_pago ,a.fecha ,concat('$','',a.deuda) as deudas, concat('$','',a.abono) as abonos,concat('$','',a.saldo) as saldos 
		from abonos a inner join pago p on a.codigo_pago = p.codigo_pago
		left join cuenta_cobro c on p.codigo_cuenta_cobro = c.codigo_cuenta_cobro
		inner join usuario_inmueble ui on c.id_usuario_inmueble = ui.id_usuario_inmueble 
		inner join usuario u on ui.id_usuario = u.id_usuario
		inner join inmueble i on ui.codigo_inmueble = i.codigo_inmueble
		inner join tipo_pago t on p.codigo_tipo_pago = t.codigo_tipo_pago
		WHERE (u.nombres like '%$datos%'    or u.apellidos like '%$datos%')
		or (a.codigo_abono like '%$datos%'  or a.fecha like '%$datos%') 
		or (p.monto_a_pagar like '%$datos%' or a.deuda like '%$datos%') 
		or a.abono like '%$datos%' or a.saldo like '%$datos%'  ");
		
		// carga en la $lista_inmuebles cada registro desde la base de datos
		   foreach ($sql->fetchAll() as $abono){
            $itemabono= new Abono($abono['codigo_abono'],$abono['codigo_pago'],$abono['fecha'],$abono['deudas'],$abono['abonos'],$abono['saldos']);
            $itemabono->nombreUsuario=$abono['nombre'];
            $itemabono->nombrePago=$abono['monto'];
              
            $lista_abonos[]= $itemabono;
        }
		return $lista_abonos;
	}	
	
		


	
	

}
?>
