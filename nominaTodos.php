<?php

include('libs/libConexion.php');

include ("pdf/fpdf.php");
include("libs/libBusqueda.php");
include('libs/libGeneral.php');


class PdfExtra extends FPDF
{
  // Cabecera de página
  function Header()
  {
      $this->SetFont('Arial','B',20);
      //$this->Cell(80);
      $this->SetY(10);
    $this->SetX(0);//valor final x=153
    $this->SetTextColor(255,255,255);
    $this->SetFillColor(11, 24, 64);
    $this->SetDrawColor(11, 24, 64);
      $this->Cell(216,10,utf8_decode("Nómina de Empleado"),0,'','C',true);
      $this->Ln(20);
  }

  function Footer()
  {
      $this->SetY(-15);
      $this->SetFont('Arial','I',8);
      $this->Cell(0,10,$this->PageNo(),0,0,'C');
  }
}

$arreglo=obtenerInfo("");

$pdf= new PdfExtra();


foreach($arreglo as $arr){
    $pdf->AddPage();
    $pdf->SetFont("Arial","B",20);
    $pdf->SetY(10);
    $pdf->SetX(0);//valor final x=153
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(11, 24, 64);
    $pdf->SetDrawColor(11, 24, 64);
    $pdf->Cell(216,10,utf8_decode("Nómina de Empleado"),0,'','C',true);
    $pdf->SetFont("Arial","",12);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetY(30);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Clave de Nómina: ".$arr[0]),0,'','L',false);
    $pdf->SetY(40);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Clave de Empleado: ".$arr[1]),0,'','L',false);
    $pdf->SetY(50);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Empleado: ".$arr[2]),0,'','L',false);
    $pdf->SetY(30);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Puesto: ".$arr[3]),0,'','L',false);
    $pdf->SetY(40);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Período: ".formatoFecha($arr[4])." al ".formatoFecha($arr[5])),0,'','L',false);
    $pdf->SetY(50);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Fecha de pago: ".formatoFecha($arr[6])),0,'','L',false);
    $pdf->SetFont("Arial","BI",15);
    $pdf->SetY(70);
    $pdf->SetX(0);//valor final x=153
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(217, 93, 4);
    $pdf->SetDrawColor(217, 93, 4);
    $pdf->Cell(216,7,utf8_decode("Detalles"),0,'','C',true);
    $pdf->SetFont("Arial","IU",12);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetY(80);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Información sobre desempeño"),0,'','L',false);
    $pdf->SetFont("Arial","",12);
    $pdf->SetY(90);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Horas/día: ".$arr[7]),0,'','L',false);
    
    $pdf->SetY(100);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Total de horas trabajadas: ".$arr[16]),0,'','L',false);
    $pdf->SetY(110);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Cant. de días trabajados: ".$arr[17]),0,'','L',false);
    $pdf->SetFont("Arial","IU",12);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetY(80);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Información sobre incapacidad"),0,'','L',false);
    $pdf->SetFont("Arial","",12);
    $pdf->SetY(90);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Incapacidad: ".$arr[8]),0,'','L',false);
    
    $pdf->SetY(100);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Descuento/día: ".buscarElementoClave("descuento","tbincapacidades","nombre",$arr[8])."%"),0,'','L',false);
    $pdf->SetY(110);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Días en incapacidad: ".$arr[9]),0,'','L',false);
    $pdf->SetFont("Arial","IU",12);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetY(130);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Información de descuentos"),0,'','L',false);
    $pdf->SetFont("Arial","",12);
    $pdf->SetY(140);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Descuento ISR: $".$arr[10]."MXN"),0,'','L',false);
    $pdf->SetY(150);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Descuento IMSS: $".$arr[11]."MXN"),0,'','L',false);
    $pdf->SetY(160);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Descuento Incapacidad: $".$arr[12]."MXN"),0,'','L',false);
    $pdf->SetFont("Arial","IU",12);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetY(130);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Información sobre pagos y subtotal"),0,'','L',false);
    $pdf->SetFont("Arial","",12);
    $pdf->SetY(140);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Pago/hora: $".$arr[14]." MXN"),0,'','L',false);
    $pdf->SetY(150);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Pago/día: $".$arr[13]." MXN"),0,'','L',false);
    $pdf->SetY(160);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Subtotal: $".($arr[13]*$arr[17])." MXN"),0,'','L',false);
    $pdf->SetFont("Arial","",12);
    $pdf->SetY(180);
    $pdf->SetX(2.5);
    $pdf->Cell(216,10,utf8_decode("Total de descuentos: $".$arr[15]." MXN"),0,'','C',false);
    $pdf->SetFont("Arial","B",12);
    $pdf->SetY(210);
    $pdf->SetX(0);
    $pdf->SetDrawColor(217, 93, 4);
    $pdf->Cell(216,10,utf8_decode("Total: $".$arr[18]." MXN"),1,'','C',false);
    $pdf->SetFont("Arial","",12);
    $pdf->SetY(240);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("        ___________________"),0,'','L',false);
    $pdf->SetY(245);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Firma responsable de la empresa"),0,'','L',false);
    $pdf->SetY(240);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("        ___________________"),0,'','L',false);
    $pdf->SetY(245);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("    Firma empleado de recibido"),0,'','L',false);

}




$pdf->Close();
$pdf->Output('I',"Reporte Nómina Empleados.pdf",true);


?>