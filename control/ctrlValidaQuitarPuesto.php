<?php

    $err=0;
    if(isset($_GET["clv"])&&!empty($_GET["clv"])){
        $puesto=new CPuesto();
        $puesto->clave=$_GET["clv"];
        if($puesto->eliminarPuesto()){
           $err=0;
        }
        else{
            $err=1;
        }
    }

?>