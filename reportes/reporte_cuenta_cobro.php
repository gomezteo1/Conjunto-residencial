<?php

  
require('librerias/fpdf181/fpdf.php');
require_once('conexion.php');
session_start();

class PDF extends FPDF{
  
//Cabecera de página
   function Header()
   {  
      require_once('Modelos/Usuario.php');
      // $pdf->Cell(150, 10, 'Factura de pago: '.$_SESSION['id_usuario'], 0);
      //$nombre = $new->getNom($usuario->nombres);
      //$apellido = $new->getApe($usuario->apellidos);
      //$documento = $new->getDoc($usuario->$numero_documento);
      //var_dump($nombre);
      //die();
        
      $this->SetTextColor(255, 255, 255);
      $this->SetFillColor(255,135,39);
      $this->Rect(0,0,220,20,'F');
      $this->SetFont('Arial','B',14);
      
      //$this->Write(5, 'Zamasoft');
      
      $this->Image("image/logo.png", 170, 8, 35);
      
      $this->Ln(10);
      $this->SetTextColor(0, 0, 0);
      $this->SetFont('Arial', '', 25);
      $this->Cell(175, -13, "Conjunto Residencial Juan del Corral", 0, 0, 'L');
      
      $this->Ln(20);
      $this->SetFont('Arial', '', 20);
      $this->Cell(60, -20,utf8_decode("Información básica"),0,0,'L');
      
      $this->Ln(8);
      $this->SetTextColor(0, 0, 0);
      $this->SetFont('Arial', '', 10);
      $this->Cell(190, 0, date('d-m-Y', time()), 0, 0, 'R');
      
      $this->Ln(10);
      $this->SetFont('Arial', 'B', 13);
      $this->SetTextColor(00, 00, 00);
      $this->Cell(47, -20,'Nombre y Apellido : ',0,0,'R');
      
      //1 
      $this->Ln(10);
      $this->SetFont('Arial', 'B', 13);
      $this->Cell(190, 0, utf8_decode("Cedula : "), 0, 0, 'L');
      $this->SetTextColor(0, 0, 0);
      //  $this->Cell(9, 1, $usuario['nombre'], 0, 0, 'L');
   
      //1
      // $this->SetFont('Arial', '', 10);
      // $this->SetTextColor(0, 0, 0);
      //$this->Cell(91, 10, $cuenta_cobro['documento'], 0, 0, 'L');   

      // $this->SetFont('Arial','B',15);
      //Movernos a la derecha
      
      //Título
      $this->SetFillColor(255, 120, 0);
      
      //Salto de línea
      $this->Ln(20);
      
   }
   function TablaColores($header){
      //Colores, ancho de línea y fuente en negrita
         $this->SetFillColor(250, 120, 0);
         $this->SetTextColor(21);
         $this->SetDrawColor(49,0,0);
         $this->SetLineWidth(.3);
         $this->SetFontSize(8);
         $this->SetFont('','B');
         //Cabecera
      
         for($i=0;$i<count($header);$i++)
         $this->Cell(30,7,$header[$i],1,0,'C',1);
         $this->Ln();
         //Restauración de colores y fuentes
         $this->SetFillColor(224,235,255);
         $this->SetTextColor(0);
         $this->SetFont('');
         // $this->SetX(40);
         //Datos
         $fill=false;
         
       
          $codigo_cuenta_cobro = $_GET['codigo_cuenta_cobro'];
          $db=Db::getConnect();
      
      
          $sql=$db->query("SELECT DISTINCT c.codigo_cuenta_cobro, c.nit, c.numero_cuenta, c.codigo_inmueble, c.codigo_month, 
          c.id_usuario, c.fecha, c.monto_por_cancelar, c.porMora, c.estado,
          concat(u.nombres,'', u.apellidos)as nombre, u.numero_documento as documento,
          concat(i.numero,'',i.torre) as inmueble, m.mes as mes
          FROM cuenta_cobro c
          left join pago p on c.codigo_cuenta_cobro = p.codigo_cuenta_cobro 
          left join usuario u on u.id_usuario = c.id_usuario 
          left join usuario_inmueble ui on u.id_usuario = ui.id_usuario
          left join inmueble i on ui.codigo_inmueble = i.codigo_inmueble
          left join month m on c.codigo_month = m.codigo_month
          where C.codigo_cuenta_cobro='$codigo_cuenta_cobro'");
          $registro=0;
          //carga en la lista cada registro de la base de datos 
          foreach ($sql->fetchAll() as $cuenta_cobro){
             if($registro>0)//No generar fila vacia
              {
                  $this->Ln();
                  $fill=!$fill;
              }
              
             $this->Cell(30,6,$cuenta_cobro['numero_cuenta'],'LRB',0,'L',$fill);
      
             $this->Cell(30,6,$cuenta_cobro['nit'],'LRB',0,'L',$fill);
             
             $this->Cell(30,6,$cuenta_cobro['inmueble'],'LRB',0,'L',$fill);
              
             $this->Cell(30,6,$cuenta_cobro['fecha'],'LRB',0,'L',$fill);
      
             $this->Cell(30,6,$cuenta_cobro['monto_por_cancelar'],'LRB',0,'L',$fill);
            
             if($cuenta_cobro['estado']==1){ return $this->Cell(30,6,"Pagado",'LRB',0,'L',$fill);
            }
             else{ return $this->Cell(30,6,"Debe",'LRB',0,'L',$fill);
            }
             
             $this->Ln();
              
              $fill=!$fill;
              $this->SetX(80);
      
          }
          
      //$this->Ln();
      
      $fill=true;
         //$this->Ln();
         $this->Cell(100,0,'','T');
      }

   function TablaColores2($body){
      
         //Colores, ancho de línea y fuente en negrita
       
         $this->SetFontSize(11);
         $this->SetFont('','B');
         //Cabecera
         
         for($i=0;$i<count($body);$i++)
        
         $codigo_cuenta_cobro = $_GET['codigo_cuenta_cobro'];
         $db=Db::getConnect();
      
      
         $sql=$db->query("SELECT DISTINCT c.codigo_cuenta_cobro, c.nit, c.numero_cuenta, c.codigo_inmueble, c.codigo_month, 
         c.id_usuario, c.fecha, c.monto_por_cancelar, c.porMora, c.estado,
         concat(u.nombres,'  ', u.apellidos)as nombre, u.numero_documento as numero_documento,
         concat(i.numero,'',i.torre) as inmueble, m.mes as mes
         FROM cuenta_cobro c
         left join pago p on c.codigo_cuenta_cobro = p.codigo_cuenta_cobro 
         left join usuario u on u.id_usuario = c.id_usuario 
         left join usuario_inmueble ui on u.id_usuario = ui.id_usuario
         left join inmueble i on ui.codigo_inmueble = i.codigo_inmueble
         left join month m on c.codigo_month = m.codigo_month
         where C.codigo_cuenta_cobro='$codigo_cuenta_cobro'");
         
         //carga en la lista cada registro de la base de datos 
         foreach ($sql->fetchAll() as $cuenta_cobro){
            
            
            $this->Cell(30,6,$cuenta_cobro['nombre'],'',0,'L',);
      
         }
             
         //$this->Ln();
         
         
         }   

 //----------------------------------------------------------------------
function TablaColores3($body2){
   //Colores, ancho de línea y fuente en negrita
 
   $this->SetFontSize(10);
   $this->SetFont('','B');
   //Cabecera
   
   for($i=0;$i<count($body2);$i++)
  
   $codigo_cuenta_cobro = $_GET['codigo_cuenta_cobro'];
   $db=Db::getConnect();


   $sql=$db->query("SELECT DISTINCT c.codigo_cuenta_cobro, c.nit, c.numero_cuenta, c.codigo_inmueble, c.codigo_month, 
   c.id_usuario, c.fecha, c.monto_por_cancelar, c.porMora, c.estado,
   concat(u.nombres,'', u.apellidos)as nombre, u.numero_documento as numero_documento,
   concat(i.numero,'',i.torre) as inmueble, m.mes as mes
   FROM cuenta_cobro c
   left join pago p on c.codigo_cuenta_cobro = p.codigo_cuenta_cobro 
   left join usuario u on u.id_usuario = c.id_usuario 
   left join usuario_inmueble ui on u.id_usuario = ui.id_usuario
   left join inmueble i on ui.codigo_inmueble = i.codigo_inmueble
   left join month m on c.codigo_month = m.codigo_month
   where C.codigo_cuenta_cobro='$codigo_cuenta_cobro'");
   
   //carga en la lista cada registro de la base de datos 
   foreach ($sql->fetchAll() as $cuenta_cobro){
      
      
      $this->Cell(30,6,$cuenta_cobro['numero_documento'],'',0,'L',);

   }
       
   //$this->Ln();
   
   
   }   
//Pie de página
function Footer()
{ 
   $this->SetFillColor(253,135,39);
   $this->Rect(0,150,220,50,'F');
   $this->SetFont('Arial','B',10);
   $this->SetTextColor(255, 255, 255);
   $this->SetY(-10);
   $this->Write(8, 'Zamasoft');
   //Posición: a 1,5 cm del final
   $this->Ln();
   $this->SetY(-15);
   //Arial italic 8
   $this->SetFont('Arial','I',8);
   //  //Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf=new PDF();

$body=array('');

$body2=array('');

$header=array('#Cuenta','Nit','Inmueble','Fecha','Monto Pagar','Estado');

$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(55);
$pdf->SetX(13);
$pdf->TablaColores2($body);

$pdf->SetY(75);
$pdf->SetX(13);
$pdf->TablaColores3($body2);
$pdf->SetY(100);
$pdf->TablaColores($header);
$pdf->Output();


?>