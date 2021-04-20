<?php
    date_default_timezone_set("America/bogota");
    $fechita = date('yyyy-mm-dd');
    class Pago{   
        public $codigo_pago;
        public $codigo_cuenta_cobro;
        public $fecha;
        public $codigo_tipo_pago;
        public $monto_cancelado;
        public $monto_a_pagar;
        
        function __construct($codigo_pago,$codigo_cuenta_cobro,$fecha,$codigo_tipo_pago,$monto_cancelado,$monto_a_pagar){
            $this->codigo_pago=$codigo_pago;
            $this->codigo_cuenta_cobro=$codigo_cuenta_cobro;
            $this->fecha=$fecha;
            $this->codigo_tipo_pago=$codigo_tipo_pago;
            $this->monto_cancelado=$monto_cancelado;
            $this->monto_a_pagar=$monto_a_pagar;
        }
        public static function listar_todos(){ 
            $listar_pagos =[];
            $db=Db::getConnect();
            $sql=$db->query("SELECT DISTINCT p.*, concat('$','',monto_cancelado) as monto_cancelados, concat('$','',monto_a_pagar) as monto_a_pagars,
            concat(u.nombres,'', u.apellidos)as xx, t.tipo_pago,
             concat(concat(concat(concat(concat('Datos ',u.nombres,' ',u.apellidos),'  Inmueble',
            concat(i.numero,'',i.torre)),
            concat('  $','',p.monto_cancelado)),'  ',
            concat('-   $','',p.monto_a_pagar)),' Fecha Generada: ', p.fecha)
            as datosPersonales
            FROM pago p
                left join cuenta_cobro c on p.codigo_cuenta_cobro = c.codigo_cuenta_cobro
                inner join usuario_inmueble ui on c.id_usuario_inmueble = ui.id_usuario_inmueble 
                inner join usuario u on ui.id_usuario = u.id_usuario
                inner join inmueble i on ui.codigo_inmueble = i.codigo_inmueble
                inner join tipo_pago t on p.codigo_tipo_pago = t.codigo_tipo_pago
                where ((datediff(p.fecha,now())*-1) <= 30)
            and ((datediff(p.fecha,now())*-1) >=0)
            order by p.fecha desc   
            ");
            foreach ($sql->fetchAll() as $pago){
                $itempago= new Pago($pago['codigo_pago'],$pago['codigo_cuenta_cobro'],$pago['fecha'],$pago['codigo_tipo_pago'],$pago['monto_cancelados'],$pago['monto_a_pagars']);
                $itempago->nombreUsuario=$pago['xx'];
                $itempago->nombreTipoPago=$pago['tipo_pago'];
                $itempago->Datos=$pago['datosPersonales'];   
                $listar_pagos[]= $itempago;
            }
            return $listar_pagos;
        }
        public static function listar_pago_usuario($id_usuario){ 
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
                where u.id_usuario='$id_usuario'
                order by p.fecha desc");
            foreach ($sql->fetchAll() as $pago){
                $itempago= new Pago($pago['codigo_pago'],$pago['codigo_cuenta_cobro'],$pago['fecha'],$pago['codigo_tipo_pago'],$pago['monto_cancelados'],$pago['monto_a_pagars']);
                $itempago->nombreUsuario=$pago['xx'];
                $itempago->nombreTipoPago=$pago['tipo_pago'];
                $listar_pagos[]= $itempago;
            }
            return $listar_pagos;
        }
        public static function registrar_pago($pago){
            $db=Db::getConnect();
            $insert=$db->prepare('INSERT INTO pago   
            VALUES(:codigo_pago, :codigo_cuenta_cobro, :fecha, :codigo_tipo_pago, :monto_cancelado, :monto_a_pagar)');
            $insert->bindValue('codigo_pago',$pago->codigo_pago);
            $insert->bindValue('codigo_cuenta_cobro',$pago->codigo_cuenta_cobro);
            $insert->bindValue('fecha',date("y-m-d"));
            $insert->bindValue('codigo_tipo_pago',$pago->codigo_tipo_pago);
            $insert->bindValue('monto_cancelado',$pago->monto_cancelado);
            $insert->bindValue('monto_a_pagar',$pago->monto_a_pagar);
            if($insert->execute()){
                    $update=$db->prepare("UPDATE cuenta_cobro 
                    SET monto_por_cancelar = (monto_por_cancelar -$pago->monto_cancelado)
                    WHERE codigo_cuenta_cobro=$pago->codigo_cuenta_cobro");
                    $update->execute();
                    echo "Registro exitoso.";
            }
            else{
                echo "Problemas en el registro.";
            }
        }
        public static function modificar_pago($codigo_pago, $codigo_cuenta_cobro, $fecha, $codigo_tipo_pago, $monto_cancelado, $monto_a_pagar){
            $db=Db::getConnect();
            $insert=$db->prepare("UPDATE pago SET codigo_cuenta_cobro=$codigo_cuenta_cobro, fecha='$fecha', codigo_tipo_pago=$codigo_tipo_pago, monto_cancelado='$monto_cancelado', monto_a_pagar='$monto_a_pagar'
            WHERE codigo_pago='$codigo_pago'");
            $insert->execute();
        }
        public static function eliminar_pago($codigo_pago){
            $db=Db::getConnect();
            $delete=$db->prepare("DELETE FROM pago WHERE codigo_pago=$codigo_pago");
            $delete->execute();
        }
        public static function Obtener_por_codigo_pago($codigo_pago){
            $db=Db::getConnect();
            $select=$db->prepare("SELECT * FROM pago WHERE codigo_pago=$codigo_pago");
            $select->execute();
            $pagoDb=$select->fetch();
            $pago= new Pago($pagoDb['codigo_pago'], $pagoDb['codigo_cuenta_cobro'], $pagoDb['fecha'], $pagoDb['codigo_tipo_pago'], $pagoDb['monto_cancelado'], $pagoDb['monto_a_pagar']);
            return $pago;
        } 
        public static function consultar_valor($codigo_pago){
            $monto_cancelado=9;
            $db=Db::getConnect();
            $select=$db->prepare("SELECT DISTINCT * FROM pago 
            WHERE codigo_pago=$codigo_pago");
            $select->execute();
            foreach ($select->fetchAll() as $pago) {
                $monto_cancelado=$pago['monto_a_pagar']-$pago['monto_cancelado'];
            }
            return $monto_cancelado;
        }
    }       
?>