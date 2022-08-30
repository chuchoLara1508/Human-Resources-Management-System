<?php

    $err=0;
    if(isset($_GET["clv"])&&!empty($_GET["clv"])){
        $nomina=new CNomina();
        $nomina->clave=$_GET["clv"];
        if($nomina->quitaNomina()){
            $err=0;
        }
        else{
            $err=1;
        }
    }

?>