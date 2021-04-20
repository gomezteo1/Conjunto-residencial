<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    class Usuario{
        public $id_usuario;
        public $nombres;
        public $apellidos;
        public $id_tipo_documento;
        public $numero_documento;
        public $id_rol;
        public $telefono;
        public $fecha_nacimiento;
        public $estado;
        public $clave;
        public $correo;
        public $correo_recuperacion;
        
        function __construct($id_usuario, $nombres, $apellidos, $id_tipo_documento, $numero_documento, $id_rol, $telefono, $fecha_nacimiento, $estado,$clave, $correo, $correo_recuperacion){
            $this->id_usuario = $id_usuario;
            $this->nombres= $nombres;
            $this->apellidos= $apellidos;
            $this->id_tipo_documento = $id_tipo_documento ;
            $this->numero_documento= $numero_documento;
            $this->id_rol= $id_rol;
            $this->telefono = $telefono;
            $this->fecha_nacimiento= $fecha_nacimiento;
            $this->estado= $estado;
            $this->clave = $clave ;
            $this->correo= $correo;
            $this->correo_recuperacion= $correo_recuperacion;
        }
        public static function cambiarClaveAdm($usuario,$clave){
            $db=DB::getConnect();
            $update = $db->prepare("UPDATE usuario SET clave ='$clave' WHERE id_usuario=
                '$usuario'");
                $update->execute();
        }
        public static function cambiarClaveUsu($usuario,$clave){
            $db=DB::getConnect();
            $update = $db->prepare("UPDATE usuario SET clave ='$clave' WHERE id_usuario=
                $usuario");
            $update->execute();
        }
        public static function listar_usuario($id_usuario){
            $listar_usuarios =[];
            $db=Db::getConnect();
            $sql=$db->query("SELECT * FROM usuario u inner join rol r on u.id_rol = r.id_rol inner join tipo_documento t on u.id_tipo_documento = t.id_tipo_documento where id_usuario = '$id_usuario'" );
            foreach($sql->fetchAll() as $usuario){
                $itemusuario = new Usuario($usuario['id_usuario'], $usuario['nombres'], $usuario['apellidos'], $usuario['id_tipo_documento'], $usuario['numero_documento'], $usuario['id_rol'], $usuario['telefono'], $usuario['fecha_nacimiento'], $usuario['estado'], $usuario['clave'], $usuario['correo'], $usuario['correo_recuperacion']);
                $itemusuario->nombreRol=$usuario['rol'];
                $itemusuario->nombreTipoDocumento=$usuario['documento'];
                $listar_usuarios[]= $itemusuario;
            }
            return $listar_usuarios;
        }
        public static function listar_todos(){
            $listar_usuarios =[];
            $db=Db::getConnect();
            $sql=$db->query("SELECT DISTINCT u.*,r.rol,t.documento FROM usuario u 
                inner join rol r on u.id_rol = r.id_rol 
                inner join tipo_documento t on u.id_tipo_documento = t.id_tipo_documento  
            ");
            foreach($sql->fetchAll() as $usuario){
                $itemusuario = new Usuario($usuario['id_usuario'], $usuario['nombres'], $usuario['apellidos'], $usuario['id_tipo_documento'], $usuario['numero_documento'], $usuario['id_rol'], $usuario['telefono'], $usuario['fecha_nacimiento'], $usuario['estado'], $usuario['clave'], $usuario['correo'], $usuario['correo_recuperacion']);
            $itemusuario->nombreRol=$usuario['rol'];
                $itemusuario->nombreTipoDocumento=$usuario['documento'];
                $listar_usuarios[]= $itemusuario;
            }
            return $listar_usuarios;
        } 
        public static function validarCorreo(){
            $db=DB::getConnect();   
            error_reporting(0);
            $correo = htmlentities($_GET['correo']);
            $qcorreo = $db->query("SELECT correo FROM usuario WHERE correo='$correo'");
            $verficarcorreo = $qcorreo->fetchAll(PDO::FETCH_OBJ);
             if(!empty($verficarcorreo)){
                Echo"--HayRegistro--";
            }
        }
        public static function registrar_usuario($usuario){
            $db=DB::getConnect();
            error_reporting(0);
            $correo = htmlentities($_POST['correo']);
            $correo_recuperacion = htmlentities($_POST['correo_recuperacion']);
            $qcorreo = $db->query("SELECT correo FROM usuario WHERE correo='$correo' AND correo_recuperacion='$correo_recuperacion'");
            $verficarcorreo = $qcorreo->fetchAll(PDO::FETCH_OBJ);
            print_r($verficarcorreo);
            if(!empty($verficarcorreo)){
                return;
                echo '¡Vaya!, esto ya tiene un registro ';
            }
            if(isset($_SESSION['usuario']['rol'])){
                $insert=$db->prepare("INSERT INTO usuario VALUES(:id_usuario, :nombres, :apellidos, :id_tipo_documento, :numero_documento, :id_rol, :telefono, :fecha_nacimiento, :estado, :clave, :correo, :correo_recuperacion)"); 
                $insert->bindValue('id_usuario',$usuario->id_usuario);
                $insert->bindValue('nombres',$usuario->nombres);
                $insert->bindValue('apellidos',$usuario->apellidos);
                $insert->bindValue('id_tipo_documento',$usuario->id_tipo_documento);
                $insert->bindValue('numero_documento',$usuario->numero_documento);
                $insert->bindValue('id_rol',$usuario->id_rol);
                $insert->bindValue('telefono',$usuario->telefono);
                $insert->bindValue('fecha_nacimiento',$usuario->fecha_nacimiento);
                $insert->bindValue('estado',$usuario->estado);
                $insert->bindValue('clave',$usuario->clave);
                $insert->bindValue('correo',$usuario->correo);
                $insert->bindValue('correo_recuperacion',$usuario->correo_recuperacion);
            }
            else{
                $insert=$db->prepare("INSERT INTO usuario VALUES(:id_usuario, :nombres, :apellidos, :id_tipo_documento, :numero_documento, :id_rol, :telefono, :fecha_nacimiento, :estado, :clave, :correo, :correo_recuperacion)"); 
                $insert->bindValue('id_usuario',$usuario->id_usuario);
                $insert->bindValue('nombres',$usuario->nombres);
                $insert->bindValue('apellidos',$usuario->apellidos);
                $insert->bindValue('id_tipo_documento',$usuario->id_tipo_documento); //le paso el id de la cedula de una vez
                $insert->bindValue('numero_documento',$usuario->numero_documento);
                $insert->bindValue('id_rol','3');
                $insert->bindValue('telefono',$usuario->telefono);
                $insert->bindValue('fecha_nacimiento',$usuario->fecha_nacimiento);
                $insert->bindValue('estado','1');
                $insert->bindValue('clave',$usuario->clave);
                $insert->bindValue('correo',$usuario->correo);
                $insert->bindValue('correo_recuperacion',$usuario->correo_recuperacion);
            }
            $insert->execute();  
        }
        public static function modificar_usuario($id_usuario, $nombres, $apellidos, $id_tipo_documento, $numero_documento, $id_rol, $telefono,$fecha_nacimiento, $estado, $correo, $correo_recuperacion){ 
            $db=Db::getConnect();
            $update = $db->prepare("UPDATE usuario SET nombres ='$nombres', apellidos ='$apellidos', id_tipo_documento =$id_tipo_documento, numero_documento =$numero_documento, id_rol =$id_rol, telefono ='$telefono', fecha_nacimiento ='$fecha_nacimiento', estado ='$estado', correo ='$correo', correo_recuperacion ='$correo_recuperacion' WHERE id_usuario=$id_usuario");
            $update->execute();
        }
        public static function modificar_administrador($id_usuario, $nombres, $apellidos, $id_tipo_documento, $numero_documento, $id_rol, $telefono,$fecha_nacimiento, $estado, $correo, $correo_recuperacion){ 
            $db=Db::getConnect();
            $update = $db->prepare("UPDATE usuario SET nombres ='$nombres', apellidos ='$apellidos', id_tipo_documento =$id_tipo_documento, numero_documento =$numero_documento, id_rol =$id_rol, telefono ='$telefono', fecha_nacimiento ='$fecha_nacimiento', estado ='$estado', correo ='$correo', correo_recuperacion ='$correo_recuperacion' WHERE id_usuario=$id_usuario");
            $update->execute();
        }
        public static function eliminar_usuario($id_usuario){ 
            $db = Db::getConnect();
            $delete = $db->prepare("DELETE FROM usuario WHERE id_usuario=$id_usuario");
            $delete->execute();                
        }
        public static function desactivar_estado_usuario($id_usuario){ 
            require_once('../conexion.php');
            $db = Db::getConnect();
            $update = $db->prepare("UPDATE usuario SET estado='0' WHERE id_usuario=$id_usuario");
            $update->execute();                
        }
        public static function activar_estado_usuario($id_usuario){ 
            require_once('../conexion.php');
            $db = Db::getConnect();
            $update = $db->prepare("UPDATE usuario SET estado='1' WHERE id_usuario=$id_usuario");
            $update->execute();                
        }
        public static function desactivarEstadoLista($id_usuario){ 
            require_once('../conexion.php');
            $db = Db::getConnect();
            $update = $db->prepare("UPDATE usuario SET estado='0' WHERE id_usuario=$id_usuario");
            $update->execute();                
        }
        public static function activarEstadoLista($id_usuario){ 
            require_once('conexion.php');
            $db = Db::getConnect();
            $update = $db->prepare("UPDATE usuario SET estado='1' WHERE id_usuario=$id_usuario");
            $update->execute();                
        }
        public static function login_usuario($correo,$clave){
            $db=DB::getConnect();
            $select=$db->prepare("SELECT * FROM usuario WHERE correo='$correo' and clave='$clave' ");
            $select->execute();
            $usuarioDb=$select->fetch();
            return $usuarioDb; 
        }
        public static function Obtener_por_identificacion($id_usuario){
            $db=DB::getConnect();
            $select=$db->prepare("SELECT * FROM usuario WHERE id_usuario='$id_usuario'");
            $select->execute();
            $usuarioDb=$select->fetch();
            $usuario= new Usuario($usuarioDb['id_usuario'], $usuarioDb['nombres'], $usuarioDb['apellidos'], $usuarioDb['id_tipo_documento'], $usuarioDb['numero_documento'], $usuarioDb['id_rol'], $usuarioDb['telefono'], $usuarioDb['fecha_nacimiento'], $usuarioDb['estado'], $usuarioDb['clave'], $usuarioDb['correo'], $usuarioDb['correo_recuperacion']);
            return $usuario; 
        }
        public static function obtenerPorReferencia($correo_recuperacion){
            $db = Db::getConnect();
            $select = $db->prepare("SELECT * FROM usuario  WHERE correo_recuperacion ='$correo_recuperacion'");
            $select->execute();
            $usuario = $select->fetch();
            return  $usuario;
        }
        public static function  obtenerPorpId($id_usuario){
            $db = Db::getConnect();
            $select = $db->prepare("SELECT * FROM usuario  WHERE id_usuario ='$id_usuario'");
            $select->execute();
            $usuario = $select->fetch();
            return  $usuario;
        }
        public static function obtenerPorId($id_usuario){   
            $db = Db::getConnect();
            $select = $db->prepare("SELECT * FROM usuario  WHERE id_usuario ='$id_usuario'");
            $select->execute();
            $usuarioDb = $select->fetch();
            $usuario = $usuarioDb['id_usuario'];
            return  $usuario;
        }
        public static function buscar_tipo_usuario($id_usuario){
            $db=Db::getConnect();
            $sql=$db->prepare("SELECT DISTINCT u.*, r.rol as rol, t.documento as documento FROM usuario u 
            inner join rol r on u.id_rol = r.id_rol 
            inner join tipo_documento t on u.id_tipo_documento = t.id_tipo_documento 
            WHERE id_usuario=$id_usuario");
            foreach($sql->fetchAll() as $usuario){
                $itemusuario = new Usuario($usuario['id_usuario'], $usuario['nombres'], $usuario['apellidos'], $usuario['id_tipo_documento'], $usuario['numero_documento'], $usuario['id_rol'], $usuario['telefono'], $usuario['fecha_nacimiento'], $usuario['estado'], $usuario['clave'], $usuario['correo'], $usuario['correo_recuperacion']);
                $itemusuario->nombreRol=$usuario['rol'];
                $itemusuario->nombreTipoDocumento=$usuario['documento'];
                $listar_usuarios[]= $itemusuario;
                }
            return $listar_usuarios ;
        } 
        public static function modificarClave($correo, $clave){
            $db = Db::getConnect();
            $update = $db->prepare("UPDATE usuario SET clave = '$clave'  WHERE correo ='$correo'");
            try {
                return $update->execute();
            } 
            catch (PDOException $e) {
                return $e->getCode();
            }
        }
    }
?>      


