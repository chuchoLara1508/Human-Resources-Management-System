<?php

    $erro=0;
    if(isset($_REQUEST["edit"])){
        if(
            (isset($_POST["clave"])&&!empty($_POST["clave"]))
            &&
            (isset($_POST["nombre"])&&!empty($_POST["nombre"]))
            &&
            (isset($_POST["fechaI"])&&!empty($_POST["fechaI"]))
            &&
            (isset($_POST["fechaF"])&&!empty($_POST["fechaF"]))
            &&
            (isset($_POST["fechaP"])&&!empty($_POST["fechaP"]))
            &&
            (isset($_POST["horas"])&&!empty($_POST["horas"]))
            &&
            (isset($_POST["incapacidad"]) && ($_POST["incapacidad"]>=1))
            &&
            (isset($_POST["dias"]))
            &&
            (isset($_POST["descISR"]) && !empty($_POST["descISR"]))
            &&
            (isset($_POST["descIMSS"]) && !empty($_POST["descIMSS"]))
        ){
            $nomina=new CNomina();
            $nomina->claveN=$_POST["clave"];
            $nomina->nombreE=$_POST["nombre"];
            $nomina->puesto=buscarElementoClave("puesto","tbnominas","clave",$_POST["clave"]);
            $nomina->fechaI=$_POST["fechaI"];
            $nomina->fechaF=$_POST["fechaF"];
            $nomina->fechaPago=$_POST["fechaP"];
            $nomina->horas=$_POST["horas"];
            $nomina->incapacidad=buscarElemento("tbincapacidades",$_POST["incapacidad"]);
            if($nomina->incapacidad=="Ninguna"){
                $nomina->dias=0;
            }
            else{
                $nomina->dias=$_POST["dias"];
            }
            $salarioHora=buscarElementoClave("pago","tbpuestos","nombre",$nomina->puesto);
            $nomina->pagoHora=$salarioHora;
            $nomina->pagoDia=$nomina->pagoHora * $_POST["horas"]; 
            $nomina->descuentoISR=$_POST["descISR"];
            $nomina->descuentoIMSS=$_POST["descIMSS"];
            $porcentaje=(buscarElementoClave("descuento","tbincapacidades","nombre",$nomina->incapacidad));
            $porcentaje=$porcentaje/100;
            $nomina->descuentoIncapacidad=$nomina->pagoDia*$porcentaje*$_POST["dias"];
            $nomina->totalDescuentos=$nomina->descuentoISR+$nomina->descuentoIMSS+$nomina->descuentoIncapacidad;
            $fechaPrimero= DateTime::createFromFormat('Y-m-d',$_POST["fechaI"]);
            $fechaUltima= DateTime::createFromFormat('Y-m-d',$_POST["fechaF"]);
            $diferencia=date_diff($fechaPrimero,$fechaUltima);
            $diferenciaDias=$diferencia->format('%a');
            $nomina->totalDias=$diferenciaDias;
            $nomina->totalHoras=$_POST["horas"]*$nomina->totalDias;
            $nomina->total=($nomina->pagoDia*$nomina->totalDias)-($nomina->totalDescuentos);
            if($nomina->total<0){
                $nomina->total=0;
            }
            if($nomina->editaNomina()){
                $erro=0;
                include('vistas/vistNomina.php');
            }
            else{
                $erro=2;
                include('vistas/vistNominaE');
            }
        }
        else{
            $erro=1;
            include('vistas/vistNominaE');
        }
    }

?>