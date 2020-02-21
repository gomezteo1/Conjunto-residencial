<?php
class Cuenta_cobro
{
    //atributo
    public $codigo_cuenta_cobro;
    public $numero_cuenta;
    public $nit;
    public $id_usuario;
    public $codigo_inmueble;
    public $codigo_month;
    //public $codigo_tipo_pago;
    public $fecha;
    public $codigo_mora;
    public $monto_por_cancelar;
    public $estado;
    
    //construtor de la clase 
    function __construct($codigo_cuenta_cobro,$numero_cuenta,$nit,$id_usuario,$codigo_inmueble,
    $codigo_month,$fecha,$monto_por_cancelar,$estado)
    {
        $this->codigo_cuenta_cobro=$codigo_cuenta_cobro;
        $this->numero_cuenta=$numero_cuenta;
        $this->nit=$nit;
        $this->id_usuario=$id_usuario;
        $this->codigo_inmueble=$codigo_inmueble;
        $this->codigo_month=$codigo_month;
        // $this->codigo_tipo_pago=$codigo_tipo_pago;
        $this->fecha=$fecha;
        // $this->codigo_mora=$codigo_mora;
        $this->monto_por_cancelar=$monto_por_cancelar;
        $this->estado=$estado;
    }
    //funtion para obtener todos los produuctos 
    public static function Obtener_cuenta_cobro($id){
        $db=Db::getConnect();
        $sql=$db->query("SELECT * FROM cuenta_cobro where codigo_cuenta_cobro='$id'");

        //carga en la lista _factuura cada registro
        $cuenta_cobro=$sql->fetch();
     
            $lista_cuenta_cobros= new Cuenta_cobro($cuenta_cobro['codigo_cuenta_cobro'],
            $cuenta_cobro['numero_cuenta'],$cuenta_cobro['nit'],$cuenta_cobro['id_usuario'],$cuenta_cobro['codigo_inmueble'],$cuenta_cobro['codigo_month'],$cuenta_cobro['fecha'],
           $cuenta_cobro['monto_por_cancelar'],$cuenta_cobro['estado']);
        
        return $lista_cuenta_cobros;
    }
//funtion para obtener todos los produuctos 
public static function listar_todos(){
    $lista_cuenta_cobros=[];
    $db=Db::getConnect();
    $sql=$db->query('SELECT * FROM cuenta_cobro');

    //carga en la lista _factuura cada registro 
    foreach ($sql->fetchAll() as $cuenta_cobro) {
        $lista_cuenta_cobros[]= new Cuenta_cobro($cuenta_cobro['codigo_cuenta_cobro'],$cuenta_cobro['numero_cuenta'],$cuenta_cobro['nit'],$cuenta_cobro['id_usuario'],$cuenta_cobro['codigo_inmueble'],$cuenta_cobro['codigo_month'],$cuenta_cobro['fecha'],$cuenta_cobro['monto_por_cancelar'],$cuenta_cobro['estado']);
    }
    return $lista_cuenta_cobros;
}
    
// public static function listar_cc_usuario($id_usuario){ 
//     $listar_pagos =[];
//     $db=Db::getConnect();

//     $sql=$db->query("SELECT c.*, concat(u.nombres,'', u.apellidos)as xx,
//      t.tipo_pago  FROM pago p inner join usuario u on p.id_usuario = u.id_usuario 
//       inner join tipo_pago t on p.codigo_tipo_pago = t.codigo_tipo_pago where p.id_usuario='$id_usuario'");

//     //carga en la lista cada registro de la base de datos 
//     foreach ($sql->fetchAll() as $pago){
//         $itempago= new Pago($pago['codigo_pago'],$pago['id_usuario'],$pago['codigo_cuenta_cobro'],$pago['fecha'],$pago['codigo_tipo_pago'],$pago['monto_cancelado'],$pago['monto_a_pagar']);
//         $itempago->nombreUsuario=$pago['xx'];
//         $itempago->nombreTipoPago=$pago['tipo_pago'];
          
//         $listar_pagos[]= $itempago;
//     }
//     return $listar_pagos;
// }    



