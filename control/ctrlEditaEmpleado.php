<?php

    $error=0;
    if(isset($_REQUEST["editaEmpleado"])){
        if(
            (isset($_POST["clave"])&&!empty($_POST["clave"]))
            &&
            (isset($_POST["nombre"])&&!empty($_POST["nombre"]))
            &&
            (isset($_POST["telEmpleado"])&&!empty($_POST["telEmpleado"]))
            &&
            (isset($_POST["curp"])&&!empty($_POST["curp"]))
            &&
            (isset($_POST["rfc"])&&!empty($_POST["rfc"]))
            &&
            (isset($_POST["numeroCuenta"])&&!empty($_POST["numeroCuenta"]))
            &&
            (isset($_POST["puesto"])&&!empty($_POST["puesto"])&& ($_POST["puesto"]>=1))
            &&
            (isset($_POST["fecha"])&&!empty($_POST["fecha"]))
        ){
            $emple=new CEmpleado();
            $emple->clave=$_POST["clave"];
            $emple->nombre=$_POST["nombre"];
            $emple->numero=$_POST["telEmpleado"];
            $emple->curp=$_POST["curp"];
            $emple->rfc=$_POST["rfc"];
            $emple->ncuenta=$_POST["numeroCuenta"];
            $emple->puesto=buscarElemento("tbpuestos",$_POST["puesto"]);
            $emple->fecha=$_POST["fecha"];
            $emple->clavePuesto=buscarElementoClave("clave","tbpuestos","nombre",$emple->puesto);
            if($emple->editaEmpleado()){
                $error=0;
            }
            else{
                $error=2;
            }
        }
        else{
            $error=1;
        }
    }

?>
