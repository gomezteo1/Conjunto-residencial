<?php

date_default_timezone_set("America/bogota");
$fechita = date('yyyy-mm-dd');
    
class Pago
{   
    //atributos 
    public $codigo_pago;
    public $codigo_cuenta_cobro;
    public $fecha;
    public $codigo_tipo_pago;
    public $monto_cancelado;
    public $monto_a_pagar;
       
    //controlador de la clase 
    function __construct($codigo_pago,$codigo_cuenta_cobro,$fecha,$codigo_tipo_pago,$monto_cancelado,$monto_a_pagar)
    {
        $this->codigo_pago=$codigo_pago;
        $this->codigo_cuenta_cobro=$codigo_cuenta_cobro;
        $this->fecha=$fecha;
        $this->codigo_tipo_pago=$codigo_tipo_pago;
        $this->monto_cancelado=$monto_cancelado;
        $this->monto_a_pagar=$monto_a_pagar;
      
    }

    //funcion para obtener todos los productos 
    public static function listar_todos(){ 
        $listar_pagos =[];
        $db=Db::getConnect();
        $sql=$db->query("SELECT DISTINCT p.*, concat('$','',monto_cancelado) as monto_cancelados, concat('$','',monto_a_pagar) as monto_a_pagars,
        concat(u.nombres,'', u.apellidos)as xx, t.tipo_pago  
          
        FROM pago p
            left join cuenta_cobro c on p.codigo_cuenta_cobro = c.codigo_cuenta_cobro
            inner join usuario_inmueble ui on c.id_usuario_inmueble = ui.id_usuario_inmueble 
            inner join usuario u on ui.id_usuario = u.id_usuario
            inner join inmueble i on ui.codigo_inmueble = i.codigo_inmueble
            inner join tipo_pago t on p.codigo_tipo_pago = t.codigo_tipo_pago
            where ((datediff(p.fecha,now())*-1) <= 30)
         and ((datediff(p.fecha,now())*-1) >=0)
          ");

        //carga en la lista cada registro de la base de datos 
        foreach ($sql->fetchAll() as $pago){
            $itempago= new Pago($pago['codigo_pago'],$pago['codigo_cuenta_cobro'],$pago['fecha'],$pago['codigo_tipo_pago'],$pago['monto_cancelados'],$pago['monto_a_pagars']);
            $itempago->nombreUsuario=$pago['xx'];
            $itempago->nombreTipoPago=$pago['tipo_pago'];
              
            $listar_pagos[]= $itempago;
        }
        return $listar_pagos;
    }

    public static function listar_pago_usuario($id_usuario_inmueble){ 
        $listar_pagos =[];
        $db=Db::getConnect();

        $sql=$db->query("SELECT DISTINCT p.*, concat(u.nombres,'', u.apellidos)as xx,concat('$','',monto_cancelado) as monto_cancelados, concat('$','',monto_a_pagar) as monto_a_pagars,
         t.tipo_pago, c.id_usuario_inmueble  
         FROM pago p
            left join cuenta_cobro c on p.codigo_cuenta_cobro = c.codigo_cuenta_cobro
            inner join usuario_inmueble ui on c.id_usuario_inmueble = ui.id_usuario_inmueble 
            inner join usuario u on ui.id_usuario = u.id_usuario
            inner join inmueble i on ui.codigo_inmueble = i.codigo_inmueble
            inner join tipo_pago t on p.codigo_tipo_pago = t.codigo_tipo_pago
            where c.id_usuario_inmueble='$id_usuario_inmueble'");

        //carga en la lista cada registro de la base de datos 
        foreach ($sql->fetchAll() as $pago){
            $itempago= new Pago($pago['codigo_pago'],$pago['codigo_cuenta_cobro'],$pago['fecha'],$pago['codigo_tipo_pago'],$pago['monto_cancelados'],$pago['monto_a_pagars']);
            $itempago->nombreUsuario=$pago['xx'];
            $itempago->nombreTipoPago=$pago['tipo_pago'];
              
            $listar_pagos[]= $itempago;
        }
        return $listar_pagos;
    }

    
    //la funcion para registrar un pago 
    public static function registrar_pago($pago){
        $db=Db::getConnect();
        $insert=$db->prepare('INSERT INTO pago   
        VALUES(:codigo_pago, :id_usuario, :codigo_cuenta_cobro, :fecha, :codigo_tipo_pago, :monto_cancelado, :monto_a_pagar)');
        $insert->bindValue('codigo_pago',$pago->codigo_pago);
        $insert->bindValue('codigo_cuenta_cobro',$pago->codigo_cuenta_cobro);
        $insert->bindValue('fecha',date("y-m-d"));
        $insert->bindValue('codigo_tipo_pago',$pago->codigo_tipo_pago);
        $insert->bindValue('monto_cancelado',$pago->monto_cancelado);
        $insert->bindValue('monto_a_pagar',$pago->monto_a_pagar);
      
        if($insert->execute())
          {
                $update=$db->prepare("UPDATE cuenta_cobro 
                SET monto_por_cancelar = (monto_por_cancelar -$pago->monto_cancelado)
                WHERE codigo_cuenta_cobro=$pago->codigo_cuenta_cobro");
                $update->execute();
                echo "Registro exitoso.";
          }
          else
          {
              echo "Problemas en el registro.";
          }
    }
        //la funcion para actualizar  $codigo_pago,$id_usuario,$codigo_cuenta_cobro,$fecha,$codigo_tipo_pago,$monto_cancelado,$monto_a_pagar
        public static function modificar_pago($codigo_pago, $codigo_cuenta_cobro, $fecha, $codigo_tipo_pago, $monto_cancelado, $monto_a_pagar){
            $db=Db::getConnect();
            // require('');
            $insert=$db->prepare("UPDATE pago SET codigo_cuenta_cobro=$codigo_cuenta_cobro, fecha='$fecha', codigo_tipo_pago=$codigo_tipo_pago, monto_cancelado='$monto_cancelado', monto_a_pagar='$monto_a_pagar'
            WHERE codigo_pago='$codigo_pago'");
            $insert->execute();
        }
        //eliminar 
        public static function eliminar_pago($codigo_pago){
            $db=Db::getConnect();
            $delete=$db->prepare("DELETE FROM pago WHERE codigo_pago=$codigo_pago");
            $delete->execute();
        }
     
        //la funcion para actualizar 
         public static function Obtener_por_codigo_pago($codigo_pago){
            $db=Db::getConnect();
            $select=$db->prepare("SELECT * FROM pago WHERE codigo_pago=$codigo_pago");
            $select->execute();
            //asignar al objeto pago
            $pagoDb=$select->fetch();
            $pago= new Pago($pagoDb['codigo_pago'], $pagoDb['codigo_cuenta_cobro'], $pagoDb['fecha'], $pagoDb['codigo_tipo_pago'], $pagoDb['monto_cancelado'], $pagoDb['monto_a_pagar']);
            return $pago;
        } 
         public static function buscar_pago($dato){
            $datos = trim($dato);
            $listar_pagos =[];
            $db=Db::getConnect();
            $sql=$db->query("SELECT p.*, concat(u.nombres,'', u.apellidos)as xx,
            t.tipo_pago,concat('$','',monto_cancelado) as monto_cancelados, concat('$','',monto_a_pagar) as monto_a_pagars  
            FROM pago p
            left join cuenta_cobro c on p.codigo_cuenta_cobro = c.codigo_cuenta_cobro
            inner join usuario_inmueble ui on c.id_usuario_inmueble = ui.id_usuario_inmueble 
            inner join usuario u on ui.id_usuario = u.id_usuario
            inner join inmueble i on ui.codigo_inmueble = i.codigo_inmueble
            inner join tipo_pago t on p.codigo_tipo_pago = t.codigo_tipo_pago
            WHERE u.nombres like '%$datos%' Or u.apellidos like '%$datos%' 
            Or t.tipo_pago like  '%$datos%' Or p.fecha like '%$datos%'
            Or p.monto_cancelado like '%$datos%' Or p.monto_a_pagar like '%$datos%'
            Or p.codigo_pago like '%$datos%'  Or c.codigo_cuenta_cobro like '%$datos%' 
            ");
            
            // carga en la $lista_productos cada registro desde la base de datos
            foreach ($sql->fetchAll() as $pago) {
              $itempago= new Pago($pago['codigo_pago'],$pago['id_usuario'],$pago['codigo_cuenta_cobro'],$pago['fecha'],$pago['codigo_tipo_pago'],$pago['monto_cancelados'],$pago['monto_a_pagars']);
            $itempago->nombreUsuario=$pago['xx'];
            $itempago->nombreTipoPago=$pago['tipo_pago'];
              
            $listar_pagos[]= $itempago;
            }
            return $listar_pagos;
        }	

    public static function consultar_valor($codigo_pago){
    //buscar
    $monto_cancelado=9;
    $db=Db::getConnect();
    $select=$db->prepare("SELECT DISTINCT * FROM pago 
    WHERE codigo_pago=$codigo_pago");
    //echo "SELECT * FROM pago WHERE codigo_pago=$codigo_pago";
    $select->execute();
    //asignarlo al objeto inmueble
    //$pagoDb=$select->fetch();
    foreach ($select->fetchAll() as $pago) {
        $monto_cancelado=$pago['monto_a_pagar']-$pago['monto_cancelado'];
    }
    return $monto_cancelado;
  }

}       
?>