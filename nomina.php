<?php 

    session_start();


    include('libs/libConexion.php');
    $clave="";
    $nombre="";
    $puesto="";
    $fecha1="";
    $fecha2="";
    $periodo="";
    $fechaPago="";
    $horas=0;
    $pagoHora=0;
    $pagoDia=0;
    $totalHoras=0;
    $dias=0;
    $inc="";
    $porcentaje="";
    $diasInc=0;
    $isr=0;
    $imss=0;
    $desc=0;
    $nominas=array();
    $total=0;
    if(isset($_POST["claveN"])&&!empty($_POST["claveN"])){
        $_SESSION["variable"]=$_POST["claveN"];//la variable de sesion almacena la clave de nomina

    }

    if(isset($_SESSION["variable"])&&!empty($_SESSION["variable"])){
        include("libs/libBusqueda.php");
        include('libs/libGeneral.php');
        $nominas=obtenerInfo($_SESSION["variable"]);
        foreach($nominas as $no){
            $clave=$no[1];
            $nombre=$no[2];
            $puesto=$no[3];
            $fecha1=formatoFecha($no[4]);
            $fecha2=formatoFecha($no[5]);
            $periodo=$fecha1." al ".$fecha2;
            $fechaPago=formatoFecha($no[6]);
            $horas=$no[7];
            $pagoHora=$no[14];
            $pagoDia=$no[13];
            $totalHoras=$no[16];
            $dias=$no[17];
            $inc=$no[8];
            $porcentaje=buscarElementoClave("descuento","tbincapacidades","nombre",$inc);
            $diasInc=$no[9];
            $isr=$no[10];
            $imss=$no[11];
            $desc=$no[12];
            $total=$no[18];
        }
    }
    
    include ("pdf/fpdf.php");

    $pdf= new FPDF();
    $pdf->AddPage('portrait','letter');
    
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
    $pdf->Cell(10,10,utf8_decode("Clave de Nómina: ".$_SESSION["variable"]),0,'','L',false);
    $pdf->SetY(40);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Clave de Empleado: ".$clave),0,'','L',false);
    $pdf->SetY(50);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Empleado: ".$nombre),0,'','L',false);
    $pdf->SetY(30);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Puesto: ".$puesto),0,'','L',false);
    $pdf->SetY(40);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Período: ".$periodo),0,'','L',false);
    $pdf->SetY(50);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Fecha de pago: ".$fechaPago),0,'','L',false);
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
    $pdf->Cell(10,10,utf8_decode("Horas/día: ".$horas),0,'','L',false);
    
    $pdf->SetY(100);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Total de horas trabajadas: ".$totalHoras),0,'','L',false);
    $pdf->SetY(110);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Cant. de días trabajados: ".$dias),0,'','L',false);
    $pdf->SetFont("Arial","IU",12);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetY(80);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Información sobre incapacidad"),0,'','L',false);
    $pdf->SetFont("Arial","",12);
    $pdf->SetY(90);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Incapacidad: ".$inc),0,'','L',false);
    
    $pdf->SetY(100);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Descuento/día: ".$porcentaje."%"),0,'','L',false);
    $pdf->SetY(110);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Días en incapacidad: ".$diasInc),0,'','L',false);
    $pdf->SetFont("Arial","IU",12);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetY(130);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Información de descuentos"),0,'','L',false);
    $pdf->SetFont("Arial","",12);
    $pdf->SetY(140);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Descuento ISR: $".$isr."MXN"),0,'','L',false);
    $pdf->SetY(150);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Descuento IMSS: $".$imss."MXN"),0,'','L',false);
    $pdf->SetY(160);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Descuento Incapacidad: $".$desc."MXN"),0,'','L',false);
    $pdf->SetFont("Arial","IU",12);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetY(130);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Información sobre pagos y subtotal"),0,'','L',false);
    $pdf->SetFont("Arial","",12);
    $pdf->SetY(140);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Pago/hora: $".$pagoHora." MXN"),0,'','L',false);
    $pdf->SetY(150);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Pago/día: $".$pagoDia." MXN"),0,'','L',false);
    $pdf->SetY(160);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Subtotal: $".($pagoDia*$dias)." MXN"),0,'','L',false);
    $pdf->SetFont("Arial","",12);
    $pdf->SetY(180);
    $pdf->SetX(2.5);
    $pdf->Cell(216,10,utf8_decode("Total de descuentos: $".($isr+$imss+$desc)." MXN"),0,'','C',false);
    $pdf->SetFont("Arial","B",12);
    $pdf->SetY(210);
    $pdf->SetX(0);
    $pdf->SetDrawColor(217, 93, 4);
    $pdf->Cell(216,10,utf8_decode("Total: $".$total." MXN"),1,'','C',false);
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
    $pdf->Close();
    $pdf->Output('I',$nombre."_Nómina.pdf",true);


?>
