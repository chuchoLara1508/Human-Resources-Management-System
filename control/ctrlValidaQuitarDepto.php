<?php

    $err=0;
    if(isset($_GET["clv"])&&!empty($_GET["clv"])){
        $depto=new CDepartamento();
        $depto->clave=$_GET["clv"];
        if($depto->eliminarDepartamento()){
            
        }
        else{
            $err=1;
        }
    }

?>