 //la funcion de registrar 
 public static function registrar_cuenta_cobro($cuenta_cobro){
    //print_r($cuenta_cobro);
    $db=Db::getConnect();
    $insert=$db->prepare("INSERT INTO  cuenta_cobro(
        codigo_cuenta_cobro,numero_cuenta,nit,id_usuario,codigo_inmueble,codigo_month,fecha,codigo_mora,monto_por_cancelar)
         VALUES('',$cuenta_cobro->numero_cuenta,$cuenta_cobro->nit,$cuenta_cobro->id_usuario,$cuenta_cobro->codigo_inmueble,$cuenta_cobro->codigo_month,$cuenta_cobro->fecha,$cuenta_cobro->codigo_mora,$cuenta_cobro->monto_por_cancelar)");
    echo "INSERT INTO cuenta_cobro(codigo_cuenta_cobro,numero_cuenta,nit,id_usuario,codigo_inmueble,codigo_month,fecha,codigo_mora,monto_por_cancelar)VALUES('',$cuenta_cobro->numero_cuenta,$cuenta_cobro->nit,$cuenta_cobro->id_usuario,$cuenta_cobro->codigo_inmueble,$cuenta_cobro->codigo_month,'$cuenta_cobro->fecha'
    ,$cuenta_cobro->codigo_mora,$cuenta_cobro->monto_por_cancelar)";
    $insert->execute();
}

    //la función para actualizar 

    //la función para actualizar 
    public static function modificar_cuenta_cobro($codigo_cuenta_cobro,$numero_cuenta,$nit,$id_usuario,
    $codigo_inmueble,$codigo_month,$fecha,$codigo_mora,$monto_por_cancelar,$estado){
        $db=Db::getConnect();
        $update=$db->prepare("UPDATE cuenta_cobro SET 
        numero_cuenta='$numero_cuenta',nit='$nit',
        id_usuario='$id_usuario',codigo_inmueble='$codigo_inmueble',
        codigo_month='$codigo_month',
        fecha='$fecha',
        monto_por_cancelar='$monto_por_cancelar',estado='$estado'
        WHERE codigo_cuenta_cobro='$codigo_cuenta_cobro'");
        $update->execute();
    }
    
    
    //la función para eliminar 
    public static function eliminar_cuenta_cobro($codigo_cuenta_cobro){
        $db=Db::getConnect();
        $update=$db->prepare("DELETE FROM cuenta_cobro 
        WHERE codigo_cuenta_cobro=$codigo_cuenta_cobro");
        $update->execute();
    }
    

    public static function Obtener_ultima_cuenta_cobro(){
        //buscar
        $db=Db::getConnect();
        $select=$db->prepare("SELECT codigo_cuenta_cobro,codigo_month
        FROM cuenta_cobro 
        order by codigo_cuenta_cobro  desc
        LIMIT 1;");
        $select->execute();
        //asignar al objeto cuenta cobro
        $codigo_cuenta_cobroDb=$select->fetch();
        return $codigo_cuenta_cobroDb;
    }
      // esta es de la notificacion
      public static function notificar_cuenta_cobro_propietario($id_usuario){
        $db=Db::getConnect();
        $select=$db->prepare("SELECT * FROM cuenta_cobro 
        where id_usuario = '$id_usuario'");
        $select->execute();
        $codigo_cuenta_cobroDb=$select->fetchAll();
        return $codigo_cuenta_cobroDb; 
    }

    public static function desactivar_estado_cuenta_cobro($codigo_cuenta_cobro){ 
        require_once('../conexion.php');
        $db = Db::getConnect();
        $update = $db->prepare("UPDATE cuenta_cobro SET estado='0' WHERE codigo_cuenta_cobro=$codigo_cuenta_cobro");
        $update->execute();                
    }

    public static function activar_estado_cuenta_cobro($codigo_cuenta_cobro){ 
        require_once('../conexion.php');
        $db = Db::getConnect();
        $update = $db->prepare("UPDATE cuenta_cobro SET estado='1' WHERE codigo_cuenta_cobro=$codigo_cuenta_cobro");
        $update->execute();                
    }

    public static function buscar_cuenta_cobro($dato){
        $lista_cuenta_cobros =[];
        $db=Db::getConnect();
        $sql=$db->query("SELECT * FROM cuenta_cobro
        WHERE numero_cuenta like '%$dato%' 
        OR nit like '%$dato%'
        ");
          //carga en la lista _factuura cada registro 
      foreach ($sql->fetchAll() as $cuenta_cobro) {
        $lista_cuenta_cobros[]= new Cuenta_cobro($cuenta_cobro['codigo_cuenta_cobro'],$cuenta_cobro['numero_cuenta'],$cuenta_cobro['nit'],$cuenta_cobro['id_usuario'],$cuenta_cobro['codigo_inmueble'],$cuenta_cobro['codigo_month'],$cuenta_cobro['fecha'],$cuenta_cobro['monto_por_cancelar'],$cuenta_cobro['estado']);
    }
    return $lista_cuenta_cobros;
    }
   
}

?>




