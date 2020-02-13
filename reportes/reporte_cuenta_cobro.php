<?php

  
require('librerias/fpdf181/fpdf.php');
require_once('conexion.php');
class PDF extends FPDF
{
//Cabecera de página
   function Header()
   {
    //Logo
    $this->Image("image/logo.jpg" , 10 ,8, 35 , 38 , "JPG" ,"http://localhost/zamasoft(1)/");
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Movernos a la derecha
    $this->Cell(80);
    //Título
    $this->Cell(60,10,'Cuenta cobro',1,0,'C');
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
    $codigo_cuenta_cobro = $_GET['codigo_cuenta_cobro'];


    $sql=$db->query("SELECT 
    rpad(concat(u.nombres,' ',u.apellidos),11,'*') as nombre,
    t.tipo_pago as tipo_pago,
    concat(i.numero,' ',i.torre) as inmueble,
    m.mora as mora,
    c.codigo_cuenta_cobro, c.numero_cuenta, c.nit, c.id_usuario, c.codigo_inmueble,
    c.codigo_month, c.codigo_tipo_pago,c.fecha,c.codigo_mora,c.monto_por_cancelar,c.estado  
    FROM tipo_pago t 
    inner join cuenta_cobro c on t.codigo_tipo_pago = c.codigo_tipo_pago 
    inner join usuario u on c.id_usuario=u.id_usuario 
    inner join inmueble i on c.codigo_inmueble=i.codigo_inmueble
    inner join mora m on c.codigo_mora=m.codigo_mora
    where $codigo_cuenta_cobro=codigo_cuenta_cobro");
    $registro=0;
    //carga en la lista cada registro de la base de datos 
    foreach ($sql->fetchAll() as $cuenta_cobro){
       if($registro>0)//No generar fila vacia
        {
          $this->Ln();
          $fill=!$fill;
        }
        
        $this->Cell(30,6,$cuenta_cobro['codigo_cuenta_cobro'],'LR',0,'L',$fill);

        $this->Cell(30,6,$cuenta_cobro['numero_cuenta'],'LR',0,'L',$fill);

        $this->Cell(30,6,$cuenta_cobro['nit'],'LR',0,'L',$fill);

        $this->Cell(30,6,$cuenta_cobro['nombre'],'LR',0,'L',$fill);

        $this->Cell(30,6,$cuenta_cobro['inmueble'],'LR',0,'L',$fill);

        $this->Cell(30,6,$cuenta_cobro['tipo_pago'],'LR',0,'L',$fill);

        $this->Cell(30,6,$cuenta_cobro['fecha'],'LR',0,'L',$fill);

        $this->Cell(30,6,$cuenta_cobro['mora'],'LR',0,'L',$fill);

        $this->Cell(30,6,$cuenta_cobro['monto_por_cancelar'],'LR',0,'L',$fill);

        
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
$header=array('#Cuenta','Numero Cuenta','Nit','Nombre','Inmueble','Tipo Pago','Fecha','Mora','Monto Pagar');
$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(65);
$pdf->TablaColores($header);
$pdf->Output();
?>