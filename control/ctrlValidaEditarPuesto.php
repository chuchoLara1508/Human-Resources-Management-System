<?php
    $error=0;
    if(isset($_REQUEST["editaPuesto"])){
        if(
            (isset($_POST["clave"])&&!empty($_POST["clave"]))
            &&
            isset($_POST["nombrePuesto"])&&!empty($_POST["nombrePuesto"])
            &&
            (isset($_POST["descPuesto"])&&!empty($_POST["descPuesto"]))
            &&
            (isset($_POST["deptoPuesto"])&&($_POST["deptoPuesto"])>0)
            &&
            (isset($_POST["pagoPuesto"])&&!empty($_POST["pagoPuesto"]))
        ){
            $puesto= new CPuesto();
            $puesto->clave=$_POST["clave"];
            $puesto->nombre=$_POST["nombrePuesto"];
            $puesto->descripcion=$_POST["descPuesto"];
            $puesto->departamento=buscarElemento("tbdepartamentos",$_POST["deptoPuesto"]);
            $puesto->pago=$_POST["pagoPuesto"];
            $puesto->claveDepto=buscarElementoClave("clave","tbdepartamentos","nombre",$puesto->departamento);
            if($puesto->editaPuesto()){
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