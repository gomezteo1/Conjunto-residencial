<?php

  
require('librerias/fpdf181/fpdf.php');
require_once('conexion.php');
class PDF extends FPDF
{
//Cabecera de página
   function Header()
   {
    //Logo
    $this->Image("image/Logo.jpg" , 10 ,8, 35 , 38 , "JPG" ,"http://localhost/zamasoft(1)/");
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Movernos a la derecha
    $this->Cell(80);
    //Título
    $this->Cell(60,10,'Abonos',1,0,'C');
    //Salto de línea
    $this->Ln(20);
      
   }
   
   //Pie de página
   function Footer()
   {
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }
   ///Tabla coloreada
function TablaColores($header)
{
//Colores, ancho de línea y fuente en negrita
$this->SetFillColor(70, 130, 180);
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
//Datos
   $fill=false;

    $db=Db::getConnect();
    $codigo_abono = $_GET['codigo_abono'];
    $sql=$db->query("SELECT concat(u.nombres,'',u.apellidos) as nombre ,a.codigo_abono ,a.id_cuentaCobro,a.id_usuario ,a.fecha ,a.deuda ,a.abono,a.saldo FROM usuario u inner join pago p on u.id_usuario = p.id_usuario 
      inner join abonos_pago a on p.id_usuario=a.id_usuario where $codigo_abono=codigo_abono");
    $registro=0;
    //carga en la lista cada registro de la base de datos 
    foreach ($sql->fetchAll() as $abono){
       if($registro>0)//No generar fila vacia
        {
          $this->Ln();
          $fill=!$fill;
        }
        
        $this->Cell(30,6,$abono['id_cuentaCobro'],'LR',0,'L',$fill);

        $this->Cell(30,6,$abono['nombre'],'LR',0,'L',$fill);

        $this->Cell(30,6,$abono['fecha'],'LR',0,'L',$fill);

        $this->Cell(30,6,$abono['deuda'],'LR',0,'L',$fill);

        $this->Cell(30,6,$abono['abono'],'LR',0,'L',$fill);

        $this->Cell(30,6,$abono['saldo'],'LR',0,'L',$fill);
        
        $this->Ln();
        $fill=!$fill;

    }
//$this->Ln();

$fill=true;
   //$this->Ln();
   $this->Cell(240,0,'','T');
}

}

$pdf=new PDF('L');
//Títulos de las columnas
$header=array('# Pago','Nombre','Fecha','Deuda','Abono','Saldo');
$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(65);
$pdf->TablaColores($header);
$pdf->Output();
?>