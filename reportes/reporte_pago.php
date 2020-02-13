<!-- <?php
 
require('../librerias/fpdf181/fpdf.php');
require_once('../conexion.php');
//require_once('Modelos/Pago.php');

class PDF extends FPDF
{
//Cabecera de página
   function Header()
   {
    $db=Db::getConnect();

    $pago = $_GET['codigo_pago'];


    $select=$db->prepare("SELECT * FROM pago where codigo_pago=$codigo_pago");
    $select->execute();
    $pago=$select->fetch();  

    //Logo
    $this->Image("img/1.jpg" , 10 ,8, 35 , 38 , "JPG" ,"http://localhost/zamasoft(1)");
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Movernos a la derecha
    /*$this->Cell(200,60,'codigo_pago:'.$pago['codigo_pago'],0,0,'R');
    $this->Ln(10);     
    $this->Cell(200,60,'id_usuario:'.$pago['id_usuario'],0,0,'R');
    $this->Ln(10);
    $this->Cell(80,60,'codigo_cuenta_cobro:'.$pago['codigo_cuenta_cobro'],0,0,'C');
    $this->Cell(200,60,'fecha:'.$pago['fecha'],0,0,'R');
    $this->Ln(10);
    $this->Cell(200,60,'monto_cancelado:'.$pago['monto_cancelado'],0,0,'R');
    $this->Ln(10);
    $this->Cell(80,60,'monto_a_pagar:'.$pago['monto_a_pagar'],0,0,'C');*/
    //Título     
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
    $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
   }
   //Tabla simple
   /*function TablaSimple($header)
   {
    //Cabecera
    foreach($header as $col)
    $this->Cell(40,7,$col,1);
    $this->Ln();

    
   }*/
   
   //Tabla coloreada
function TablaColores($header)
{
//Colores, ancho de línea y fuente en negrita
$this->SetFillColor(0,0,0);
$this->SetTextColor(255);
$this->SetDrawColor(128,0,0);
$this->SetLineWidth(.3);
$this->SetFont('','B');
//Cabecera

for($i=0;$i<count($header);$i++)
$this->Cell(40,7,$header[$i],1,0,'C',1);
$this->Ln();
//Restauración de colores y fuentes
$this->SetFillColor(224,235,255);
$this->SetTextColor(0);
$this->SetFont('');
//Datos
$fill=false;
$db=Db::getConnect();
$codigo_pago = $_GET['codigo_pago'];
$sql=$db->query("SELECT * FROM pago where codigo_pago=$codigo_pago");
// carga en la $lista_productos cada registro desde la base de datos
$registro=0;
foreach ($sql->fetchAll() as $pago) {
  if($registro>0)//No generar fila vacia
  {
    $this->Ln();
    $fill=!$fill;
  }
  $this->Cell(40,6,$pago['codigo_pago'],'LR',0,'L',$fill);
  $this->Cell(40,6,$pago['id_usuario'],'LR',0,'L',$fill);
  $this->Cell(40,6,$pago['codigo_cuenta_cobro'],'LR',0,'L',$fill);
  $this->Cell(40,6,$pago['fecha'],'LR',0,'L',$fill);
  $this->Cell(40,6,$pago['codigo_tipo_pago'],'LR',0,'L',$fill);
  $this->Cell(40,6,$pago['monto_cancelado'],'LR',0,'L',$fill);
  $this->Cell(40,6,$pago['monto_a_pagar'],'LR',0,'L',$fill);
  $registro++;
}
  $fill=true;
   $this->Ln();
   $this->Cell(160,0,'','T');
}

   
   
}

$pdf=new PDF();
//Títulos de las columnas
$header=array('codigo_pago','id_usuario','codigo_cuenta_cobro','fecha','codigo_tipo_pago','monto_cancelado','monto_a_pagar');
$pdf->AliasNbPages();
//Primera página
/*$pdf->AddPage();
$pdf->SetY(65);*/
//$pdf->AddPage();
//$pdf->TablaSimple($header);
//Segunda página
$pdf->AddPage();
$pdf->SetY(65);
$pdf->TablaColores($header);
$pdf->Output();
?>
 -->