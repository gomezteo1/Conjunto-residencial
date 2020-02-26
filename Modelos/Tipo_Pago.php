<?php
class Tipo_pago
{
    //atributos 
    public $codigo_tipo_pago;
    public $tipo_pago;
    public $descripcion;

    //controlador de la clase 
    function __construct($codigo_tipo_pago,$tipo_pago,$descripcion)
    {
        $this->codigo_tipo_pago=$codigo_tipo_pago;
        $this->tipo_pago=$tipo_pago;
        $this->descripcion=$descripcion;

    }

    //funcion para obtener todos los productos 
    public static function listar_todos(){
        $listar_tipo_pagos =[];
        $db=Db::getConnect();
        $sql=$db->query('SELECT DISTINCT * FROM tipo_pago');

        //carga en la lista cada registro de la base de datos 
        foreach ($sql->fetchAll() as $tipo_pago){
            $listar_tipo_pagos[]= new Tipo_pago($tipo_pago['codigo_tipo_pago'],$tipo_pago['tipo_pago'],$tipo_pago['descripcion']);
        }
        return $listar_tipo_pagos;
    }
   
    public static function registrar_tipoPago($tipo_pago){
        $db=Db::getConnect();
        $insert=$db->prepare('INSERT INTO tipo_pago   
        VALUES(:codigo_tipo_pago,:tipo_pago,:descripcion)');
        $insert->bindValue('codigo_tipo_pago',$tipo_pago->codigo_tipo_pago);
        $insert->bindValue('tipo_pago',$tipo_pago->tipo_pago);
        $insert->bindValue('descripcion',$tipo_pago->descripcion);
        if($insert->execute())
          {
              echo "Registro exitoso.";
          }
          else
          {
              echo "Problemas en el registro.";
          }
    }
        //la funcion para actualizar 
        public static function modificar_tipo_pago($codigo_tipo_pago,$tipo_pago,$descripcion){
            $db=Db::getConnect();
            $insert=$db->prepare("UPDATE tipo_pago SET 
            tipo_pago='$tipo_pago',
            descripcion='$descripcion'
            WHERE codigo_tipo_pago='$codigo_tipo_pago'");
            $insert->execute();
        }
        //eliminar 
        public static function eliminar_tipo_pago($codigo_tipo_pago){
            $db=Db::getConnect();
            $delete=$db->prepare("DELETE FROM tipo_pago WHERE codigo_tipo_pago=$codigo_tipo_pago");
            $delete->execute();
            
        }
     
        //la funcion para actualizar 
         public static function Obtener_por_codigo_tipo_pago($codigo_tipo_pago){
            $db=Db::getConnect();
            $select=$db->prepare("SELECT * FROM tipo_pago WHERE codigo_tipo_pago=$codigo_tipo_pago");
            $select->execute();
            //asignar al objeto pago
            $tipo_pagoDb=$select->fetch();
            $tipo_pago= new Tipo_pago($tipo_pagoDb['codigo_tipo_pago'],$tipo_pagoDb['tipo_pago'],$tipo_pagoDb['descripcion']);
            return $tipo_pago;
        } 
         public static function buscar_pago($dato){
            $listar_tipo_pagos =[];
            $db=Db::getConnect();
            $sql=$db->query("SELECT * FROM tipo_pago
            WHERE codigo_tipo_pago like '%$dato%' 
            OR tipo_pago like '%$dato%' or descripcion like '%$dato%'
            ");
            
            // carga en la $lista_productos cada registro desde la base de datos
            foreach ($sql->fetchAll() as $tipo_pago) {
                $listar_tipo_pagos[]= new Tipo_pago($tipo_pago['codigo_tipo_pago'],$tipo_pago['tipo_pago'],$tipo_pago['descripcion']);
            }
            return $listar_tipo_pagos;
        }


        public static function buscar_tipo_pago($codigo_tipo_pago){
        //buscar
        $db=Db::getConnect();
        $select=$db->prepare("SELECT * FROM tipo_pago 
        WHERE codigo_tipo_pago=$codigo_tipo_pago");
        $select->execute();
        $tipo_pagoDb=$select->fetch();
        return $tipo_pagoDb['tipo_pago'];
      }	
    
}                  
?>