<?php
   require('librerias/fpdf181/fpdf.php');
   require_once('conexion.php');
   class PDF extends FPDF{
      function Header(){  
         require_once('Modelos/Usuario.php');
         $this->SetTextColor(255, 255, 255);
         $this->SetFillColor(255,135,39);
         $this->Rect(0,0,220,20,'F');
         $this->SetFont('Arial','B',14);
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
            $db=Db::getConnect();
            $codigo_pago = $_GET['codigo_pago'];
            $sql=$db->query("SELECT DISTINCT u.nombres as nombre,p.codigo_pago,p.codigo_cuenta_cobro,
            p.fecha,t.tipo_pago,concat('$','',p.monto_cancelado) as monto_cancelados ,concat('$','',p.monto_a_pagar) as monto_a_pagars 
            FROM pago p
            left join cuenta_cobro c on p.codigo_cuenta_cobro = c.codigo_cuenta_cobro
            inner join usuario_inmueble ui on c.id_usuario_inmueble = ui.id_usuario_inmueble 
            inner join usuario u on ui.id_usuario = u.id_usuario
            inner join inmueble i on ui.codigo_inmueble = i.codigo_inmueble
            inner join tipo_pago t on p.codigo_tipo_pago = t.codigo_tipo_pago
            where codigo_pago='$codigo_pago'");
            $registro=0;
            //carga en la lista cada registro de la base de datos 
         foreach ($sql->fetchAll() as $pago){
            if($registro>0){
               $this->Ln();
               $fill=!$fill;
            }
            $this->Cell(30,6,$pago['codigo_pago'],'LRB',0,'L',$fill);
            $this->Cell(30,6,$pago['codigo_cuenta_cobro'],'LR',0,'L',$fill);
            $this->Cell(30,6,$pago['fecha'],'LR',0,'L',$fill);
            $this->Cell(30,6,$pago['tipo_pago'],'LR',0,'L',$fill);
            $this->Cell(30,6,$pago['monto_cancelados'],'LRB',0,'L',$fill);
            $this->Cell(30,6,$pago['monto_a_pagars'],'LRB',0,'L',$fill);
            $this->Ln();
            $fill=!$fill;
            $this->SetX(40);
         }
         $fill=true;
         $this->Cell(100,0,'','T');
      }
      function TablaColores2($body){
         $this->SetFontSize(11);
         $this->SetFont('','B');
         for($i=0;$i<count($body);$i++)
            $codigo_pago = $_GET['codigo_pago'];
            $db=Db::getConnect();
            $sql=$db->query("SELECT DISTINCT concat(u.nombres,' ',u.apellidos) as nombre
            FROM pago p
            left join cuenta_cobro c on p.codigo_cuenta_cobro = c.codigo_cuenta_cobro
            inner join usuario_inmueble ui on c.id_usuario_inmueble = ui.id_usuario_inmueble 
            inner join usuario u on ui.id_usuario = u.id_usuario
            inner join inmueble i on ui.codigo_inmueble = i.codigo_inmueble
            inner join tipo_pago t on p.codigo_tipo_pago = t.codigo_tipo_pago
            where codigo_pago='$codigo_pago'");
            //carga en la lista cada registro de la base de datos 
         foreach ($sql->fetchAll() as $pago){
            $this->Cell(30,6,$pago['nombre'],'',0,'L',);
         }
      }   
      function TablaColores3($body2){
         $this->SetFontSize(10);
         $this->SetFont('','B');
         for($i=0;$i<count($body2);$i++)
            $codigo_pago = $_GET['codigo_pago'];
            $db=Db::getConnect();
            $sql=$db->query("SELECT DISTINCT u.numero_documento as numero_documento 
            FROM pago p
            left join cuenta_cobro c on p.codigo_cuenta_cobro = c.codigo_cuenta_cobro
            inner join usuario_inmueble ui on c.id_usuario_inmueble = ui.id_usuario_inmueble 
            inner join usuario u on ui.id_usuario = u.id_usuario
            inner join inmueble i on ui.codigo_inmueble = i.codigo_inmueble
            inner join tipo_pago t on p.codigo_tipo_pago = t.codigo_tipo_pago
            where codigo_pago='$codigo_pago'");
         foreach ($sql->fetchAll() as $pago){
            $this->Cell(30,6,$pago['numero_documento'],'',0,'L',);
         }
      }   

      function Footer(){ 
         $this->SetFillColor(253,135,39);
         $this->Rect(0,150,220,50,'F');
         $this->SetFont('Arial','B',10);
         $this->SetTextColor(255, 255, 255);
         $this->SetY(-10);
         $this->Write(8, 'Zamasoft Pago');
         $this->Ln();
         $this->SetY(-15);
         $this->SetFont('Arial','I',8);
         $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
      }
   }
   $pdf=new PDF();
   $body=array('');
   $body2=array('');
   $header=array('Serial Pago','Serial Cuenta','Fecha','Tipo Pago','Monto Cancelado','Monto a Pagar');
   $pdf->AliasNbPages();
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