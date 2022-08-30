<?php

    $err=0;
    if(isset($_GET["clv"])&&!empty($_GET["clv"])){
        $emple=new CEmpleado();
        $emple->clave=$_GET["clv"];
        if($emple->eliminaEmpleado()){
            $err=0;
        }
        else{
            $err=1;
        }
    }

?>