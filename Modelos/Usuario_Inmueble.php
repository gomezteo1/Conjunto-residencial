<?php
class Usuario_Inmueble
{
    //atributos 
    public $id_usuario_inmueble;
    public $id_usuario;
    public $codigo_inmueble;
    
    //controlador de la clase 
    function __construct($id_usuario_inmueble,$id_usuario,$codigo_inmueble)
    {
        $this->id_usuario_inmueble=$id_usuario_inmueble;
        $this->id_usuario=$id_usuario;
        $this->codigo_inmueble=$codigo_inmueble;
       
    }

    //funcion para obtener todos los productos 
    public static function listar_todos(){ 
        $listar_usuario_inmuebles =[];
        $db=Db::getConnect();
        $sql=$db->query("SELECT ui.*, concat(u.nombres,'', u.apellidos)as xx, concat(i.numero,'', i.torre)as zz  FROM 
          usuario_inmueble ui 
          inner join usuario u on ui.id_usuario = u.id_usuario 
          inner join inmueble i on ui.codigo_inmueble = i.codigo_inmueble ");

        //carga en la lista cada registro de la base de datos 
        foreach ($sql->fetchAll() as $usuario_inmueble){
            $itemusuario_inmueble= new Usuario_Inmueble($usuario_inmueble['id_usuario_inmueble'], $usuario_inmueble['id_usuario'], 
                $usuario_inmueble['codigo_inmueble']);
            $itemusuario_inmueble->nombreUsuario=$usuario_inmueble['xx'];
            $itemusuario_inmueble->nombreInmueble=$usuario_inmueble['zz'];
              
            $listar_usuario_inmuebles[]= $itemusuario_inmueble;
        }
        return $listar_usuario_inmuebles;
    }

     public static function listar_usuario_inmueble($id_usuario){ 
        $listar_usuario_inmuebles =[];
        $db=Db::getConnect();
        $sql=$db->query("SELECT ui.*, concat(u.nombres,'', u.apellidos)as xx, concat(i.numero,'', i.torre)as zz FROM 
          usuario u 
          inner join usuario_inmueble ui on u.id_usuario = ui.id_usuario 
          inner join inmueble i on ui.codigo_inmueble = i.codigo_inmueble where ui.id_usuario='$id_usuario'");

        //carga en la lista cada registro de la base de datos 
        foreach ($sql->fetchAll() as $usuario_inmueble){
            $itemusuario_inmueble= new Usuario_Inmueble($usuario_inmueble['id_usuario_inmueble'], $usuario_inmueble['id_usuario'], 
                $usuario_inmueble['codigo_inmueble']);
            $itemusuario_inmueble->nombreUsuario=$usuario_inmueble['xx'];
            $itemusuario_inmueble->nombreInmueble=$usuario_inmueble['zz'];
              
            $listar_usuario_inmuebles[]= $itemusuario_inmueble;
        }
        return $listar_usuario_inmuebles;
    }

    
    public static function registrar_usuario_inmueble($usuario_inmueble){
        $db=Db::getConnect();
        $insert=$db->prepare('INSERT INTO usuario_inmueble   
        VALUES(:id_usuario_inmueble, :id_usuario, :codigo_inmueble)');
        $insert->bindValue('id_usuario_inmueble',$usuario_inmueble->id_usuario_inmueble);
        $insert->bindValue('id_usuario',$usuario_inmueble->id_usuario);
        $insert->bindValue('codigo_inmueble',$usuario_inmueble->codigo_inmueble);
        
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
        public static function modificar_usuario_inmueble($id_usuario_inmueble,$id_usuario, $codigo_inmueble){
            $db=Db::getConnect();
            $insert=$db->prepare("UPDATE usuario_inmueble SET id_usuario=$id_usuario, codigo_inmueble=$codigo_inmueble
            WHERE id_usuario_inmueble=$id_usuario_inmueble");
            $insert->execute();
        }
        //eliminar 
        // public static function eliminar_usuario_inmueble($usuario_inmueble){
        //     $db=Db::getConnect();
        //     $delete=$db->prepare("DELETE FROM usuario_inmueble WHERE id_usuario_inmueble=$id_usuario_inmueble");
        //     $delete->execute();
        // }
     
        //la funcion para actualizar 
         public static function Obtener_por_id_usuario_inmueble($id_usuario_inmueble){
            $db=Db::getConnect();
            $select=$db->prepare("SELECT * FROM usuario_inmueble WHERE id_usuario_inmueble=$id_usuario_inmueble");
            $select->execute();
            //asignar al objeto usuario_inmueble
            $usuario_inmuebleDb=$select->fetch();
            $usuario_inmueble= new Usuario_Inmueble($usuario_inmuebleDb['id_usuario_inmueble'], $usuario_inmuebleDb['id_usuario'], $usuario_inmuebleDb['codigo_inmueble']);
            return $usuario_inmueble;
        } 
         public static function buscar_usuario_inmueble($dato){
            $listar_usuario_inmuebles =[];
            $db=Db::getConnect();
            $sql=$db->query("SELECT ui.*, concat(u.nombres,'', u.apellidos)as xx, concat(i.numero,'', i.torre)as zz  FROM 
            usuario_inmueble ui 
            inner join usuario u on ui.id_usuario = u.id_usuario 
            inner join inmueble i on ui.codigo_inmueble = i.codigo_inmueble
          WHERE (u.nombres like '%$dato%' 
          or u.apellidos like '%$dato%')or i.numero like '%$dato%' 
          or i.torre like '%$dato%'
          
          
          ");
            // carga en la $lista_productos cada registro desde la base de datos
            foreach ($sql->fetchAll() as $usuario_inmueble){
              $itemusuario_inmueble= new Usuario_Inmueble($usuario_inmueble['id_usuario_inmueble'], $usuario_inmueble['id_usuario'], 
                  $usuario_inmueble['codigo_inmueble']);
              $itemusuario_inmueble->nombreUsuario=$usuario_inmueble['xx'];
              $itemusuario_inmueble->nombreInmueble=$usuario_inmueble['zz'];
                
              $listar_usuario_inmuebles[]= $itemusuario_inmueble; 
            }
            return  $listar_usuario_inmuebles;
        }	







//_-------------------------------------------------------------------------------------------







        //-------------------------------------------------------------------------------------

    public static function consultar_usuario_inmueble($id_usuario_inmuebles){
    //buscar
    $id_usuario=9;
    $db=Db::getConnect();
    $select=$db->prepare("SELECT * FROM usuario_inmuebles 
    WHERE id_usuario_inmuebles=$id_usuario_inmuebles");
    //echo "SELECT * FROM usuario_inmueble WHERE codigo_usuario_inmueble=$codigo_usuario_inmueble";
    $select->execute();
    //asignarlo al objeto inmueble
    //$usuario_inmuebleDb=$select->fetch();
    foreach ($select->fetchAll() as $usuario_inmuebles) {
      $id_usuario=$usuario_inmuebles['id_usuario'];
    }
    return $id_usuario;
  }

}       
?>