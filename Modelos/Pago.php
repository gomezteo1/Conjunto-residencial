<?php
class Pago
{
    //atributos 
    public $codigo_pago;
    public $id_usuario;
    public $codigo_cuenta_cobro;
    public $fecha;
    public $codigo_tipo_pago;
    public $monto_cancelado;
    public $monto_a_pagar;
    
    //controlador de la clase 
    function __construct($codigo_pago,$id_usuario,$codigo_cuenta_cobro,$fecha,$codigo_tipo_pago,$monto_cancelado,$monto_a_pagar)
    {
        $this->codigo_pago=$codigo_pago;
        $this->id_usuario=$id_usuario;
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
        $sql=$db->query("SELECT DISTINCT p.*, 
        concat(u.nombres,'', u.apellidos)as xx, t.tipo_pago  
        FROM pago p inner join usuario u on p.id_usuario = u.id_usuario 
          inner join tipo_pago t on p.codigo_tipo_pago = t.codigo_tipo_pago ");

        //carga en la lista cada registro de la base de datos 
        foreach ($sql->fetchAll() as $pago){
            $itempago= new Pago($pago['codigo_pago'],$pago['id_usuario'],$pago['codigo_cuenta_cobro'],$pago['fecha'],$pago['codigo_tipo_pago'],$pago['monto_cancelado'],$pago['monto_a_pagar']);
            $itempago->nombreUsuario=$pago['xx'];
            $itempago->nombreTipoPago=$pago['tipo_pago'];
              
            $listar_pagos[]= $itempago;
        }
        return $listar_pagos;
    }

    public static function listar_pago_usuario($id_usuario){ 
        $listar_pagos =[];
        $db=Db::getConnect();

        $sql=$db->query("SELECT DISTINCT p.*, concat(u.nombres,'', u.apellidos)as xx,
         t.tipo_pago  FROM pago p inner join usuario u on p.id_usuario = u.id_usuario 
          inner join tipo_pago t on p.codigo_tipo_pago = t.codigo_tipo_pago where p.id_usuario='$id_usuario'");

        //carga en la lista cada registro de la base de datos 
        foreach ($sql->fetchAll() as $pago){
            $itempago= new Pago($pago['codigo_pago'],$pago['id_usuario'],$pago['codigo_cuenta_cobro'],$pago['fecha'],$pago['codigo_tipo_pago'],$pago['monto_cancelado'],$pago['monto_a_pagar']);
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
        $insert->bindValue('id_usuario',$pago->id_usuario);
        $insert->bindValue('codigo_cuenta_cobro',$pago->codigo_cuenta_cobro);
        $insert->bindValue('fecha',$pago->fecha);
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
        public static function modificar_pago($codigo_pago,$id_usuario, $codigo_cuenta_cobro, $fecha, $codigo_tipo_pago, $monto_cancelado, $monto_a_pagar){
            $db=Db::getConnect();
            $insert=$db->prepare("UPDATE pago SET id_usuario=id_usuario, codigo_cuenta_cobro=$codigo_cuenta_cobro, fecha='$fecha', codigo_tipo_pago=$codigo_tipo_pago, monto_cancelado='$monto_cancelado', monto_a_pagar='$monto_a_pagar'
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
            $pago= new Pago($pagoDb['codigo_pago'], $pagoDb['id_usuario'], $pagoDb['codigo_cuenta_cobro'], $pagoDb['fecha'], $pagoDb['codigo_tipo_pago'], $pagoDb['monto_cancelado'], $pagoDb['monto_a_pagar']);
            return $pago;
        } 
         public static function buscar_pago($dato){
            $listar_pagos =[];
            $db=Db::getConnect();
            $sql=$db->query("SELECT p.*, concat(u.nombres,'', u.apellidos)as xx,
            t.tipo_pago  FROM pago p 
            inner join usuario u on p.id_usuario = u.id_usuario 
            inner join tipo_pago t on p.codigo_tipo_pago = t.codigo_tipo_pago
            WHERE u.nombres like trim('%$dato%') Or u.apellidos like trim('%$dato%') 
            Or t.tipo_pago like trim('%$dato%') Or p.fecha like trim('%$dato%')
            Or p.monto_cancelado like trim('%$dato%') Or p.monto_a_pagar like trim('%$dato%')  
            ");
            
            // carga en la $lista_productos cada registro desde la base de datos
            foreach ($sql->fetchAll() as $pago) {
              $itempago= new Pago($pago['codigo_pago'],$pago['id_usuario'],$pago['codigo_cuenta_cobro'],$pago['fecha'],$pago['codigo_tipo_pago'],$pago['monto_cancelado'],$pago['monto_a_pagar']);
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