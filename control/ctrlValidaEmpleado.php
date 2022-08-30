<?php

    $error=0;
    if(isset($_REQUEST["registrarEmpleado"])){
        
        if(
            (
            (isset($_POST["nombre"])&&!empty($_POST["nombre"]))
            &&
            (isset($_POST["apellidoP"])&&!empty($_POST["apellidoP"]))
            &&
            (isset($_POST["apellidoM"]))
            //campos de nombre empleado
            )
            && 
            (isset($_POST["telEmpleado"])&&!empty($_POST["telEmpleado"]))
            &&
            (isset($_POST["curp"])&&!empty($_POST["curp"]))
            &&
            (isset($_POST["rfc"])&&!empty($_POST["rfc"]))
            &&
            (
                (isset($_POST["calle"])&&!empty($_POST["calle"]))
                &&
                (isset($_POST["numext"])&&!empty($_POST["numext"]))
                &&
                (isset($_POST["numint"]))
                &&
                (isset($_POST["colonia"])&&!empty($_POST["colonia"]))
                &&
                (isset($_POST["cp"])&&!empty($_POST["cp"]))
                //campos de dirección
            )
            &&
            (isset($_POST["numeroCuenta"])&&!empty($_POST["numeroCuenta"]))
            &&
            (isset($_POST["puesto"])&&!empty($_POST["puesto"])&& ($_POST["puesto"]>=1))
            &&
            (isset($_POST["fecha"]) && !empty($_POST["fecha"]))
            &&
            (isset($_POST["nivel"]) && ($_POST["nivel"]>=1))
            &&
            (isset($_POST["grupo1"]))
            &&
            (isset($_POST["pais"]) && ($_POST["pais"]>=1))
        )
        {
            $emple=new CEmpleado();
            $emple->clave=palealea(5);
            $emple->nombre=$_POST["apellidoP"]." ".$_POST["apellidoM"]." ".$_POST["nombre"];
            $emple->numero=$_POST["telEmpleado"];
            $emple->curp=$_POST["curp"];
            $emple->rfc=$_POST["rfc"];
            if(!empty($_POST["numint"])){
                $emple->direccion=$_POST["calle"]." ext #".$_POST["numext"]." int #".$_POST["numint"]." Col.".$_POST["colonia"].", CP.".$_POST["cp"];
            }
            else{
                $emple->direccion=$_POST["calle"]." ext #".$_POST["numext"]." "." Col.".$_POST["colonia"].", CP.".$_POST["cp"];
            }
            $emple->ncuenta=$_POST["numeroCuenta"];
            $emple->puesto=buscarElemento("tbpuestos",$_POST["puesto"]);
            $emple->fecha=$_POST["fecha"];
            $emple->nivel=$emple->tieneNivel($_POST["nivel"]);
            $emple->genero=$_POST["grupo1"];
            $emple->pais=buscarPais($_POST["pais"]);
            $emple->clavePuesto=buscarElementoClave("clave","tbpuestos","nombre",$emple->puesto);
            $emple->clavePais=buscarElementoClave("id","pais","paisnombre",$emple->pais);
            if($emple->creaEmpleado()){
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
    else{
       $error=2;
    }
?>