<?php
class Abono
{
	//atributos
	public $codigo_abono;
	public $id_cuentaCobro;
	public $id_usuario;
	public $fecha;
	public $deuda;
	public $abono;
	public $saldo;

	//constructor de la clase
	function __construct($codigo_abono, $id_cuentaCobro, $id_usuario, $fecha, $deuda, $abono, $saldo)
	{
		$this->codigo_abono=$codigo_abono;
		$this->id_cuentaCobro=$id_cuentaCobro;
		$this->id_usuario=$id_usuario;
		$this->fecha=$fecha;
		$this->deuda=$deuda;
		$this->abono=$abono;
		$this->saldo=$saldo;
	}

	//función para obtener todos los inmuebles

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
        $sql=$db->query("SELECT DISTINCT a.*, concat(u.nombres,'',u.apellidos) as nombre, p.monto_a_pagar as monto, a.codigo_abono ,a.id_cuentaCobro,a.id_usuario ,a.fecha ,a.deuda ,a.abono,a.saldo FROM usuario u inner join pago p on u.id_usuario = p.id_usuario 
            inner join abonos_pago a on p.id_usuario=a.id_usuario");

        //carga en la lista cada registro de la base de datos 
        foreach ($sql->fetchAll() as $abono){
            $itemabono= new Abono($abono['codigo_abono'],$abono['id_cuentaCobro'],$abono['id_usuario'],$abono['fecha'],$abono['deuda'],$abono['abono'],$abono['saldo']);
            $itemabono->nombreUsuario=$abono['nombre'];
            $itemabono->nombrePago=$abono['monto'];
              
            $lista_abonos[]= $itemabono;
        }
        return $lista_abonos;
    }

    public static function listar_abono_usuario($id_usuario){ 
        $lista_abonos =[];
        $db=Db::getConnect();
        $sql=$db->query("SELECT DISTINCT a.*, concat(u.nombres,'',u.apellidos) as nombre, p.monto_a_pagar as monto, a.codigo_abono ,a.id_cuentaCobro,a.id_usuario ,a.fecha ,a.deuda ,a.abono,a.saldo FROM usuario u inner join pago p on u.id_usuario = p.id_usuario 
      inner join abonos_pago a on p.id_usuario=a.id_usuario where u.id_usuario='$id_usuario'");

        //carga en la lista cada registro de la base de datos 
        foreach ($sql->fetchAll() as $abono){
            $itemabono= new Abono($abono['codigo_abono'],$abono['id_cuentaCobro'],$abono['id_usuario'],$abono['fecha'],$abono['deuda'],$abono['abono'],$abono['saldo']);
            $itemabono->nombreUsuario=$abono['nombre'];
            $itemabono->nombrePago=$abono['monto'];
              
            $lista_abonos[]= $itemabono;
        }
        return $lista_abonos;
    }

	public static function registrar_abono($abono){
        $db=Db::getConnect();
        $insert=$db->prepare('INSERT INTO abonos_pago   
        VALUES(:codigo_abono, :id_cuentaCobro, :id_usuario, :fecha, :deuda, :abono, :saldo)');
        $insert->bindValue('codigo_abono',$abono->codigo_abono);
        $insert->bindValue('id_cuentaCobro',$abono->id_cuentaCobro);//Puede ser codigo_pago
        $insert->bindValue('id_usuario',$abono->id_usuario);
        $insert->bindValue('fecha',$abono->fecha);	
        $insert->bindValue('deuda',$abono->deuda);
        $insert->bindValue('abono',$abono->abono);
        $insert->bindValue('saldo',$abono->saldo);
        if($insert->execute())
          {
			  echo "Registro exitoso.";
			  	$update=$db->prepare("UPDATE pago  SET
				monto_cancelado = monto_cancelado + $abono->abono
				WHERE id_cuentaCobro=$abono->id_cuentaCobro");
			if($update->execute()){
				$update=$db->prepare("UPDATE cuenta_cobro ccc
				inner join   pago p on  ccc.codigo_cuenta_cobro =  p.codigo_cuenta_cobro 
				SET ccc.monto_por_cancelar = (ccc.monto_por_cancelar - $abono->abono)
				WHERE p.codigo_pago=$abono->codigo_pago");
				$update->execute();
			}
	
          }
          else
          {
              echo "Problemas en el registro.";
		  }
		  

    }
	
	//la función para actualizar 
	public static function modificar_abono($codigo_abono,$id_cuentaCobro,$id_usuario,$fecha,$deuda,$abono,$saldo){
		$db=Db::getConnect();
		$sql=$db->query("SELECT abono FROM abonos_pago where codigo_abono = '$codigo_abono' ");
		$resutlado = $sql->fetch();
		 $abonoViejo = $resutlado['abono'];
		//$pagoReal = ($abonoViejo<$abono) ? $abono - $abonoViejo: $abonoViejo -$abono;
		// carga en la $lista_inmuebles cada registro desde la base de datos


		$update=$db->prepare("UPDATE abonos_pago SET
		codigo_abono=$codigo_abono,id_cuentaCobro=$id_cuentaCobro,
		id_usuario=$id_usuario,fecha='$fecha',deuda=$deuda +$abonoViejo -abono,
		abono=$abono,saldo=$saldo
		WHERE codigo_abono=$codigo_abono");
				
if($update->execute()){
	$updateP=$db->prepare("UPDATE pago  SET
	  monto_cancelado = monto_cancelado - $abonoViejo  + $abono
	  WHERE id_cuentaCobro='$id_cuentaCobro'");
  if($updateP->execute()){
	  $updateC=$db->prepare("UPDATE cuenta_cobro ccc
	  inner join   pago p on  ccc.codigo_cuenta_cobro =  p.codigo_cuenta_cobro 
	  SET ccc.monto_pagar = ( $abonoViejo + ccc.monto_pagar - $abono)
	  WHERE p.codigo_pago=$codigo_pago");
	  $updateC->execute();
}
		
	}
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
		$abono= new Abono($abonoDb['codigo_abono'],$abonoDb['id_cuentaCobro'],$abonoDb['id_usuario'],$abonoDb['fecha'],$abonoDb['deuda'],$abonoDb['abono'],$abonoDb['saldo']);
		return $abono;
	}
	
	public static function buscar_abono($dato){
		$lista_abonos =[];
		$db=Db::getConnect();
		$sql=$db->query("SELECT DISTINCT a.*, concat(u.nombres,'',u.apellidos) as nombre, p.monto_a_pagar as monto, a.codigo_abono ,a.id_cuentaCobro,a.id_usuario ,a.fecha ,a.deuda ,a.abono,a.saldo 
		FROM usuario u 
		inner join pago p on u.id_usuario = p.id_usuario 
		inner join abonos_pago a on p.codigo_cuenta_cobro=a.id_cuentaCobro
		WHERE (u.nombres like '%$dato%'
		or u.apellidos like '%$dato%')
		or a.codigo_abono like '%$dato%'");
		
		// carga en la $lista_inmuebles cada registro desde la base de datos
		   foreach ($sql->fetchAll() as $abono){
            $itemabono= new Abono($abono['codigo_abono'],$abono['id_cuentaCobro'],$abono['id_usuario'],$abono['fecha'],$abono['deuda'],$abono['abono'],$abono['saldo']);
            $itemabono->nombreUsuario=$abono['nombre'];
            $itemabono->nombrePago=$abono['monto'];
              
            $lista_abonos[]= $itemabono;
        }
		return $lista_abonos;
    }	


	
	

}
?>
