<?php
    class Tipo_pago{
        public $codigo_tipo_pago;
        public $tipo_pago;
        public $descripcion;

        function __construct($codigo_tipo_pago,$tipo_pago,$descripcion){
            $this->codigo_tipo_pago=$codigo_tipo_pago;
            $this->tipo_pago=$tipo_pago;
            $this->descripcion=$descripcion;
        }
        public static function listar_todos(){
            $listar_tipo_pagos =[];
            $db=Db::getConnect();
            $sql=$db->query('SELECT DISTINCT * FROM tipo_pago');
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
            if($insert->execute()){
                echo "Registro exitoso.";
            }
            else{
                echo "Problemas en el registro.";
            }
        }
        public static function modificar_tipo_pago($codigo_tipo_pago,$tipo_pago,$descripcion){
            $db=Db::getConnect();
            $insert=$db->prepare("UPDATE tipo_pago SET 
            tipo_pago='$tipo_pago',
            descripcion='$descripcion'
            WHERE codigo_tipo_pago='$codigo_tipo_pago'");
            $insert->execute();
        }
        public static function eliminar_tipo_pago($codigo_tipo_pago){
            $db=Db::getConnect();
            $delete=$db->prepare("DELETE FROM tipo_pago WHERE codigo_tipo_pago=$codigo_tipo_pago");
            $delete->execute();
            
        }        public static function Obtener_por_codigo_tipo_pago($codigo_tipo_pago){
            $db=Db::getConnect();
            $select=$db->prepare("SELECT * FROM tipo_pago WHERE codigo_tipo_pago=$codigo_tipo_pago");
            $select->execute();
            $tipo_pagoDb=$select->fetch();
            $tipo_pago= new Tipo_pago($tipo_pagoDb['codigo_tipo_pago'],$tipo_pagoDb['tipo_pago'],$tipo_pagoDb['descripcion']);
            return $tipo_pago;
        }
        public static function buscar_tipo_pago($codigo_tipo_pago){
            $db=Db::getConnect();
            $select=$db->prepare("SELECT * FROM tipo_pago 
            WHERE codigo_tipo_pago=$codigo_tipo_pago");
            $select->execute();
            $tipo_pagoDb=$select->fetch();
            return $tipo_pagoDb['tipo_pago'];
        }	
        
    }                  
?>